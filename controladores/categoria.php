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

         break;
        //Si elijo la opcion desactivar ejecuta esta seccion del codigo
        case 'desactivar':
            $rspta = $categoria->desactivar($idcategoria);
            echo $rspta ? "Categoria desactivada" : "No se pudo desactivar";
            break;
            case 'activar':
                $rspta = $categoria->activar($idcategoria);
                echo $rspta ? "Categoria activada" : "No se pudo activar";
                break;
                case 'mostrar':
                    $rspta = $categoria->mostrar ($idcategoria);
                    //Convertimos el resultado en json
                    echo json_encode($rspta);
                    break;
        
        //creamos el caso listar
        case 'listar':
            $rspta =$categoria->listar();
            //Vamos a declara un array para guardar 
            // /toda la información en el arreglo
            $data=Array();
            while($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idcategoria,
                    "1"=>$reg->nombre,
                    "2"=>$reg->descripcion,
                    "3"=>($reg->condicion) ? '<span class="label bg-green">Activado</span>':
                      '<span class="label bg-red">Desactivado</span>',
                    "4"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                     ' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':
                     ' <button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                     ' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>'

                );
            }
            //Vamos a generar información sobre datatable
            $results=array(
                "sEcho"=>1, //Información para el datatable
                "iTotalRecords"=>count($data), //enviamos el total de registros del datatable
                "iTotalDisplayRecords"=>($data), //enviamos total de registros a visualizar
                "aaData"=>$data);
                echo json_encode($results);
                break;
            
}
?>
