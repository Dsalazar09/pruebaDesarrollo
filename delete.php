<?php
include("conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM productos WHERE id = $id";
    $res = mysqli_query($con,$query);
    if(!$res){
        die("Falló el borrado");
    }

    $_SESSION['mensaje'] = "Producto ELIMINADO con éxito";
    $_SESSION['tipo_mensaje'] = 'danger';

    header("Location: cafeteria.php");
}


?>