<?php
//Llamo al archivo global.php
require_once "global.php";

//Creo una variable de tipo conexión para conectarme a la BD mediante los atributos
//La variable se convierte en un objeto con atributos
$conexion= new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Creamos una variable para almacenar la conexión, query=consulta
//' ' . se usan para concatenar cadenas de caracteres con las variables
mysqli_query($conexion, ' SET NAMES "'.DB_ENCODE.'"');

//Verificamos si la conexión a la BD fue exitosa
//erno() es una funcion verificadora de errores
if(mysqli_connect_errno())
{
    printf("Falló la conexión a la base de datos: %s\n", mysqli_connect_errno());
    exit();
}else{
    printf("Conexión exitosa a la base de datos: %s\n", DB_NAME);
}


?>