<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PickedParcelRequest extends FormRequest
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
            'pick_up_time' => 'required',
            'delivered_time' => 'required',
            'parcel_id' => $this->wantsJson() ? 'required' : ''
        ];
    }
}
