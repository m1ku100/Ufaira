<?php

namespace App\Http\Requests\Back\Master\User;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Pengguna;
use App\Models\Master\User;
use Illuminate\Foundation\Http\FormRequest;

class UserSimpanRequest extends BaseRequest
{
    /**
     * @var Pengguna
     */
    public $pengguna;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->addMode()) {
            return $this->inspect('create', User::class);
        }

        if (!empty($this->uuid_pengguna)) {
            $this->pengguna = User::query()->find($this->uuid_pengguna);
        }

        return $this->inspect('update', $this->pengguna);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email_pengguna'    => 'required|email',
            'nama_pengguna'     => 'required',

        ];

        if ($this->addMode()) {
            $rules = array_merge($rules, [
                'password'      => 'nullable|confirmed',
            ]);
        }

        if ($this->editMode()) {
            $rules = array_merge($rules, [
                'uuid_pengguna'	=> 'required|uuid|exists:m_pengguna,uuid_pengguna',

//                'kode_pengguna' => 'required'
            ]);
        }

        return $rules;
    }

    /**
     * Mendapatkan data untuk menyimpan pengguna
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->only([
            'email_pengguna',
            'nama_pengguna',
            'kode_pengguna'
        ]);

        if (!empty($this->password)) {
            $data = array_merge($data, [
                'password_pengguna' => bcrypt($this->password)
            ]);
        }

        if ($this->addMode()) {
            $data = array_merge($data, [
                'uuid_pengguna' => new_uuid(),
                'kode_pengguna' => new_uuid()
            ]);
        }

        $result = [
            'user' => $data,
            'role' => $this->role
        ];

        return $result;
    }
}
