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
    $Proveedores = new Proveedores();
    

    $body = json_decode(file_get_contents("php://input"), true);

    switch ($_GET["op"]) {

        case 'GetProveedores':
            $datos =$Proveedores->get_proveedores();
            echo json_encode($datos);
            break;
        
        case 'GetProveedor':
            $datos =$Proveedores->get_proveedor($body["ID"]);
            echo json_encode($datos);
            break;

        case 'InsertSocio':
            $datos=$Proveedores->insert_socio($body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Proveedor Agregado");
            break;

        case 'UpdateProveedor':
            $datos=$Proveedores->update_proveedor($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
            echo json_encode("Proveedor Actualizado");
            break;

        case 'DeleteProveedor':
            $datos=$Proveedores->delete_proveedor($body["ID"]);
            echo json_encode("Proveedor Eliminado");
            break;
 
    }

?>