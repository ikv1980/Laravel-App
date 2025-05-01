<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Fluent;

class StorePostRequest extends FormRequest
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
        // Получаем ID поста из маршрута для метода update
        $postId = $this->route('post');

        $rules = [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date', 'required_if:published,true'],
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Название поста обязательно',
            'content.required' => 'Содержание поста обязательно',
            'published_at.required_if' => 'Для опубликованных постов необходимо указать дату публикации'
        ];
    }
}
