<?php

namespace App\Http\Requests\Back\Master\Gallery;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Banner;
use App\Models\Master\Gallery;
use Illuminate\Foundation\Http\FormRequest;

class SimpanGalleryRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->inspect('create', Gallery::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gambar_gallery'	=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'gambar_gallery.required' => 'Kode Pelanggan Wajib Dicantumkan',
        ];
    }

    /**
     * Mendapatkan data untuk menyimpan banner
     *
     * @return array
     */
    public function getData()
    {
        $uuid = new_uuid();

        $nama_file = $this->storeFile(
            $this->file('gambar_gallery'),
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

        return $data;
    }
}
