<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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
                'title' => [
                    'required',
                    Rule::unique('jobs')->ignore($this->job->id),
                ],
                'description'=> 'required'
            ];
        }

        return [
            'title' => 'sometimes|required|unique:jobs',
            'description'=> 'sometimes|required'
        ];

    }
}
