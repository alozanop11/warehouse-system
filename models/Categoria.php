<?php
class Categoria extends Conectar {
  /*Create-Insertar Categoria */
  public function insert_categoria($cat_nom){
    $conectar=parent::Conexion();
    $sql="call sp_i_categoria_01 (?)";
    $query=$conectar->prepare($sql);
    $query->bindValue(1,$cat_nom);
    $query->execute();
  }

  /* Read-Listar Categorias */
public function get_categorias(){
  $conectar=parent::Conexion();
  $sql="call sp_l_categoria_01()";
  $query=$conectar->prepare($sql);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/* Listar Regsitro por ID Categoria */
public function get_categoria_x_cat_id($cat_id){
  $conectar=parent::Conexion();
  $sql="call sp_l_categoria_02 (?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$cat_id);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

/* Update-Actualizar Categoria */
public function update_categoria($cat_id,$cat_nom){
  $conectar=parent::Conexion();
  $sql="call sp_u_categoria_01 (?,?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$cat_id);
  $query->bindValue(2,$cat_nom);
  $query->execute();
}

 /* Delete-Elminar Categoria */
public function delete_categoria($cat_id){
  $conectar=parent::Conexion();
  $sql="call sp_d_categoria_01 (?)";
  $query=$conectar->prepare($sql);
  $query->bindValue(1,$cat_id);
  $query->execute();
}
}
?>