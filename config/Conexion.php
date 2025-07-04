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

//Definir un conjunto de funciones que nos ayude a la consulta de la BD 
if(!function_exist('ejecutarConsulta')){
    //$sql es para conectarse a la base de datos con CURP, select, insert, update, delete
    function ejecutarConsulta($sql){
        global= $conexion;

        //Creo una variable para almacenar el resultado de la consulta
        $query= $conexion->($sql);

        //Retorno el resultado de la consulta
        return $query;
    }

    //Creo una funcion que me permita obtener una sola fila de una tabla de la BD, recibe un parámetro
    function ejecutarConsultaSimpleFila($sql){
        //conectamos a la DB
        global= $conexion;

        //creo una variable para almacenar el resultado de la consulta
        $query= $conexion->query($sql);

        //obtengo una fila de la consulta, fetch_assoc es para seleccionar la fila
        $row= $query->fetch_assoc();

        //retorno a la fila obtenida
        return $row;
    }


}


?>