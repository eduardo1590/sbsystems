<?php 
	//require("conexion.php");
	//require("funciones.php");
	//$con=conectarli();
	$destino = "contacto@sbsystems.com.ve";
	$desde = "From:"."Contacto web";
	$asunto = "Informacion";
	$nombre = $_POST['nombre'];
	$correo = $_POST['email'];
	$mensaje = $_POST['mensaje'];
	$mensajeFinal = "Nombre: ".$nombre." Correo: ".$correo." Mensaje: ".$mensaje;
	echo $nombre."\n";
	echo $correo."\n";
	echo $mensaje."\n";
	mail($destino, $asunto, $mensajeFinal);
	/*$insert	= "call insertarMensaje('".$correo."','".$nombre."','".$apellido."','".$telefono."','".$empresa."','".$mensaje."')";
	$con->query($insert);*/
	//nuevoMensaje($con,$correo,$nombre,$apellido,$telefono,$empresa,$mensaje);
	//header('Location: ../index.html');
 ?>