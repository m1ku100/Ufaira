<?php

namespace App\Http\Requests\Back\Master\User;

use App\Models\Master\User;
use Illuminate\Foundation\Http\FormRequest;

class UserHapusPermanenRequest extends FormRequest
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
        $this->pengguna = User::query()->find($this->uuid_user);

        return $this->inspect('forceDelete', $this->pengguna);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_user'	=> 'required|uuid|exists:m_pengguna,uuid_user'
        ];
    }
}
