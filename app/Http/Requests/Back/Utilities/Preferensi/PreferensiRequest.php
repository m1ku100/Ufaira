<?php

namespace App\Http\Requests\Back\Utilities\Preferensi;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class PreferensiRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
