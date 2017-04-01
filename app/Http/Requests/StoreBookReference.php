<?php

namespace App\Http\Requests;

use App\Book;
use App\BookReference;
use App\Level;
use App\Section;
use App\Subject;
use Illuminate\Foundation\Http\FormRequest;

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
        $isbn = BookReference::where('ISBN', $this->get('ISBN'))->first();

        $section = Section::where('name', $this->get('name'))->first();
        $level = Level::where('name', $this->get('name'))->first();
        $subject = Subject::where('name', $this->get('name'))->first();

        $isbn_rule = 'required|unique:book_references,|max:17';
        $section_rule = 'required|max:255';
        $level_rule = 'required|max:255';
        $subject_rule = 'required|max:255';

        if (isset($isbn->id))
            $isbn_rule .= ',\'' . $isbn->id;

        if (isset($section->id))
            $section_rule .= ',\'' . $section->id;

        if (isset($level->id))
            $level_rule .= ',\'' . $level->id;
        if(isset($subject->id))
            $subject_rule .= ',\'' . $subject->id;

        return [
            'ISBN' => $isbn_rule,
            'initial_price' => 'required',
            'section_id' => 'required',
            'level_id' => 'required',
            'subject_id' => 'required',
            'section_name' => $section_rule,
            'level_name' => $level_rule,
            'subject_name' => $subject_rule,
        ];

    }
}
