<?php
 if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Pedido_Proveedor.php");
    $Pedido_Proveedores = new Pedidos_Proveedores();
    

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {

        case 'GetPedidosProveedores':
            $datos =$Pedido_Proveedores->get_pedidos_proveedores();
            echo json_encode($datos);
            break;
        
        case 'GetPedidoProveedor':
            $datos =$Pedido_Proveedores->get_pedido_proveedor($body["ID"]);
            echo json_encode($datos);
            break;

        case 'InsertPedido':
            $datos=$Pedido_Proveedores->InsertPedido($body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido Agregado");
            break;

        case 'UpdatePedidoProveedor':
            $datos=$Pedido_Proveedores->update_pedido_proveedor($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Pedido Actualizado");
            break;

        case 'DeletePedidoProveedor':
            $datos=$Pedido_Proveedores->delete_pedido_proveedor($body["ID"]);
            echo json_encode("Pedido Eliminado");
            break;
 
    }

?>