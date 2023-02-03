<?php
include("conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id = $id";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res)>=1){
        $row = mysqli_fetch_array($res);
        $nom_producto = $row['nombre_producto'];
        $precio = $row['precio'];
        $stock = $row['stock'];
    }
}

if(isset($_POST['venta'])){
    $id = $_GET['id'];
    $Ustock = $_POST['stock'];

    if($Ustock < $stock){
        $nuevo_stock = ($stock-$Ustock);
        $query = "UPDATE productos set stock = '$nuevo_stock' WHERE id=$id";
        mysqli_query($con,$query);
        $query2= "INSERT INTO tbl_ventas (id_producto, cantidad) VALUES ('$id','$Ustock')";
        mysqli_query($con,$query2);
        $_SESSION['mensaje'] = "Producto fue VENDIDO con éxito";
        $_SESSION['tipo_mensaje'] = 'success';
        header("Location: cafeteria.php");
    }else{
        $_SESSION['mensaje'] = "Producto NO FUE VENDIDO por falta de stock";
        $_SESSION['tipo_mensaje'] = 'danger';
        header("Location: cafeteria.php");
    }
}

?>

<?php include("includes/header.php") ?>
<div calss="container p-4" style="padding: 10px;" >
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="venta.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <label class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control mb-3" value="<?= $nom_producto ?>" name="nombre_producto" placeholder="Nombre Producto" disabled>
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control mb-3" value="<?= $precio ?>" name="precio" placeholder="Precio" disabled>
                    <label class="form-label">Cantidad que desea vender: (hay <?= $stock ?> en stock)</label>
                    <input type="text" class="form-control mb-3" name="stock" placeholder="Cantidad a vender">

                <button class="btn btn-success" name="venta">Vender producto</button>
                <a href="cafeteria.php" class="btn btn-dark">Atrás</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>