<?php
     include("conexion.php");
     //$con=conectar();
 
     $sql="SELECT *  FROM productos";
     $query=mysqli_query($con,$sql);
 
     $row=mysqli_fetch_array($query);
?>
<?php include("includes/header.php"); ?>

    <div calss="container p-4" style="padding: 10px;" >
        <div class="row">
            <div class="col-lg-4" style="background-color: #E5E5E5;">
                <?php if(isset($_SESSION['mensaje'])) {  ?>
                    <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['mensaje']  ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); }?>
                <h3>Ingresar el producto</h3>
                <form action="insertar.php" method="POST">
                    <label class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control mb-3" name="nombre_producto" placeholder="Nombre Producto">
                    <label class="form-label">Referencia</label>
                    <input type="text" class="form-control mb-3" name="referencia" placeholder="Referencia">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio">
                    <label class="form-label">Peso</label>
                    <input type="text" class="form-control mb-3" name="peso" placeholder="Peso">
                    <label class="form-label">Categoría</label>
                    <input type="text" class="form-control mb-3" name="categoria" placeholder="Categoria">
                    <label class="form-label">Stock disponible</label>
                    <input type="text" class="form-control mb-3" name="stock" placeholder="Stock">
                    <input type="submit" class="btn btn-primary" value="Guardar producto">
                </form>
            </div>
            <div class="col-lg-8">
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>Id</th>
                            <th>Nombre producto</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Fecha de creación</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>                    
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th><?php  echo $row['id'] ?></th>
                                    <th><?php  echo $row['nombre_producto']?></th>
                                    <th><?php  echo $row['referencia']?></th>
                                    <th><?php  echo $row['precio']?></th>
                                    <th><?php  echo $row['peso']?></th>  
                                    <th><?php  echo $row['categoria']?></th>  
                                    <th><?php  echo $row['stock']?></th>  
                                    <th><?php  echo $row['fecha_creacion']?></th>
                                    <th><a href="venta.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Vender</a></th>  
                                    <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                </tr>
                            <?php 
                                }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
  </body>
</html>