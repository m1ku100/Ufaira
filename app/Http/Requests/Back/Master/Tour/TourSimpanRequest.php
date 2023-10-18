<?php

namespace App\Http\Requests\Back\Master\Tour;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Produk;
use App\Models\Master\Tour;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TourSimpanRequest extends BaseRequest
{
    /**
     * @var
     */
    public $tour;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->check()) {
            $this->tour = Tour::query()->find($this->uuid_tour);


            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nama_tour' => 'required'
        ];

        if ($this->editMode()) {
            $rules = array_merge($rules, [
                'uuid_tour' => 'required|uuid|exists:m_tour,uuid_tour',
            ]);
        }

        return $rules;
    }

    public function getData()
    {
        $data = [
            'nama_tour' => $this->nama_tour,
            'slug_tour' => Str::slug($this->nama_tour, '_'),
        ];

        if ($this->addMode()) {
            $data = array_merge($data, [
                'uuid_tour' => new_uuid(),
            ]);
        }

        return $data;
    }
}
