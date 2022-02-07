<?php
	//session_start();    // unirse a la sesión
						//comprobar si existe la variable usuario????
	require_once 'sesiones.php';	
	comprobar_sesion();
	$_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), 123, time() - 1000); // eliminar la cookie
?>
<?php include 'head.php';?>

<div class="container text-center"> 
	<h4 class='h3 m-5 fw-normal'>Pecháchela sesión de xeito correcto. Atá próxima!</h4>

		<a href = "login.php">&larr; ir á páxina de login</a>
	


<?php include 'footer.php';?>