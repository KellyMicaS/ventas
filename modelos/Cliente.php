<?php
//Incluimos el archivo a la conexión de base de datos
// ../ se encarga de salir de la carpeta o nivel en donde está para buscar otra ruta, depende del nivel en el que se encuentre.
require "../config/Conexion.php";

//Creo la clase cliente
class Cliente{
    //Definimos un constructor
    //Constructor= un método en el que se va a ejecutar por primera vez al ejecutar la clase.
    public function __construct(){

    }
    //Definimos un método para insertar un cliente a la base de datos
    //Insertar un nuevo producto, usuario, etc. desde el formulario para insertarlo en la base de datos
    public function insertar($nombre, $apellido, $tipo_documento, $numero_documento, $direccion, $telefono, $email){
        //Definimos una variable para almacenar el cliente
        $sql = "INSERT INTO cliente (nombre, apellido, tipo_documento, numero_documento, direccion, telefono, email)
        VALUES ($nombre, $apellido, $tipo_documento, $numero_documento, $direccion, $telefono, $email)";
        //Retornamos el resultado de la consulta
        return ejecutarConsulta($sql);

    }
    //Definimos un método para editar un cliente
    public function editar($idcliente, $nombre, $apellido, $tipo_documento, $numero_documento, $direccion, $telefono, $email){
        //Definimos una variable para almacenar la consulta
        $sql = "UPDATE categoria SET nombre='$nombre', apellido='$apellido', tipo_documento='$tipo_documento',
        numero_documento='$numero_documento', direccion='$direccion', telefono='$telefono', email='$email'
        WHERE idcliente = '$idcliente'";
        return ejecutarConsulta($sql);
    }
    //Definimos una funcion de consulta para consultar una sola fila de la base de datos
    public function mostrar($idcliente){
        //Definimos una variable para almacenar la consulta
        $sql= "SELECT * FROM  cliente WHERE idcliente = '$idcliente'";
        //Retornamos la consulta
        return ejecutarConsultaSimpleFila($sql);
    }
    //Definimos una funcion para listar los clientes
    public function listar(){
        //Definimos una variable donde se va a guardar la consulta
        $sql= "SELECT * FROM cliente";
        //Retornamos la consulta
        return ejecutarConsulta($sql);
    }

}



?>