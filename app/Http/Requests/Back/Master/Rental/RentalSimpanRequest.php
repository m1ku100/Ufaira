<?php

namespace App\Http\Requests\Back\Master\Rental;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Rental;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RentalSimpanRequest extends BaseRequest
{
    public $rental;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!empty($this->uuid_rental)) {
            $this->rental = Rental::query()->find($this->uuid_rental);
        }

        if ($this->addMode()) {
            return $this->inspect('create', Rental::class);
        }

        return $this->inspect('update', $this->rental);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nama_kendaraan' => 'required',
            'harga' => 'required',
            'min_pax' => 'required',
            'is_automatic' => 'required',
            'is_include_supir' => 'required',
//            'is_include_bbm' => 'required',

        ];

        if ($this->addMode()) {
            $rules = array_merge($rules, [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        return $rules;
    }

    public function getData()
    {
        $thumbnail = null;

        $permalink = Str::slug($this->judul_tour);

        //Jika ada thumnail baru
        if ($this->hasFile('foto')) {
            $thumbnail = $this->storeFile(
                $this->file('foto'),
                'assets/images/rental',
                Str::slug(strtolower($this->file('foto')->getClientOriginalName())) . '-' . date('ymd'),
                'public_path');
        } else {
            $tour = Rental::query()->find($this->uuid_rental);
            $thumbnail = $tour->foto;
        }


        return [
            'nama_kendaraan' => $this->nama_kendaraan,
            'harga' => $this->harga,
            'min_pax' => $this->min_pax,
            'is_automatic' => $this->is_automatic,
            'is_include_supir' => $this->is_include_supir,
            'is_include_bbm' => $this->is_include_bbm ?? false,
            'status_rental' => Rental::AKTIF,
            'foto' => $thumbnail,
            'uuid_rental' => $this->addMode() ? new_uuid() : $this->uuid_rental
        ];
    }
}
