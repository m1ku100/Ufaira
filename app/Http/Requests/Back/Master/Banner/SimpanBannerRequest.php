<?php

namespace App\Http\Requests\Back\Master\Banner;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Banner;
use Illuminate\Foundation\Http\FormRequest;

class SimpanBannerRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->inspect('create', Banner::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gambar_banner'	=> 'required|image'
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
            $this->file('gambar_banner'),
            'assets/images/banner',
            $uuid,
            'public_path'
        );

        $data = [
            'uuid_banner'   =>  $uuid,
            'gambar_banner' =>  basename($nama_file),
            'link_banner'   =>  $this->link_banner,
            'judul_banner'   =>   $this->judul_banner,
            'sub_judul_banner'   =>   $this->sub_judul_banner,
        ];

        return $data;
    }
}
