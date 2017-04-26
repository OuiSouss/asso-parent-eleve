<?php

namespace App\Http\Requests;

use App\Book;
use App\BookReference;
use App\Level;
use App\Section;
use App\Subject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookReference extends FormRequest
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
        $book_reference = BookReference::where('ISBN', $this->get('ISBN'))->first();

        $isbn_rule = 'required|max:17|regex:/[0-9]{3}\-[0-9]\-[0-9]{4}\-[0-9]{4}\-[0-9]/|unique:book_references,ISBN';

        if ($this->isMethod('put'))
            $isbn_rule .= ',' . $book_reference->id . ',id';

        $edit_array = [
            'initial_price' => 'required|regex:/^\d*(\.\d{2})?$/|min:0|max:1000',
            'ISBN' => $isbn_rule,
            'section_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required',
        ];

        $post_array = ['number_books' => 'required|integer|min:0|max:5000'];

        if ($this->isMethod('put')) {
            return $edit_array;

        }
        return array_merge($edit_array, $post_array);

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'initial_price.regex' => 'Inscrivez un prix avec cette normalisation : 10.50  ',
            'ISBN.regex' => 'L\' isbn doit respecter ce format : 979-1-2135-2156-5',
            'number_books.max' => 'Votre nombre est un peu trop grand. Le max est fixé à 5000',
        ];
    }
}
