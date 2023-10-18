<?php

namespace App\Http\Requests\Back\Master\User;

use App\Http\Requests\BaseRequest;
use App\Models\Master\User;
use Illuminate\Foundation\Http\FormRequest;

class UserHapusRequest extends BaseRequest
{
    /**
     * @var User
     */
    public $pengguna;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->pengguna = User::query()->find($this->uuid_pengguna);

        return $this->inspect('delete', $this->pengguna);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_pengguna'	=> 'required|uuid|exists:m_pengguna,uuid_pengguna'
        ];
    }
}
