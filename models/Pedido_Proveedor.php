<?php

    class Proveedores extends Conectar{

        public function get_proveedores(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos_proveedor ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_proveedor($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_pedidos_proveedor WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_socio($id_socio, $fecha_pedido, $detalle, $sub_total, $total_isv, $total, $fecha_entrega, $estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_pedidos_proveedor(ID_SOCIO,FECHA_PEDIDO,DETALLE,SUB_TOTAL,TOTAL_ISV,TOTAL,FECHA_ENTREGA,ESTADO)
            VALUES (?,?,?,?,?,?,?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_socio);
            $sql->bindValue(2, $fecha_pedido);
            $sql->bindValue(3, $detalle);
            $sql->bindValue(4, $sub_total);
            $sql->bindValue(5, $total_isv);
            $sql->bindValue(6, $total);
            $sql->bindValue(7, $fecha_entrega);
            $sql->bindValue(8, $estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function update_proveedor($id,$id_socio, $fecha_pedido, $detalle, $sub_total, $total_isv, $total, $fecha_entrega, $estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_pedidos_proveedor SET ID_SOCIO=?,  FECHA_PEDIDO=?, DETALLE=?, SUB_TOTAL=?, TOTAL_ISV=?, TOTAL=?, FECHA_ENTREGA=?,ESTADO=?
            WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_socio);
            $sql->bindValue(2, $fecha_pedido);
            $sql->bindValue(3, $detalle);
            $sql->bindValue(4, $sub_total);
            $sql->bindValue(5, $total_isv);
            $sql->bindValue(6, $total);
            $sql->bindValue(7, $fecha_entrega);
            $sql->bindValue(8, $estado);
            $sql->bindValue(9, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_proveedor($ID){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM ma_pedidos_proveedor WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
       

    }




?>