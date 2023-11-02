<?php

namespace App\Http\Requests\Back\Master\Tour;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Produk;
use App\Models\Master\TourDetail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\ImageOptimizer\OptimizerChain;

class SimpanTourDetailRequest extends BaseRequest
{

    public $tour;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->tour = TourDetail::query()->findOrFail($this->uuid_tour_detail);

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'uuid_tour_detail' => 'required',
            'harga' => 'required',
            'destinasi' => 'required',
            'layanan_include' => 'required',
            'layanan_exclude' => 'required',
            'syarat' => 'required',
            'min_pax' => 'required',
            'gambar_gallery' => 'required',
        ];

        return $rules;
    }

    public function getData()
    {
        $data = [
            'harga' => $this->harga,
            'destinasi' => json_encode($this->destinasi),
            'layanan_include' => json_encode($this->layanan_include),
            'layanan_exclude' => json_encode($this->layanan_exclude),
            'syarat' => $this->syarat,
            'min_pax' => $this->min_pax,
        ];

        return $data;
    }

    public function getDataGambar()
    {
        foreach ($this->gambar_gallery as $index => $value) {
            $nama_file = $value;

            if (isset($this->foto_produk[$index])) {

                $uuid = new_uuid();

                $nama_file = $this->storeFile(
                    $this->foto_produk[$index],
                    'assets/images/gallery',
                    $uuid,
                    'public_path'
                );

                $data = [
                    'uuid_gallery'   =>  $uuid,
                    'gambar_gallery' =>  basename($nama_file),
                    'link_gallery'   =>  $this->link_gallery,
                    'uuid_tour_detail'   =>   $this->uuid_tour_detail,
                ];
            }

            if (!empty($nama_file)) {
                $dataGambar[] = $data;
            }
        }

        return $dataGambar;
    }
}
