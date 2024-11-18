<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::insert([
            [
                'nombre' => 'Producto 1',
                'descripcion' => 'Descripción del Producto 1',
                'precio' => 99.99,
                'imagen' => 'imagen1.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP001',
                'stock' => 100,
                'fecha_vencimiento' => '2025-12-31',
               
                'descuento' => 10.00,
                'marca' => 'Marca A',
            ],
            [
                'nombre' => 'Producto 2',
                'descripcion' => 'Descripción del Producto 2',
                'precio' => 150.00,
                'imagen' => 'imagen2.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP002',
                'stock' => 50,
                'fecha_vencimiento' => '2025-10-01',
                
                'descuento' => null,
                'marca' => 'Marca B',
            ],
            [
                'nombre' => 'Producto 3',
                'descripcion' => 'Descripción del Producto 3',
                'precio' => 75.50,
                'imagen' => 'imagen3.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP003',
                'stock' => 200,
                'fecha_vencimiento' => '2024-08-15',
               
                'descuento' => 5.00,
                'marca' => 'Marca C',
            ],
            [
                'nombre' => 'Producto 4',
                'descripcion' => 'Descripción del Producto 4',
                'precio' => 120.00,
                'imagen' => 'imagen4.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP004',
                'stock' => 30,
                'fecha_vencimiento' => '2025-05-20',
                
                'descuento' => null,
                'marca' => 'Marca D',
            ],
            [
                'nombre' => 'Producto 5',
                'descripcion' => 'Descripción del Producto 5',
                'precio' => 200.00,
                'imagen' => 'imagen5.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP005',
                'stock' => 75,
                'fecha_vencimiento' => '2026-01-10',
               
                'descuento' => null,
                'marca' => 'Marca E',
            ],
            
            [
                'nombre' => 'Producto 6',
                'descripcion' => 'Descripción del Producto 6',
                'precio' => 135.75,
                'imagen' => 'imagen6.jpg',
                'estado' => 1,
               
                'codigo_sap' => 'SAP006',
                'stock' => 120,
                'fecha_vencimiento' => '2024-12-15',
                
                'descuento' => 15.00,
                'marca' => 'Marca F',
            ],
            [
                'nombre' => 'Producto 7',
                'descripcion' => 'Descripción del Producto 7',
                'precio' => 250.00,
                'imagen' => 'imagen7.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP007',
                'stock' => 50,
                'fecha_vencimiento' => '2026-03-01',
                
                'descuento' => null,
                'marca' => 'Marca G',
            ],
            [
                'nombre' => 'Producto 8',
                'descripcion' => 'Descripción del Producto 8',
                'precio' => 175.50,
                'imagen' => 'imagen8.jpg',
                'estado' => 1,
                
                'codigo_sap' => 'SAP008',
                'stock' => 100,
                'fecha_vencimiento' => '2025-09-25',
               
                'descuento' => 10.00,
                'marca' => 'Marca H',
            ]
            // Añadir el resto de productos (Producto 9 hasta Producto 20)
        ]);
    }
}
