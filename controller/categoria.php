<?php
require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$categoria = new Categoria();

switch ($_GET["op"]) {
  /* Guardar y Editar */
case "guardaryeditar":
  if(empty($_POST["cat_id"])){
    $categoria->insert_categoria($_POST["cat_nom"]);
  }else{
    $categoria->update_categoria($_POST["cat_id"], $_POST["cat_nom"]);
  }
  break;

  /* Listado de Registros */
  case "listar":
   $datos=$categoria->get_categorias();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["fech_crea"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["cat_id"].')" id="'.$row["cat_id"].'" class="btn btn-warning btn-icon waves-effect waves-light"><i class=" ri-pencil-fill"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["cat_id"].')" id="'.$row["cat_id"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
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
              $datos=$categoria->get_categoria_x_cat_id($_POST["cat_id"]);
              if (is_array($datos) == true and count($datos)>0){
                foreach ($datos as $row) {
                  $output["cat_id"] = $row["cat_id"];
                  $output["cat_nom"] = $row["cat_nom"];
                }

                echo json_encode($output);
              }
              break;
            
            case "eliminar";
            $categoria->delete_categoria($_POST["cat_id"]);
            break;
  default:
    break;
}

?>