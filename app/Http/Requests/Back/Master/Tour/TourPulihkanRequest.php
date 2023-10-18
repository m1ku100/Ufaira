<?php

namespace App\Http\Requests\Back\Master\Tour;

use App\Http\Requests\BaseRequest;
use App\Models\Master\Tour;
use Illuminate\Foundation\Http\FormRequest;

class TourPulihkanRequest extends BaseRequest
{
    /**
     * @var Tour
     */
    public $tour;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->tour = Tour::query()->find($this->uuid_tour);

        return $this->inspect('restore', $this->tour);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uuid_tour'	=> 'required|uuid|exists:m_tour,uuid_tour'
        ];
    }
}
