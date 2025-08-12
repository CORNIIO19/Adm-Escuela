<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Pago.php';
use App\Models\Pago;

class RegistrarPagoController
{
    public function form(): void
    {
        $modelo = new \App\Models\Pago();
        $alumnos = $modelo->alumnosActivos();
        $mensaje = $_GET['msg'] ?? null;
        require __DIR__ . '/../views/pagos/registrar.php';
    }

    public function store(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ?url=Auth/index');
            exit;
        }
        $modelo = new \App\Models\Pago();
        $alumnoId = (int)($_POST['alumno_id'] ?? 0);
        $fecha    = $_POST['fecha_pago'] ?? date('Y-m-d');
        $mes      = $_POST['mes_pagado'] ?? '';
        $anio     = (int)($_POST['anio'] ?? 0);
        $monto    = (float)($_POST['monto'] ?? 0);
        $forma    = $_POST['forma_pago'] ?? 'efectivo';

        if (!$alumnoId || !$mes || !$anio || !$monto || !in_array($forma, ['efectivo','transferencia'])) {
            header('Location: ?url=RegistrarPago/form&msg=Datos%20incompletos');
            exit;
        }

        if ($modelo->existePagoMes($alumnoId, $mes, $anio)) {
            header('Location: ?url=RegistrarPago/form&msg=El%20mes%20seleccionado%20ya%20ha%20sido%20pagado');
            exit;
        }

        $ok = $modelo->registrarPago($alumnoId, $fecha, $mes, $anio, $monto, $forma, 'pagado');
        $msg = $ok ? 'Pago%20registrado%20correctamente' : 'Error%20al%20registrar%20el%20pago';
        header('Location: ?url=RegistrarPago/form&msg='.$msg);
        exit;
    }
}
