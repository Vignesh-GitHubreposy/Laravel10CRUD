<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emp_name'=> ['required','max:255'],
            'emp_email'=> ['required', 'email:rfc,dns'],
            'emp_phno'=> ['required'],
            'emp_dob'=> ['required','date'],
            'emp_address'=> ['required'],
            'emp_designation'=> ['required'],
            'emp_doj'=> ['required','date'],
            'emp_photo'=>['required'],
        ];
    }
}
