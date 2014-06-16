<?php
include_once("settings/settings.inc.php"); 


if (isset($_POST['txtfolio'])) {
    $folio= $_POST["txtfolio"];
    $cliente= $_POST['txtcliente'];
    $direccion= $_POST['txtdireccion'];
  


$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql = "INSERT INTO factura1 (folio,cliente,direccion) VALUES ('".$folio."','".$cliente."','".$direccion."')";
$rs_comentarios = mysql_query($sql, $conexion) or die(mysql_error());

}
if (isset($_POST['txtprecio'])) {
    $precio= $_POST["txtprecio"];
    $cantidad= $_POST['txtcantidad'];
    $producto= $_POST['txtproducto'];
    $folio_factura= $_POST["txtfolio"];

$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());
$sql1 = "INSERT INTO producto (precio,cantidad,folio_factura,producto) VALUES ('".$precio."','".$cantidad."','".$folio_factura."','".$producto."')";
$rs_comentarios = mysql_query($sql1, $conexion) or die(mysql_error());

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>BLOG</title>

    <meta charset="UTF-8">

  </head>

  <table border="0"> 
 
	<form action="factura1.php" method="post" name="factura"><br> 
   
			
		
		 <tr><td><label>Folio:<input name="txtfolio" type="text"  id="txtfolio" value="" ></td></tr>
		 <tr><td><label>Cliente:<input name="txtcliente" type="text" id="txtcliente"  value=""></td></tr>
		 <tr><td><label>Direccion:<input name="txtdireccion" type="text" id="txtdireccion"  value=""></td></tr>
         <tr> </tr>
		 
		 <td><label>Precio:<input name="txtprecio" type="text"  id="txtprecio" value="" ></td>
		 <td><label>Cantidad:<input name="txtcantidad" type="text" id="txtcantidad"  value=""></td>
		 <td><label>Producto:<input name="txtproducto" type="text" id="txtproducto"  value=""></td>
		 <tr><td><input type="submit" value="Guardar"> </td></tr>
  
  </form>
<?php
include_once("settings/settings.inc.php");
$conexion = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD) or die(mysql_error());
$db = @mysql_select_db(SQL_DB, $conexion) or die(mysql_error());



   $sql2="select * from producto";

   $productos=mysql_query($sql2, $conexion);
     
     echo "<table border='1'>";
   
while ($producto=@mysql_fetch_array($productos))
{
    
  
      echo "<td> cantidad: </td>";
        echo "<td>".$producto['cantidad']."</td>";
 

 
      echo "<td> producto: </td>";
        echo "<td>".$producto['producto']."</td>";
  
  
      echo "<td> precio: </td>";
        echo "<td>".$producto['precio']."</td>";
  


  
}
  ?>
 
 
  </table>
  
  
  </html>