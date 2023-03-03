<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'=>'string|required|unique:products,name, '.$this->route('product')->id.'|max:255',

            'image'=>'required|dimensions:min_width:100,min_height=200',
            'sell_price'=>'required',
            //Exists - Tiene que existir en cada tabla donde se desea guardar.
            'category_id'=>'integer|required|exists:App\Models\Category,id',
            'provider_id'=>'integer|required|exists:App\Models\Provider,id',
        ];
    }

    public function messages(){
        return [
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'Este campo es requerido.',
            'name.unique'=>'El producto ya está registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'image.required'=>'El campo es requerido.',
            'image.dimensions'=>'Solo se permiten imágenes de 100x200 px.',

            'sell_price.required'=>'El campo es requerido.',

            'category_id.integer'=>'El valor tiene que ser entero.',
            'category_id.required'=>'El campo es requerido.',
            'category_id.exists'=>'La categoría no existe.',

            'provider_id.integer'=>'El valor tiene que ser entero',
            'provider_id.required'=>'El campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.'
        ];
    }
}
