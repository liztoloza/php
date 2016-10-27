<?php
 //Incluir librería con las funciones auxiliares
 require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <title>PHP [hidden y urls]: caja.php</title>
</head>
<body bgcolor="#0AB69C">
<section>
<article>
<?php
 echo "<h1 align=\"center\">Contenido del carrito</h1>\n";
 //Recuperar los objetos pertenecientes al carrito
 $carrito = generarCarrito();
 //Mostrar el contenido
 mostrarCarrito($carrito);
?>
<p align="center">
 Pulsa <a href="./tienda.php">aqu&iacute;</a> para continuar.
</p>
</article>
</section>
</body>
</html>
