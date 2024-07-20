<?php

class Usuario extends Conectar{
  /* TODO: Acceso al Sistema */
  public function login(){
    $conectar=parent::Conexion();
    
    if (isset($_POST["enviar"])){
      $correo = $_POST["usu_correo"];
      $pass = $_POST["usu_pass"];

      if (empty($correo) and empty($pass)) {
        exit();

      }else {
        $sql="call sp_l_usuario_01 (?,?)";
        $query=$conectar->prepare($sql);
        $query->bindValue(1, $correo);
        $query->bindValue(2, $pass);
        $query->execute();
        $resultado=$query->fetch();

        if (is_array($resultado) and count($resultado)>0) {
          $_SESSION["usu_id"] = $resultado["usu_id"];
          $_SESSION["usu_nom"] = $resultado["usu_nom"];
          $_SESSION["usu_ape"] = $resultado["usu_ape"];
          $_SESSION["usu_correo"] = $resultado["usu_correo"];

          header("Location:".Conectar::ruta()."view/home/");

        } else {
            exit();
        }
        
      }
    }else {
      exit();
    }
  }

}
?>