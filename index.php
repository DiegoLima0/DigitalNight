<html>
<form action="index.php" method="post">
    ingresa el nombre <input type="text" name="nombre" requiere> <br>
    ingresa la contraseña <input type="text" name="contra" requiere> <br>
    ingresa la id <input type="num" name="id"requiere> <br>
    <input type="submit" value="enviar">
</form>
<a href="../app/views">haga click aqui para ingresarse</a>
</html>

<?php
require_once 'includes/database.php';

$nombre = $_POST["nombre"];
$contra = $_POST["contra"];
$id = $_POST["id"];

$sql = "INSERT INTO register (name, password, ) VALUES ('$nombre', '$contra', '$id')";

if ($conexion->query($sql)) {
    echo "Alumno guardado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();

?>
<!-- <html>
<form action="practica2.php" method="post">
    nombre y apellido:
    <input type="text" name="name">
    <input type="submit"value="enviar">
</form>
</html>
 -->
<!--  if(isset($_POST["n1"]) && ($_POST["n2"]))
{    solo cuando es sin base de datos -->
