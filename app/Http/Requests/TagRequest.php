<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title'=>'required|unique:tags,title,' .$this->id,
            'slug'=>'required'


            //
        ];
    }
}
