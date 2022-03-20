<?php

class Socios extends Conectar
{
    Public function get_socios(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocio;";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }
     Public function get_socio($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocio WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

      Public function insert_socio($id,$nombre,$razonsocial,$direccion,$tiposocio,$contacto,$email,$fechacreado,$estado,$telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_socios_negocio(id,nombre, razon_social,direccion,tipo_socio,contacto,email,fecha_creado,estado,telefono)
        VALUES (?,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $razonsocial);
        $sql->bindValue(4, $direccion);
        $sql->bindValue(5, $tiposocio);
        $sql->bindValue(6, $contacto);
        $sql->bindValue(7, $email);
        $sql->bindValue(8, $fechacreado);
        $sql->bindValue(9, $estado);
        $sql->bindValue(10, $telefono);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    Public function delete_socio($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM ma_socios_negocio WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    Public function update_socio($id,$nombre,$razonsocial,$direccion,$tiposocio,$contacto,$email,$fechacreado,$estado,$telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE ma_socios_negocio SET NOMBRE=?,RAZON_SOCIAL=?, DIRECCION=?, TIPO_SOCIO=?, CONTACTO =?,EMAIL=?, FECHA_CREADO=?,ESTADO=?,TELEFONO=? WHERE ID = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $razonsocial);
        $sql->bindValue(3, $direccion);
        $sql->bindValue(4, $tiposocio);
        $sql->bindValue(5, $contacto);
        $sql->bindValue(6, $email);
        $sql->bindValue(7, $fechacreado);
        $sql->bindValue(8, $estado);
        $sql->bindValue(9, $telefono);
        $sql->bindValue(10, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
 }


?>