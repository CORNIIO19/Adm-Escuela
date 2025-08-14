<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';
use PDO;
use PDOException;
use App\Models\Database;

class Pago
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function historial(array $filtros = []): array
    {
        $sql = "SELECT 
                    p.id, p.alumno_id, p.fecha_pago, p.mes_pagado, p.año, p.monto, p.forma_pago, p.estatus_pago,
                    a.matricula, a.nombre, a.apellido
                FROM Pagos p
                JOIN Alumnos a ON a.id = p.alumno_id
                WHERE 1=1";
        $params = [];

        if (!empty($filtros['alumno'])) {
            $sql .= " AND (a.matricula LIKE :alumno OR a.nombre LIKE :alumno OR a.apellido LIKE :alumno)";
            $params[':alumno'] = '%' . $filtros['alumno'] . '%';
        }
        if (!empty($filtros['mes'])) {
            $sql .= " AND p.mes_pagado = :mes";
            $params[':mes'] = $filtros['mes'];
        }
        if (!empty($filtros['anio'])) {
            $sql .= " AND p.año = :anio";
            $params[':anio'] = (int)$filtros['anio'];
        }
        if (!empty($filtros['estatus'])) {
            $sql .= " AND p.estatus_pago = :estatus";
            $params[':estatus'] = $filtros['estatus'];
        }

        $sql .= " ORDER BY a.nombre, p.año, FIELD(p.mes_pagado,'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'), p.fecha_pago";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function existePagoMes(int $alumnoId, string $mes, int $anio): bool
    {
        $sql = "SELECT 1 FROM Pagos WHERE alumno_id = :aid AND mes_pagado = :mes AND año = :anio LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':aid' => $alumnoId, ':mes' => $mes, ':anio' => $anio]);
        return (bool)$stmt->fetchColumn();
    }

    public function registrarPago(int $alumnoId, string $fecha, string $mes, int $anio, float $monto, string $forma, string $estatus = 'pagado'): bool
    {
        $sql = "INSERT INTO Pagos (alumno_id, fecha_pago, mes_pagado, año, monto, forma_pago, estatus_pago)
                VALUES (:aid, :fecha, :mes, :anio, :monto, :forma, :estatus)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':aid' => $alumnoId,
            ':fecha' => $fecha,
            ':mes' => $mes,
            ':anio' => $anio,
            ':monto' => $monto,
            ':forma' => $forma,
            ':estatus' => $estatus
        ]);
    }

    public function alumnosActivos(): array
    {
        $stmt = $this->db->query("SELECT id, matricula, nombre, apellido FROM Alumnos WHERE estatus='activo' ORDER BY nombre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
