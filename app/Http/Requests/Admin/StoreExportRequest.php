<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreExportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'from_date' => 'bail|required|date|date_format:m/d/Y',
            'end_date' => 'bail|required|date|date_format:m/d/Y|after_or_equal:from_date' 
            //ikaw na bahala mag validate dito, dapat yung end date ay equal or greater than from date, kong makikita mo nag try ako ng date backward sa end date error na yon
            
        ];
    }

    public function message()
    {
        return [
            'end_date.after_or_equal' => 'Please select a valid date', // 
        ];
    }
}
