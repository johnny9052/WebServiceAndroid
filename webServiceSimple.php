<?php

/*Recepcion de los 2 datos que se enviaran por post y que ya estan en formato JSON*/
$usuario = $_POST['imagen'];
$obj = json_decode($usuario);

/*Esto es de prueba, solo es para verificar que los datos recibidos se encuentren correctamente.
Se crea un archivo para los datos de usuario, y otro para los datos del test*/
$fileUser = fopen($obj->{'nombre'}.".txt", "w") or die("Unable to open file!");
fwrite($fileUser, $obj->{'imagen'});
fclose($fileUser);

function base64_to_jpeg($base64_string, $output_file) {
    $ifp = fopen($output_file, "wb"); 
    $data = explode(',', $base64_string);
    fwrite($ifp, base64_decode($data[0])); 
    fclose($ifp); 
    return $output_file; 
}

$image = base64_to_jpeg($obj->{'imagen'},$obj->{'nombre'}.'.jpg');

/*Finalmente se responde la peticion del consumo del webservice.*/
print (json_encode(array('respuesta' => 'Exito en la operacion', 'var2'=> 'xxx')));
?>
