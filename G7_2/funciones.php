<?php
 function generarCarrito()
 {
		 //Se utilizará una matriz para manejar el carrito
		 $carrito = array();
		 //Los artículos y sus cantidades se enviarán con el
		 //método GET, ya sea en la cadena de consulta o a
		 //través de campos ocultos de formulario
		 foreach($_GET as $ref => $unidades){
		 if(preg_match("/^ref/", $ref)) //Expresión regular
		 $carrito[$ref] = $unidades;
		 }
		 return $carrito;
 }

 function mostrarCarrito($carrito)
 {
 		$suma=0;
 		$total1=0;
 		$total2=0;
 		$total3=0;
 		$conta1=0;
 		$conta2=0;
 		$conta3=0;

		 //Generación de la cabecera de la tabla
		 echo "<table border=\"1\" align=\"center\">\n";
		 echo "<tr>\n<th>\nReferencia</th>\n";
		 echo "<th>\nUnidades</th>\n\n";
		 echo "<th>\nPrecio</th>\n</tr>\n";
		 //Mostramos el carrito
		 $totalUnidades = 0;
		 if(empty($carrito)){
		 echo "<tr>\n<td align=\"center\" colspan=\"2\">\n";
		 echo "El carrito est&aacute; vac&iacute;o\n</td>\n</tr>\n";
		 }
		 else{
		 foreach($carrito as $ref => $unidades)
		 {
		 echo "<tr>\n<td>\n$ref</td>\n";
		 echo "<td align=\"center\">$unidades</td>\n\n";
		 if ($ref=="ref1") 
		 {
		 	$conta1 += $unidades; 
		 	$total1 = 5*$conta1;
		 	echo "<td align=\"center\">$total1 &euro;</td></tr>\n\n";
		 }
		 if ($ref=="ref2") 
		 {
		 	$conta2 += $unidades; 
		 	$total2 = 3*$conta2;
		 	echo "<td align=\"center\">$total2 &euro;</td></tr>\n\n";
		 }
		 if ($ref=="ref3") 
		 {
		 	$conta3 += $unidades; 
		 	$total3 = 2*$conta3;
		 	echo "<td align=\"center\">$total3 &euro;</td></tr>\n\n";
		 }
		 $totalUnidades += $unidades;
		 $suma=$total1+$total2+$total3;
		 }
		 }
		 echo "<tr>\n<th>\nTotal</th>\n";
		 echo "<td  align=\"center\">\n<b>$totalUnidades</b></td>\n";
		 echo "<td align=\"center\"><b>$suma &euro;</b></td></tr>\n\n";
		 echo "</table>\n";
		 return true;
 }
 //Método que muestra los artículos disponibles en la tienda
 function estantes($carrito){
 //Generación del query string que contiene las referencias
 //de los productos y las cantidades a llevar de cada uno
 $querystring = "";
 foreach($carrito as $ref => $unidades){
 $querystring .= "$ref=$unidades&";
 }
 echo <<<TABLA
 <table border="1" align="center">
 <colgroup>
 <col align="center" /><col />
 <col align="center" /><col />
 </colgroup>
 <tr>
 <th>Referencia</th>
 <th>Descripci&oacute;n</th>
 <th>Precio</th><th>&nbsp;</th>
 </tr>
 <tr>
 <td>ref1</td><td>Art&iacute;culo 1</td>
 <td>5 &euro;</td>
 <td>
 <a href="./compra.php?{$querystring}articulo=ref1" title="A&ntilde;adir al
carrito">
 Comprar
 </a>
 </td>
 </tr>
 <tr>
 <td>ref2</td><td>Art&iacute;culo 2</td>
 <td>3 &euro;</td>
 <td>
 <a href="./compra.php?{$querystring}articulo=ref2" title="A&ntilde;adir al
carrito">
 Comprar
 </a>
 </td>
 </tr>
 <tr>
 <td>ref3</td><td>Art&iacute;culo 3</td>
 <td>2 &euro;</td>
 <td>
 <a href="./compra.php?{$querystring}articulo=ref3" title="A&ntilde;adir al
carrito">
 Comprar
 </a>
 </td>
 </tr>
 </table>
TABLA;
 return true;
 }
?>
