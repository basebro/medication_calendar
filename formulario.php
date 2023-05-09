<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>A&ntilde;adir Medicaci&oacute;n</title>
	<link rel="shortcut icon" href="favicon.jpg" />
</head>

<body>

	<form action="visor.php" enctype="multipart/form-data" method="post">
		<p>Medicaci&oacute;n: <input type="text" name="medicacion" required /></p>
		<p>07:00: <input type="text" name="primera" required/></p>
		<p>Desayuno: <input type="text" name="desayuno" required/></p>
		<p>Almuerzo: <input type="text" name="almuerzo" required/></p>
		<p>19:00: <input type="text" name="penultima" required/></p>
		<p>Cena: <input type="text" name="cena" required/></p>
		<p>Descripci&oacute;n: <input type="text" name="descripcion" required/></p>
		<p>Foto: <input type="file" name="foto" required/></p>
		<p><input type="submit" value="Enviar" name="submit"/></p>
	</form>

	<a href="visor.php">
    <button>Volver al visor</button>
</a>
</body>

</html>