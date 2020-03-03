<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
 <?php
	echo '<h1>Docker Compose funcionando</h1>';
	
	phpinfo();
	
	if (function_exists("mysqli_connect")) {
		//mysqli está instalado
		echo "Si";
	}

	// Podemos usar el nombre que le hemos dado a la BBDD en docker-compose.yml
	// o usar la IP de la máquina virtual Docker, en mi caso 192.168.99.107
	$enlace = mysqli_connect("mysql", "froga", "froga", "froga");

	/* comprobar la conexión */
	if (mysqli_connect_errno()) {
		printf("Conexión fallida: %s\n", mysqli_connect_error());
		exit();
	}

	/* comprobar si el servidor sigue funcionando */
	if (mysqli_ping($enlace)) {
		printf ("¡La conexión está bien!\n");
	} else {
		printf ("Error: %s\n", mysqli_error($enlace));
	}

	/* cerrar la conexión */
	mysqli_close($enlace);
 ?>
 </body>
</html>