<?php
include("conexion.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM productos WHERE id = $id";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res)>=1){
        $row = mysqli_fetch_array($res);
        $nom_producto = $row['nombre_producto'];
        $referencia = $row['referencia'];
        $precio = $row['precio'];
        $peso = $row['peso'];
        $categoria = $row['categoria'];
        $stock = $row['stock'];
    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $Uproducto = $_POST['nombre_producto'];
    $Ureferencia  = $_POST['referencia'];
    $Uprecio = $_POST['precio'];
    $Upeso = $_POST['peso'];
    $Ucategoria = $_POST['categoria'];
    $Ustock = $_POST['stock'];

    $query = "UPDATE productos set nombre_producto = '$Uproducto',referencia = '$Ureferencia',precio = '$Uprecio',peso='$Upeso',categoria='$Ucategoria',
    stock = '$Ustock' WHERE id=$id";

    mysqli_query($con,$query);
    $_SESSION['mensaje'] = "Producto fue ACTUALIZADO con éxito";
    $_SESSION['tipo_mensaje'] = 'success';
    header("Location: cafeteria.php");
}

?>

<?php include("includes/header.php") ?>
<div calss="container p-4" style="padding: 10px;" >
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <label class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control mb-3" value="<?= $nom_producto ?>" name="nombre_producto" placeholder="Nombre Producto">
                    <label class="form-label">Referencia</label>
                    <input type="text" class="form-control mb-3" value="<?= $referencia ?>" name="referencia" placeholder="Referencia">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control mb-3" value="<?= $precio ?>" name="precio" placeholder="Precio">
                    <label class="form-label">Peso</label>
                    <input type="text" class="form-control mb-3" value="<?= $peso ?>" name="peso" placeholder="Peso">
                    <label class="form-label">Categoria</label>
                    <input type="text" class="form-control mb-3" value="<?= $categoria ?>" name="categoria" placeholder="Categoria">
                    <label class="form-label">Stock</label>
                    <input type="text" class="form-control mb-3" value="<?= $stock ?>" name="stock" placeholder="Stock">

                <button class="btn btn-success" name="update">Actualizar producto</button>
                <a href="cafeteria.php" class="btn btn-dark">Atrás</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>