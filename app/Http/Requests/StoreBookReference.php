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
        /*$id = $this->get('id');
        $isbn_rule = 'required|max:17|regex:/[0-9]{3}\-[0-9]\-[0-9]{4}\-[0-9]{4}\-[0-9]/|unique:book_references,ISBN,NULL,id';
        if ($this->method() == "PUT")
        {
            $isbn_rule = 'required|max:17|regex:/[0-9]{3}\-[0-9]\-[0-9]{4}\-[0-9]{4}\-[0-9]/|unique:book_references,ISBN,'. $id .',id';
        }
        */
        if ($this->method() == 'PUT')
        {
            return [
                'initial_price' => 'required|regex:/^\d*(\.\d{2})?$/|min:0|max:1000',
                'ISBN' => 'required|max:17|regex:/[0-9]{3}\-[0-9]\-[0-9]{4}\-[0-9]{4}\-[0-9]/',
                'section_id' => 'required',
                'level_id' => 'required',
                'subject_id' => 'required',
            ];

        }
        return [
            'initial_price' => 'required|regex:/^\d*(\.\d{2})?$/|min:0|max:1000',
            'ISBN' => 'required|max:17|regex:/[0-9]{3}\-[0-9]\-[0-9]{4}\-[0-9]{4}\-[0-9]/',
            'section_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required',
            'number_books' => 'required|integer|min:0|max:5000',
        ];

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
            'ISBN.regex' => 'L\' isbn doit respecté ce format : 979-1-2135-2156-5',
            'number_books.max' => 'Votre nombre est un peu trop grand. Le max est fixé à 5000',
        ];
    }
}
