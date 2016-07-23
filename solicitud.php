<?php

	if(file_exists("usuario.txt")){
		$fp = fopen("usuario.txt", "r");
		echo "<center><H1>Usuarios Registrados:</H1>";
		echo "<table border=2>";
		echo "<tr><td>Usuario</td><td>Edad</td></tr>";
		while(!feof($fp)) {
		$linea = fgets($fp);
		$tmp=explode("-",$linea);
		echo "<tr><td>".$tmp[0]. "</td><td>".$tmp[1]."</td></tr>";
		}
		echo "</table>";
		echo "<br/>";
		echo "</center>";
		fclose($fp);
		}else{
		echo "El archivo NO EXISTE";
		}

	if(isset($_POST['nombre'])){
		$nombre=$_POST['nombre'];
		}else{
		$nombre="";
		}
		if(isset($_POST['edad'])){
		$edad=$_POST['edad'];
		}else{
		$edad="";
		}
		if(empty($nombre) && empty($edad)){
		echo "<center><H3>Es necesario llenar ambos campos</center><br/></H3>";
		}else{
		$fp = fopen("usuario.txt", "a+");
		fputs($fp, "\n$nombre - $edad");
		fclose($fp);
		echo "<H3><center>¡El usuario ha sido registrado con éxito!. Revisar el archivo .txt</center><br/></H3>";
		echo "<br/>";
		echo "<center><form name='f3' action='index.html' method='POST'>";
		echo "<input type='submit' name='Enviar' value='Regresar a registro'>";
		echo "</form></center>";
		}
		
?>