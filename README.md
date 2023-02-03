# pruebaDesarrollo
Aquí está alojada la prueba de Konecta

Dentro del repositorio envío la base de datos para que sea de fácil acceso y se la puedan importar.
 adjunto aquí los 2 querys solicitados
 
 -Producto que más tiene stock.
SELECT * FROM productos ORDER by stock desc LIMIT 1

-Producto más vendido.
SELECT p.nombre_producto,SUM(cantidad) as cantidad_ventas FROM tbl_ventas v
inner join productos p on p.id = v.id_producto
GROUP by id_producto ORDER BY cantidad desc LIMIT 1
