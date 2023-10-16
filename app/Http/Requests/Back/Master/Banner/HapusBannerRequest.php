<?php

namespace App\Http\Requests\Back\Master\Banner;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Banner;
use Illuminate\Foundation\Http\FormRequest;

class HapusBannerRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->banner = Banner::query()->find($this->uuid_banner);

        return $this->inspect('delete', $this->banner);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_banner'	=> 'required|uuid|exists:p_banner,uuid_banner'
        ];
    }
}
