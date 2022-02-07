<?php
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require_once 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>

		
		<?php 
		require 'head.php';
		require 'cabecera.php';
		echo "<div class='container mt-3 mb-3'>";

		$productos = cargar_productos(array_keys($_SESSION['carrito']));
		if($productos === FALSE){
			echo "<h4 class='text-warning'>Non hai produtos no pedido</h4>";
			exit;
		}
		
		echo "<h2>Carrito de la compra</h2>";
		echo "<table class='table'>"; //abrir la tabla
		echo "<thead><tr><th scope='col'>Nombre</th><th scope='col'>Descripción</th><th scope='col'>Peso</th><th scope='col'>Unidades</th><th scope='col'>Quitar</th></tr></thead>";
		foreach($productos as $producto){
			$cod = $producto['CodProd'];
			$nom = $producto['Nombre'];
			$des = $producto['Descripcion'];
			$peso = $producto['Peso'];
			$unidades = $_SESSION['carrito'][$cod];								
			
			//print_r($producto);				
			echo "<tr><td scope='row'>$nom</td><td>$des</td><td>$peso</td><td>$unidades</td>
			<td><form action='eliminar.php' method='POST'>
			<input name='unidades' type='number' min='1' value='1' class='little-input'>
			<button type='submit' value='Quitar'><i class='bi bi-x-square' style='font-size: 1.18rem; color: cornflowerblue;'></i></button>
			<input name='cod' type='hidden' value = '$cod'>  </form></td></tr>";	
		}
		echo "</table>";						
		?>
		<hr>
		<a href = "procesar_pedido.php">Realizar pedido</a>		
	</div>

	<?php include 'footer.php'; ?>