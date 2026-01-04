<?php 

session_start();

if (!isset($_GET) or !isset($_SESSION["cliente"])) {

    echo json_encode(['message' =>  'Erro ao enviar os dados', 'error' => 1]);
    exit;
}

$dados = $_GET;

require './modelos/Diarios.php';

$d = new Diarios;
$d->getDiario_Cliente($_SESSION["cliente"]);
// $d->getDiario_Cliente($_SESSION["cliente"]["cpf"]);

?>