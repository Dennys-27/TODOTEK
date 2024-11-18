<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    // Determina si el usuario está autorizado para realizar esta solicitud.
    public function authorize()
    {
        return true;
    }

    // Define las reglas de validación para los campos del producto.
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'codigo_sap' => 'nullable|string|max:50',
            'fecha_vencimiento' => 'nullable|date',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'marca' => 'nullable|string|max:100',
             'categoria' => 'nullable|string'
        ];
    }
    /**
     * Los mensajes de error personalizados para la validación.
     *
     * @return array
     */
    public function messages()
    {
        return [
           'nombre.required' => 'El nombre del producto es obligatorio.',
            'descripcion.required' => 'La descripción del producto es obligatoria.',
            'precio.required' => 'El precio del producto es obligatorio.',
            'precio.numeric' => 'El precio debe ser un valor numérico.',
            'precio.min' => 'El precio no puede ser negativo.',
            'stock.required' => 'El stock del producto es obligatorio.',
            'stock.integer' => 'El stock debe ser un valor entero.',
            'stock.min' => 'El stock no puede ser negativo.',
          
        ];
    }
}
