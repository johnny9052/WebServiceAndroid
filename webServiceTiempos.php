<?php

/*Recepcion de los 2 datos que se enviaran por post y que ya estan en formato JSON*/
$tiempos = $_POST['tiempos'];

/*Esto es de prueba, solo es para verificar que los datos recibidos se encuentren correctamente.
Se crea un archivo para los datos de usuario, y otro para los datos del test*/
$fileUser = fopen("tiempos.txt", "w") or die("Unable to open file!");
fwrite($fileUser, $tiempos);
fclose($fileUser);


/*Finalmente se responde la peticion del consumo del webservice.*/
print (json_encode(array('respuesta' => 'Exito en la operacion')));
?>
