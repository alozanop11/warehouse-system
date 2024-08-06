<?php
require_once("../config/conexion.php");
require_once("../models/Unidad.php");

$unidad = new Unidad();

switch ($_GET["op"]) {
  /* Guardar y Editar */
case "guardaryeditar":
  if(empty($_POST["und_id"])){
    $unidad->insert_unidad($_POST["und_nom"]);
  }else{
    $unidad->update_unidad($_POST["und_id"], $_POST["und_nom"]);
  }
  break;

  /* Listado de Registros */
  case "listar":
   $datos=$unidad->get_unidades();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["und_nom"];
                $sub_array[] = $row["fech_crea"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["und_id"].')" id="'.$row["und_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class=" ri-pencil-fill"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["und_id"].')" id="'.$row["und_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

            case "mostrar":
              $datos=$unidad->get_unidad_x_und_id($_POST["und_id"]);
              if (is_array($datos) == true and count($datos)>0){
                foreach ($datos as $row) {
                  $output["und_id"] = $row["und_id"];
                  $output["und_nom"] = $row["und_nom"];
                }

                echo json_encode($output);
              }
              break;
            
            case "eliminar";
            $unidad->delete_unidad($_POST["und_id"]);
            break;
  default:
    break;
}

?>