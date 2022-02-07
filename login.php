<?php
require_once 'bd.php';
/*formulario de login habitual
si va bien abre sesión, guarda el nombre de usuario y redirige a principal.php 
si va mal, mensaje de error */
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	
	$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
	if($usu===false){
		$err = true;
		$usuario = $_POST['usuario'];
	}else{
		session_start();
		// $usu tiene campos correo y codRes, correo 
		$_SESSION['usuario'] = $usu;
		$_SESSION['carrito'] = [];
		header("Location: categorias.php");
		return;
	}	
}
?>
<?php include 'head.php'; ?>
	
	
	<div class="container text-center"> 
	<h3 class='h3 m-5 fw-normal'>
	<?php if(isset($_GET["redirigido"])){
			echo "Identifícate para continuar";
		}?>
		<?php if(isset($err) and $err == true){
			echo "<span class='text-warning'> Revisa os teus datos!</span>";
		}?>
		</h3>
		<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<label class="sr-only mb-3" for="usuario">Correo-e</label> 
			<input value="<?php if(isset($usuario))echo $usuario;?>"
			id="usuario" name="usuario" type="text" class="form-control mb-3" placeholder="Correo-e" required autofocus>		
			<label for="clave" class="sr-only mb-3">Contrasinal</label> 
			<input id="clave" name="clave" type="password" class="form-control" placeholder="Contrasinal" required>					
			<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lémbrame
        </label>
      </div>
			<button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
		</form>
		</div>
	

	<?php include 'footer.php'; ?>