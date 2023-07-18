<?php

namespace App\Http\Requests;

class UpdateJobRequest extends StoreJobRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'title' => 'required|unique:jobs',
                'description'=> 'required'
            ];
        }

        return [
            'title' => 'sometimes|required|unique:jobs',
            'description'=> 'sometimes|required'
        ];

    }
}
