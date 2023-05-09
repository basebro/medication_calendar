<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Calendario Medicaci&oacute;n</title>
	<link rel="shortcut icon" href="favicon.jpg" />
</head>

<body>

	<?php

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


	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$medicacion = $_POST["medicacion"];
		$primera = $_POST["primera"];
		$desayuno = $_POST["desayuno"];
		$almuerzo = $_POST["almuerzo"];
		$penultima = $_POST["penultima"];
		$cena = $_POST["cena"];
		$descripcion = $_POST["descripcion"];

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["foto"]["name"]);

		$uploadOk = checkPicture($target_file);
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
				$sql = "INSERT INTO datos (medicacion, primera, desayuno, almuerzo, penultima, cena, descripcion, foto) 
	  VALUES ('" . $medicacion . "', '" . $primera . "', '" . $desayuno . "', '" . $almuerzo . "', '" . $penultima . "', '" . $cena . "', '" . $descripcion . "', '" . $target_file . "');";

				if (mysqli_query($conn, $sql)) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	$consulta = "SELECT * FROM datos";
	$resultado = $conn->query($consulta);

	if (!$resultado) {
		exit('ERROR EN LA CONSULTA');
	}
	mysqli_close($conn);

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
			echo "<img height=150 src='" . $fila['foto'] . "' alt='foto'>";
			echo "</td>";
			echo "</tr>";
			$total++;
		}

		function checkPicture($target_file)
		{
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			$check = getimagesize($_FILES["foto"]["tmp_name"]);

			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}

			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}

			// Check file size 5 MB
			if ($_FILES["foto"]["size"] > 5000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			return $uploadOk;
		}

		function checkEmpty($var)
		{
			return !empty($var) ? 'green' : 'red';
		}

		?>

	</table>
	<?php
		echo 'Total: ' . $total;
	?>
	<form action="formulario.php">
		<p><input type="submit" value="Insertar" /></p>
	</form>

	<?php
	 echo 'PHP version: ' . phpversion();
	?>

</body>
</html>