<?php

namespace App\Http\Requests;

use App\Translate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class TranslateRequest extends FormRequest
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
            'lang' => 'required|max:4|in:' . implode(Translate::$languagesAccepts, ','),
            'texttype' => 'required|max:255',
            'value' => 'required|max:255',
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse(['error' => $errors], 400);
    }
}
