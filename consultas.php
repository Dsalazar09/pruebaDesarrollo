<?php
include("conexion.php");

$query = "SELECT * FROM productos ORDER by stock desc LIMIT 1";
$res = mysqli_query($con,$query);

$query2 = "SELECT p.nombre_producto,SUM(cantidad) as cantidad_ventas FROM tbl_ventas v
inner join productos p on p.id = v.id_producto
GROUP by id_producto ORDER BY cantidad desc LIMIT 1";
$res2 = mysqli_query($con,$query2);


?>


<?php include("includes/header.php") ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Producto que más tiene stock</h3>
            <table class="table" >
                <thead class="table-success table-striped" >
                    <tr>
                        <th>Nombre producto</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha de creación</th>
                    </tr>
                </thead>

                <tbody>                    
                        <?php
                            while($row=mysqli_fetch_array($res)){
                        ?>
                            <tr>
                                <th><?php  echo $row['nombre_producto']?></th>
                                <th><?php  echo $row['precio']?></th>
                                <th><?php  echo $row['stock']?></th>  
                                <th><?php  echo $row['fecha_creacion']?></th>                                     
                            </tr>
                        <?php 
                            }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <h3>Producto más vendido</h3>
            <table class="table" >
                <thead class="table-success table-striped" >
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad de ventas</th>
                    </tr>
                </thead>

                <tbody>                    
                        <?php
                            while($row2=mysqli_fetch_array($res2)){
                        ?>
                            <tr>
                                <th><?php  echo $row2['nombre_producto'] ?></th>
                                <th><?php  echo $row2['cantidad_ventas']?></th>                                  
                            </tr>
                        <?php 
                            }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>