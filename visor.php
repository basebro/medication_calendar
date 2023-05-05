<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Calendario Medicaci&oacute;n</title>
	<link rel="shortcut icon" href="favicon.jpg" />
</head>

<body>


	<?php
	$medicacion = $_POST["medicacion"];
	$primera = $_POST["primera"];
	$desayuno = $_POST["desayuno"];
	$almuerzo = $_POST["almuerzo"];
	$penultima = $_POST["penultima"];
	$cena = $_POST["cena"];
	$descripcion = $_POST["descripcion"];
	$foto = $_POST["foto"];


	$servername = "127.0.0.1";
	$database = "medicacion";
	$username = "admin";
	$password = "";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	?>

	<?php
	$servername = "localhost";
	$database = "medicacion";
	$username = "admin";
	$password = "";
	$conexion = new mysqli($servername, $username, $password, $database);

	if (!$conexion) {
		exit('ERROR EN LA CONEXION');
	}

	$consulta = "SELECT * FROM datos";
	$resultado = $conexion->query($consulta);

	if (!$resultado) {
		exit('ERROR EN LA CONSULTA');
	}

	?>
	<table class="default" border=1>
		<tr>
			<th>Medicaci&oacute;n</th>
			<th>07:00</th>
			<th>Desayuno</th>
			<th>Almuerzo</th>
			<th>19:00</th>
			<th>Cena</th>
			<th>Descripci&oacute;n</th>
			<th>Foto</th>
		</tr>

		<?php

		$total = 0;
		while ($fila = $resultado->fetch_assoc()) {

			echo "<tr>";
			echo "<td align='center'>";
			echo $fila['medicacion'];
			echo "</td>";

			$startTd = "<td align='center' style='background-color:";
			$endTd = "'>";
			$closeTd = "</td>";

			echo $startTd . checkEmpty($fila['primera']) . $endTd . !empty($fila['primera']) . $closeTd;
			echo $startTd . checkEmpty($fila['desayuno']) . $endTd . !empty($fila['desayuno']) . $closeTd;
			echo $startTd . checkEmpty($fila['almuerzo']) . $endTd . !empty($fila['almuerzo']) . $closeTd;
			echo $startTd . checkEmpty($fila['penultima']) . $endTd . !empty($fila['penultima']) . $closeTd;
			echo $startTd . checkEmpty($fila['cena']) . $endTd . !empty($fila['cena']) . $closeTd;

			echo "<td align='center'>";
			echo $fila['descripcion'];
			echo "</td>";

			echo "<td align='center'>";
			echo $fila['foto'];
			echo "</td>";

			echo "</tr>";

			$total = $total + $fila['primera'];
		}

		function checkEmpty($var)
		{
			return !empty($var) ? 'green' : 'red';
		}

		?>

	</table>

	<form action="formulario.php" method="post">
		<p><input type="submit" value="volver" /></p>
	</form>

	<?php
	echo 'PHP version: ' . phpversion();
	?>

</body>
</html>