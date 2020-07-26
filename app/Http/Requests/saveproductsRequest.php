<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveproductsRequest extends FormRequest
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
            'title'=>'required',
            'url'=>'required',
            'description'=>'required',
            'cost'=>'required',
            'category_id'=> ['required', 'exists:categories,id'],
            'image'=>[
                $this->route('product')? 'nullable':'required'] //jpg, png,bmp, git, svg o webp
        ];
    }
}
