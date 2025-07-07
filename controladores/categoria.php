<?php
//Todo es para enviar a la base de datos
//Incluimos el archivo categoria.php
require_once "../modelos/Categoria.php";
//Instanciamos la clase Categoria= creamos el nuevo objeto
$categoria= new Categoria();

//Definimos una variable para almacenar el idcategoria
//isset= verificar si lo que enviamos es información nula, ejemplo: si entra informacion verdadera pasa, si no tiene nada es nulo y devuelve un error
$idcategoria= isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]): "";

//Definimos una variable para almacenar el nombre
$nombre= isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]): "";

//Definimos una variable para almacenar la descripcion
$descripcion= isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]): "";

//Generamos un switch para determinar la accion a realizar
switch ($_GET["op"]){
    case 'guardaryeditar' :
        if (empty($idcategoria)){
            $rspta = $categoria->insertar($nombre, $descripcion);
            print $rspta ? "Categoria registrada con éxito." : "No se pudo registrar la caategoria a la base de datos.";
        }
        else{
            $rspta= $categoria->editar($idcategoria, $nombre, $descripcion);
            print $rspta ? "Categoria editada exitosamente." : "No se pudo editar la categoria en la base de datos.";
        }

        
}




?>