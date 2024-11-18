<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $query = Producto::query();

            if ($request->has('searchTerm') && $request->searchTerm) {
                $query->where('nombre', 'like', '%' . $request->searchTerm . '%')
                    ->orWhere('descripcion', 'like', '%' . $request->searchTerm . '%');
            }
            if ($request->has('filtroNombre') && $request->filtroNombre) {
                $query->where('nombre', 'like', '%' . $request->filtroNombre . '%');
            }
            if ($request->has('filtroDescripcion') && $request->filtroDescripcion) {
                $query->where('descripcion', 'like', '%' . $request->filtroDescripcion . '%');
            }

            $productos = $query->paginate(5);

            return response()->json([
                'success' => true,
                'message' => 'Lista de productos obtenida exitosamente',
                'data' => $productos
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al listar productos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        try {
            Log::info('Proceso de creación de producto iniciado', ['request' => $request->all()]);

            $producto = new Producto;

            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->codigo_sap = $request->codigo_sap;
            $producto->stock = $request->stock;
            $producto->fecha_vencimiento = $request->fecha_vencimiento;
            $producto->descuento = $request->descuento;
            $producto->marca = $request->marca;
            $producto->categoria = $request->categoria;
            $producto->estado = 1;  // Producto activo por defecto


            $producto->save();

            return response()->json([
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'data' => $producto
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)  // Recibe el ID del producto
    {
        try {

            $producto = Producto::find($id);


            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Producto encontrado correctamente',
                'data' => $producto
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info('Datos recibidos para actualizar:', $request->all());
        

        // Forzar el estado a 1
        $validatedData['estado'] = 1;

        // Encontrar y actualizar el producto
        $producto = Producto::findOrFail($id);
        $producto->update($validatedData);

        return response()->json(['message' => 'Producto actualizado con éxito']);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $producto = Producto::find($id);


            if (is_null($producto)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }


            $producto->delete();


            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado correctamente',
                'data' => $producto
            ], 200);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el producto',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
