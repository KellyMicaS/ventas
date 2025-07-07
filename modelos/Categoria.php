<?php
//Incluimos el archivo a la conexión de base de datos
// ../ se encarga de salir de la carpeta o nivel en donde está para buscar otra ruta, depende del nivel en el que se encuentre.
require "../config/Conexion.php";

//Creo la clase categoría
class Categoria{
    //Definimos un constructor
    //Constructor= un método en el que se va a ejecutar por primera vez al ejecutar la clase.
    public function __construct(){

    }
    //Definimos un método para insertar una categoria a la base de datos
    //Insertar un nuevo producto, usuario, etc. desde el formulario para insertarlo en la base de datos
    public function insertar($nombre, $descripcion){
        //Definimos una variable para almacenar la consulta
        $sql = "INSERT INTO categoria (nombre, descripcion, condicion)
        VALUES ($nombre, $descripcion, '1')";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);

    }
    //Definimos un método para editar una categoria
    public function editar($idcategoria, $nombre, $descripcion){
        //Definimos una variable para almacenar la consulta
        $sql = "UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' 
        WHERE idcategoria = '$idcategoria'";
        return ejecutarConsulta($sql);
    }
    //Definimos una funcion para activar una categoria
    public function activar($idcategoria){
        //Definimos una variable para almacenar la consulta
        $sql= "UPDATE categoria SET condicion = 1 
        WHERE idcategoria = '$idcategoria'";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);
    }
    //Definimos una funcion para desactivar una categoria
    public function desactivar($idcategoria){
        //Definimos una variable para almacenar la consulta
        $sql= "UPDATE categoria SET condicion = 0 
        WHERE idcategoria = '$idcategoria'";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);
    }  
    //Definimos una funcion de consulta para consultar una sola fila de la base de datos
    public function mostrar($idcategoria){
        //Definimos una variable para almacenar la consulta
        $sql= "SELECT * FROM  categoria WHERE idcategoria = '$idcategoria'";
        //Retornamos la consulta
        return ejecutarConsultaSimpleFila($sql);
    }
    //Definimos una funcion para listar las categorias
    public function listar(){
        //Definimos una variable donde se va a guardar la consulta
        $sql= "SELECT * FROM categoria";
        //Retornamos la consulta
        return ejecutarConsulta($sql);
    }

    //Definimos una funcion para listar las categorias activas
    public function select(){
        $sql= "SELECT * FROM categoria WHERE condicion = 1";
        //Retornamos la consulta
        return ejecutarConsulta($sql);
    }

}



?>