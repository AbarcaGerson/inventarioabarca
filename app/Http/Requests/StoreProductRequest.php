<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name'=>'required|unique:products|max:255',
            'image'=>'required|dimensions:min_width:100,min_height=200',
            'sell_price'=>'',
            //Exists - Tiene que existir en cada tabla donde se desea guardar.
            'category_id'=>'integer|required|exists:App\Models\Category,id',
            'provider_id'=>'integer|required|exists:App\Models\Provider,id',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permite 50 caracteres.',
            'description.string'=>'El valor no es correcto.',
            'description.max'=>'Solo se permite 255 caracteres.',
        ];
    }
}
