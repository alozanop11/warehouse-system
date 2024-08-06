<?php
class Unidad extends Conectar {
  /*Create-Insertar Unidad */
  public function insert_unidad($und_nom){
    $conectar=parent::Conexion();
    $sql="call sp_i_unidad_01 (?)";
    $query=$conectar->prepare($sql);
    $query->bindValue(1,$und_nom);
    $query->execute();
  }

  /* Read-Listar Unidades */
public function get_unidades(){
  $conectar=parent::Conexion();
  $sql="call sp_l_unidad_01()";
  $query=$conectar->prepare($sql);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/* Listar Regsitro por ID Unidad */
public function get_unidad_x_und_id($und_id){
  $conectar=parent::Conexion();
  $sql="call sp_l_unidad_02 (?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$und_id);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/* Update-Actualizar Unidad */
public function update_unidad($und_id,$und_nom){
  $conectar=parent::Conexion();
  $sql="call sp_u_unidad_01 (?,?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$und_id);
  $query->bindValue(2,$und_nom);
  $query->execute();
}

 /* Delete-Elminar Unidad */
public function delete_unidad($und_id){
  $conectar=parent::Conexion();
  $sql="call sp_d_unidad_01 (?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$und_id);
  $query->execute();
}
}
?>