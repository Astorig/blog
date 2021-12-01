<?php

namespace App\Validations;

use Illuminate\Validation\Rule;

class FormRequest
{
    public function articleValidate($request, $article)
    {
        $result = $request->validate([
            'code' => [
                'required',
                'alpha_dash',
                Rule::unique('articles', 'code')->ignore($article)
            ],
            'title' => 'required|between:5,100',
            'description' => 'required|max:255',
            'content' => 'required',
            'published' => 'boolean'
        ]);

        $result['user_id'] = auth()->id();
        return $result;
    }
}
