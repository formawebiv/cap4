<?php 
	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>
<?php
		include 'head.php';
		require 'cabecera.php';
		
		echo "<div class='container mt-3 mb-3'>";
		
		$cat = cargar_categoria($_GET['categoria']);
		$productos = cargar_productos_categoria($_GET['categoria']);		
		if($cat=== FALSE or $productos === FALSE){
			echo "<p class='error'>Error al conectar con la base datos</p>";
			exit;
		}
		echo "<h1>". $cat['nombre']. "</h1>";
		echo "<p>". $cat['descripcion']."</p>";		
		echo "<table class='table'>"; //abrir la tabla
		echo "<thead><tr><th scope='col'>Nombre</th><th scope='col'>Descripción</th><th scope='col'>Peso</th><th scope='col'>Stock</th><th scope='col'>Comprar</th></tr></thead>";
		foreach($productos as $producto){
			$cod = $producto['CodProd'];
			$nom = $producto['Nombre'];
			$des = $producto['Descripcion'];
			$peso = $producto['Peso'];
			$stock = $producto['Stock'];								
			echo "<tr><th scope='row'>$nom</th><td>$des</td><td>$peso</td><td>$stock</td>
			<td><form action = 'anadir.php' method = 'POST'>
			<input name = 'unidades' type='number' min = '1' value = '1' class='little-input'>
			<input type = 'submit' value='Comprar'><input name = 'cod' type='hidden' value = '$cod'>
			</form></td></tr>";
		}
		echo "</table>";	
		?>
		
		
		
	<?php echo "</div>";
	include 'footer.php'; ?>