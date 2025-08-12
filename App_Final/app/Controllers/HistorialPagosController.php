<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Pago.php';
use App\Models\Pago;

class HistorialPagosController
{
    public function index(): void
    {
        $modelo = new \App\Models\Pago();
        $filtros = [
            'alumno'  => $_GET['alumno']  ?? null,
            'mes'     => $_GET['mes']     ?? null,
            'anio'    => $_GET['anio']    ?? null,
            'estatus' => $_GET['estatus'] ?? null,
        ];
        $pagos = $modelo->historial($filtros);
        $data = compact('pagos', 'filtros');
        require __DIR__ . '/../views/pagos/historial.php';
    }
}
