<?php
//Incluimos el archivo a la conexión de base de datos
// ../ se encarga de salir de la carpeta o nivel en donde está para buscar otra ruta, depende del nivel en el que se encuentre.
require "../config/Conexion.php";

//Creo la clase Roles
class Roles{
    //Definimos un constructor
    //Constructor= un método en el que se va a ejecutar por primera vez al ejecutar la clase.
    public function __construct(){

    }
    //Definimos un método para insertar un Rol a la base de datos
    //Insertar un nuevo producto, usuario, etc. desde el formulario para insertarlo en la base de datos
    public function insertar($nombre){
        //Definimos una variable para almacenar la consulta
        $sql = "INSERT INTO roles (nombre, condicion)
        VALUES ($nombre, '1')";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);

    }
    //Definimos un método para editar los roles
    public function editar($idroles, $nombre){
        //Definimos una variable para almacenar la consulta
        $sql = "UPDATE roles SET nombre='$nombre' WHERE idroles = '$idroles'";
        return ejecutarConsulta($sql);
    }
    //Definimos una funcion para activar los roles
    public function activar($idroles){
        //Definimos una variable para almacenar la consulta
        $sql= "UPDATE roles SET condicion = 1 
        WHERE idroles = '$idroles'";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);
    }
    //Definimos una funcion para desactivar una categoria
    public function desactivar($idroles){
        //Definimos una variable para almacenar la consulta
        $sql= "UPDATE roles SET condicion = 0 
        WHERE idroles = '$idroles'";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);
    }  
    //Definimos una funcion de consulta para consultar una sola fila de la base de datos
    public function mostrar($idroles){
        //Definimos una variable para almacenar la consulta
        $sql= "SELECT * FROM  roles WHERE idroles = '$idroles'";
        //Retornamos la consulta
        return ejecutarConsultaSimpleFila($sql);
    }
    //Definimos una funcion para listar los roles
    public function listar(){
        //Definimos una variable donde se va a guardar la consulta
        $sql= "SELECT * FROM roles";
        //Retornamos la consulta
        return ejecutarConsulta($sql);
    }

    //Definimos una funcion para listar los roles activas
    public function select(){
        $sql= "SELECT * FROM roles WHERE condicion = 1";
        //Retornamos la consulta
        return ejecutarConsulta($sql);
    }

}



?>