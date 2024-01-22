<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator;

class BeatRequest extends FormRequest
{
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

            'title' => 'required',
            'slug' => 'required|unique:beats',
           // 'premium_file' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
            'free_file' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
           'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',



        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors(),
            'data' => null,
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}