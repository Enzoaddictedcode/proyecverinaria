<?php
include_once("conexion.php");
if (isset($_POST['boton'])) {
$nombre=strtoupper($_POST['nombre']);
$apellido=strtoupper($_POST['apellido']);
$cedula=$_POST['cedula'];
$correo=$_POST['correo'];
if ($correo=="") {$correo="NINGUNO";}
$direccion=strtoupper($_POST['direccion']);
$nmascota=strtoupper($_POST['nmascota']);
$edad=$_POST['emascota'];
$tipo=strtoupper($_POST['tipo']);
$sexo=strtoupper($_POST['sexo']);
$descripcion=strtoupper($_POST['descripcion']);
if ($descripcion=="") {
	$descripcion="NINGUNO";
}
$consulta="INSERT INTO registro
values (NULL,'$cedula','$nombre','$apellido','$correo','$direccion','$nmascota','$edad','$tipo','$sexo','$descripcion')";
$resultado=mysqli_query($con,$consulta);
if ($resultado) {
	echo "Registro completado exitosamente";
}else{
	echo "Revise los datos ingresados";
}
}
?>