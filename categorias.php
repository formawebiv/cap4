<?php 	

	/*comprueba que el usuario haya abierto sesión o redirige*/
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>

<?php
	include 'head.php';  // head común do sitio
	require 'cabecera.php';
	?>

		<div class="container mt-3 mb-3">
		<h1>Lista de categorías</h1>		
		<!--lista de vínculos con la forma 
		productos.php?categoria=1-->
		<?php
		$categorias = cargar_categorias();
		if($categorias===false){
			echo "<p class='error'>Error al conectar con la base datos</p>";
		}else{
			echo "<ul>"; //abrir la lista
			foreach($categorias as $cat){				
				/*$cat['nombre] $cat['codCat']*/
				$url = "productos.php?categoria=".$cat['codCat'];
				echo "<li><a href='$url'>".$cat['nombre']."</a></li>";
			}
			echo "</ul>";
		}
		?>
	</div>

	<?php include 'footer.php'; ?>