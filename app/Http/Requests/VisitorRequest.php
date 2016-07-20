<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\visitor;
use Log;
class VisitorRequest extends Request
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
        $data = visitor::find($this->id);
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|max:255|unique:visitor',
                    'phone' => 'required|max:255|unique:visitor',
                    'occupation' => 'required|max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|max:255|unique:visitor,email,'.$data->id,
                    'phone' => 'required|max:255|unique:visitor,phone,'.$data->id,
                    'occupation' => 'required|max:255',
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required.',
            'unique' => ':attribute is already have with other person.',
        ];
    } 
}
