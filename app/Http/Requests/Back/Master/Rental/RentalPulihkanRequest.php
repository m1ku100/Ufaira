<?php

namespace App\Http\Requests\Back\Master\Rental;

use App\Models\Master\Rental;
use Illuminate\Foundation\Http\FormRequest;

class RentalPulihkanRequest extends FormRequest
{

    /**
     * @var Rental
     */
    public $rental;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->rental = Rental::query()->find($this->uuid_rental);

        return $this->inspect('restore', $this->rental);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_rental'	=> 'required|uuid|exists:m_rental,uuid_rental'
        ];
    }
}
