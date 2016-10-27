<?php
 require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>PHP [hidden:urls]: tienda.php</title>
</head>
<body bgcolor="#0AB69C">
<header>
 <h1 align="center">PRUEBA 1 GITHUB</h1>
 <h1 align="center">Carrito de compra</h1>
</header>
<section>
<article>
<?php
 //Recuperando objetos pertenecientes al carrito
 $carrito = generarCarrito();
 if(isset($_GET['articulo']))
 //Incrementar el número de unidades del artículo elegido
 if(empty($carrito[$_GET['articulo']]))
 $carrito[$_GET['articulo']] = 1;
 else
 $carrito[$_GET['articulo']]++;
 //Mostrar los artículos disponibles
 estantes($carrito);
 echo "<hr />\n";
 //Mostrar el contenido del carrito
 mostrarCarrito($carrito);
?>
 <hr />
 <form action="./caja.php">
 <div align="center">
 <?php
 $hidden = "";
 //Generar los controles ocultos con las variables
 //comunes de la aplicación
 foreach($carrito as $ref => $unidades){
 $hidden .= "<input type=\"hidden\" name=\"$ref\" value=\"$unidades\" />\n";
 }
 echo $hidden;
 ?>
 <button type="submit">Caja</button>
 <br>
 <br>
 <br>
 <a href="tienda.php">ELIMINAR COMPRA</a>
 </div>
 </form>
</article>
</section>
</body>
</html>
