<?php

   class Materiales extends Conectar{

      public function get_materiales(){
         $conectar= parent::conexion();
         parent::set_names();
         $sql="SELECT * FROM ma_materiales ";
         $sql=$conectar->prepare($sql);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function get_material($id){
         $conectar=parent::conexion();
         parent::set_names();
         $sql="SELECT * FROM ma_materiales WHERE ID = ?";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $id);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function insert_material($id, $descripcion, $unidad, $costo, $precio, $aplica_isv, $porcentaje_isv, $estado, $id_socio){
         $conectar=parent::conexion();
         parent::set_names();
         $sql="INSERT INTO ma_materiales(id, descripcion, unidad, costo, precio, aplica_isv, porcentaje_isv, estado, id_socio)
         VALUES(?,?,?,?,?,?,?,?,?);";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $id);
         $sql->bindValue(2, $descripcion);
         $sql->bindValue(3, $unidad);
         $sql->bindValue(4, $costo);
         $sql->bindValue(5, $precio);
         $sql->bindValue(6, $aplica_isv);
         $sql->bindValue(7, $porcentaje_isv);
         $sql->bindValue(8, $estado);
         $sql->bindValue(9, $id_socio);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function update_material($id, $costo, $precio, $aplica_isv, $porcentaje_isv, $estado, $id_socio){
         $conectar=parent::conexion();
         parent::set_names();
         $sql="UPDATE ma_materiales SET COSTO=?, PRECIO=?, APLICA_ISV=?, PORCENTAJE_ISV=?, ESTADO=?,ID_SOCIO=? WHERE ID = ?";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $costo);
         $sql->bindValue(2, $precio);
         $sql->bindValue(3, $aplica_isv);
         $sql->bindValue(4, $porcentaje_isv);
         $sql->bindValue(5, $estado);
         $sql->bindValue(6, $id_socio);
         $sql->bindValue(7, $id);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }

      public function delete_material($id){
         $conectar=parent::conexion();
         parent::set_names();
         $sql="DELETE FROM ma_materiales WHERE ID = ?";
         $sql=$conectar->prepare($sql);
         $sql->bindValue(1, $id);
         $sql->execute();
         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
      }   
   }
?>