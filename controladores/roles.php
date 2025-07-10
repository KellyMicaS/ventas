<?php
//Todo es para enviar a la base de datos
//Incluimos el archivo roles.php
require_once "../modelos/Roles.php";
//Instanciamos la clase Roles= creamos el nuevo objeto
$roles= new Roles();

//Definimos una variable para almacenar el idroles
//isset= verificar si lo que enviamos es información nula, ejemplo: si entra informacion verdadera pasa, si no tiene nada es nulo y devuelve un error
$idcategoria= isset($_POST["idroles"]) ? limpiarCadena($_POST["idroles"]): "";

//Definimos una variable para almacenar el nombre
$nombre= isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]): "";

//Generamos un switch para determinar la accion a realizar
switch ($_GET["op"]){
    case 'guardaryeditar' :
        if (empty($idroles)){
            $rspta = $roles->insertar($nombre);
            print $rspta ? "Rol registrado con éxito." : "No se pudo registrar el rol a la base de datos.";
        }
        else{
            $rspta= $roles->editar($idroles, $nombre);
            print $rspta ? "Rol editado exitosamente." : "No se pudo editar el rol en la base de datos.";
        }

        
}




?>