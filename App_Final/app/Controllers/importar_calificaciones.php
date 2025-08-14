<!DOCTYPE html>
<html>
    <head><meta charset="utf-8"><title>Importar Calificaciones</title></head><body>
<h2>Importar Calificaciones desde Excel</h2>
<p>Sube un archivo .xlsx con la plantilla: Nombre, Apellido, Grado, Grupo, Materia, Trimestre, Calificación</p>
<form action="procesar_importacion.php" method="post" enctype="multipart/form-data">
<input type="file" name="archivo_excel" accept=".xlsx,.xls,.csv" required><br><br>
<input type="submit" value="Importar">
</form>
<br><a href="index.php">Volver</a>
</body></html>