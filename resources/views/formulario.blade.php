<!DOCTYPE html>
<html>
<head>
    <title>Comprobar datos</title>

</head>
<body>
<h1>Tus Datos de suscripción: </h1>
<p>Estos son los datos que nos has enviado:</p>
<?php
echo "Nombre: "; echo $_POST['name']; echo "<br/>";
echo "apellidos: "; echo $_POST['surname']; echo "<br/>";
?>
</body>
</html>