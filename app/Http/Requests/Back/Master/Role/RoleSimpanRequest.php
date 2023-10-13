<?php

namespace App\Http\Requests\Back\Master\Role;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleSimpanRequest extends BaseRequest
{
    /**
     * @var Role
     */
    public $role;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        if ($this->addMode()) {
//            return $this->inspect('create', Role::class);
//        }

        if (!empty($this->uuid_role)) {
            $this->role = Role::query()->find($this->uuid_role);
        }

//        return $this->inspect('update', $this->role);
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
            'nama_role' => 'required|min:5'
        ];

        if ($this->editMode()) {
            $rules = array_merge($rules, [
                'uuid_role' => 'required|uuid|exists:m_role,uuid_role'
            ]);
        }

        return $rules;
    }

    /**
     * Mendapatkan data untuk menyimpan role
     *
     * @return array
     */
    public function getData()
    {
        return [
            'uuid_role'	=> new_uuid(),
            'nama_role' => $this->nama_role
        ];
    }
}
