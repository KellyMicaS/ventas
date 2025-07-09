<?php
//Todo es para enviar a la base de datos
//Incluimos el archivo cliente.php
require_once "../modelos/Cliente.php";
//Instanciamos la clase Cliente= creamos el nuevo objeto
$cliente= new Cliente();

//Definimos una variable para almacenar el idcategoria
//isset= verificar si lo que enviamos es información nula, ejemplo: si entra informacion verdadera pasa, si no tiene nada es nulo y devuelve un error
$idcliente= isset($_POST["idcliente"]) ? limpiarCadena($_POST["idcliente"]): "";

//Definimos una variable para almacenar el nombre
$nombre= isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]): "";

//Definimos una variable para almacenar el apellido
$apellido= isset($_POST["apellido"]) ? limpiarCadena($_POST["apellido"]): "";

//Definimos una variable para almacenar el tipo de documento
$tipo_documento= isset($_POST["tipo_documento"]) ? limpiarCadena($_POST["tipo_dpcumento"]): "";

//Definimos una variable para almacenar el numero de documento
$numero_documento= isset($_POST["numero_documento"]) ? limpiarCadena($_POST["numero_documento"]): "";

//Definimos una variable para almacenar la direccion
$direccion= isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]): "";

//Definimos una variable para almacenar el apellido
$telefono= isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]): "";

//Definimos una variable para almacenar el apellido
$email= isset($_POST["email"]) ? limpiarCadena($_POST["email"]): "";

//Generamos un switch para determinar la accion a realizar
switch ($_GET["op"]){
    case 'guardaryeditar' :
        if (empty($idcliente)){
            $rspta = $cliente->insertar($nombre, $apellido, $tipo_documento, $numero_documento, $direccion, $telefono, $email);
            print $rspta ? "Cliente registrado con éxito." : "No se pudo registrar el cliente en la base de datos.";
        }
        else{
            $rspta= $cliente->editar($idcliente, $nombre, $apellido, $tipo_documento, $numero_documento, $direccion, $telefono, $email);
            print $rspta ? "Cliente editado exitosamente." : "No se pudo editar el cliente en la base de datos.";
        }

        
}




?>