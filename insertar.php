<?php
include("conexion.php");
/*if(isset($_POST['insertar'])){
    echo "guardando";
}*/

$nombre_producto = $_POST['nombre_producto'];
$referencia = $_POST['referencia'];
$precio = $_POST['precio'];
$peso = $_POST['peso'];
$categoria = $_POST['categoria'];
$stock = $_POST['stock'];

$sql = "INSERT INTO productos (nombre_producto, referencia, precio, peso, categoria,stock) VALUES ('$nombre_producto',
'$referencia','$precio','$peso','$categoria','$stock')";


$query = mysqli_query($con,$sql);

if(!$query){
    die("Error de inserción");
}
$_SESSION['mensaje'] = "Producto guardado con éxito";
$_SESSION['tipo_mensaje'] = 'success';

header("Location: cafeteria.php");


?>