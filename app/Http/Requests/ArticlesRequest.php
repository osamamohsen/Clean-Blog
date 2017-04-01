<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticlesRequest extends Request
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
     * ['header','sub_header','body','image','user_id','published_at']
     */
    public function rules()
    {
        return [
            'header'     => 'required|min:3',
            'sub_header' => 'required|min:3',
            'body'       => 'required|min:20',
            'image'      => 'required',
            'user_id'    => 'required',
            'published_at' => 'required|date|date_format:Y-n-j'
        ];
    }
}
