<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PDFController extends Controller
{
    public function pdf()
    {
        $datos = equipos::all();
        $datos1 = Mantenimiento::all(); // Asegúrate de que el modelo se llame Pedido en lugar de pedidos
        $pdf = PDF::loadView('equipospdf', compact('datos','datos1')); // Asegúrate de que el nombre del paquete PDF esté en mayúsculas (PDF::loadView)
        return $pdf->stream();
    }
}
