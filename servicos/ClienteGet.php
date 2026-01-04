<?php 

session_start();

if (!isset($_SESSION['cliente'])) {

    echo json_encode(['message' => 'Ops, ocorreu um erro', 'error' => 1]);
    exit;
}

require('./modelos/Clientes.php');

$cli = new Clientes();
$cli->GetCliente_Cpf($_SESSION['cliente']);


?>