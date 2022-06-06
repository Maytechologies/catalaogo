
<?php

//Declaramos una funcion con las sentencias para conectarnos a la DataBase

 function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'tigerfood_db');

    if (!$db) {
        echo "Error al conectar DB";
        exit;
    }

    return $db;
}
 



/* Parametros para conexion a base de datos en el HOSTING */

/* function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'tigerfoo_admin', '^gymv$}K%SMe', 'tigerfoo_db');

    if (!$db) {
        echo "Error al conectar DB";
      exit; 
    }

    return $db;
} */