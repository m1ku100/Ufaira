<?php

namespace App\Http\Requests\Back\Master\Gallery;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Banner;
use App\Models\Master\Gallery;
use Illuminate\Foundation\Http\FormRequest;

class HapusGalleryRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->gallery = Gallery::query()->find($this->uuid_gallery);
        return $this->inspect('delete', $this->gallery);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_gallery'	=> 'required|uuid|exists:p_gallery,uuid_gallery'
        ];
    }
}
