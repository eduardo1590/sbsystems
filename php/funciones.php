<?php 
	function insertarMensaje($con,$id,$mensaje){
		$insert = "INSERT INTO mensajes (mensajes.idContacto, mensajes.mensaje) VALUES (".$id.",'".$mensaje."')";
		$con -> query($insert);
	}

	function verificarContacto($con,$correo){
		$select = "SELECT id FROM contacto WHERE contacto.Correo = '".$correo."'";
		$resultado = $con -> query($select);
		$filas = $resultado -> num_rows;
		echo $filas;
		if ($filas > 0){
			$objeto = $resultado -> fetch_array(MYSQLI_NUM);
			echo $objeto[0];
			return $objeto[0];
		}
		return 0;
	}

	function insertarContacto($con,$correo,$nombre,$apellido,$telefono,$empresa){
		$insert = "INSERT into contacto (Correo,Nombre,Apellido,Telefono,Empresa) VALUES ('".$correo."','".$nombre."','".$apellido."','".$telefono."','".$empresa."')";
		$con -> query($insert);
	}

	function nuevoMensaje($con,$correo,$nombre,$apellido,$telefono,$empresa,$mensaje){
		$id = verificarContacto($con,$correo);
		if ($id != 0){
			insertarMensaje($con,$id,$mensaje);
		}
		else{
			insertarContacto($con,$correo,$nombre,$apellido,$telefono,$empresa);
			$id = verificarContacto($con,$correo);
			insertarMensaje($con,$id,$mensaje);
		}

	}

	function determinarConsulta($criterio,$dato){
		if (strcmp($criterio, "marca") == 0){
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE marca like '%".$dato."%'";
		}
		else if (strcmp($criterio, "modelo") == 0){
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE modelo like '%".$dato."%'";
		}
		else {
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE codigo like '%".$dato."%'";
		}
		return $select;
	}

	/*function buscar($con, $criterio, $dato){

		if (strcmp($criterio, "marca") == 0){
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE marca like '%".$dato."%'";
			echo $select;
			$resultado = $con -> query($select);
			print("<table>");
			while ($rows = $resultado->fetch_assoc()) {
				print("<tr>");
				print("<td>".$rows["marca"]."</td>");
				print("<td>".$rows["modelo"]."</td>");
				print("<td>".$rows["ano"]."</td>");
				print("<td>".$rows["motor"]."</td>");
				print("<td>".$rows["denso"]."</td>");
				print("<td>".$rows["codigo"]."</td>");
				print("</tr>");
			}
			print("</table>");
			$resultado->free();
		}
		else if (strcmp($criterio, "modelo") == 0){
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE modelo like '%".$dato."%'";
			echo $select;
			$resultado = $con -> query($select);
			print("<table>");
			while ($rows = $resultado->fetch_assoc()) {
				print("<tr>");
				print("<td>".$rows["marca"]."</td>");
				print("<td>".$rows["modelo"]."</td>");
				print("<td>".$rows["ano"]."</td>");
				print("<td>".$rows["motor"]."</td>");
				print("<td>".$rows["denso"]."</td>");
				print("<td>".$rows["codigo"]."</td>");
				print("</tr>");
			}
			print("</table>");
			$resultado->free();
		}
		else {
			$select="SELECT marca,modelo,ano,motor,denso,codigo FROM catalogo WHERE codigo like '%".$dato."%'";
			echo $select;
			$resultado = $con -> query($select);
			print("<table>");
			while ($rows = $resultado->fetch_assoc()) {
				print("<tr>");
				print("<td>".$rows["marca"]."</td>");
				print("<td>".$rows["modelo"]."</td>");
				print("<td>".$rows["ano"]."</td>");
				print("<td>".$rows["motor"]."</td>");
				print("<td>".$rows["denso"]."</td>");
				print("<td>".$rows["codigo"]."</td>");
				print("</tr>");
			}
			print("</table>");
			$resultado->free();
		}
	}*/

?>