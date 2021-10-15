<?php

    //Conexión
    $user = "root"; //Usuario
    $password = ""; //Contraseña va vacía
    $host = "localhost";
    $db = "salsamentaria";

    //Error de conexión
    $conection = mysqli_connect($host,$user,$password,$db);

    if(!$conection){
        echo"Error en la conexion";
    }
?>