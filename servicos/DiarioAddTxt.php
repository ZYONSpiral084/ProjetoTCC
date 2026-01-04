<?php 

if (!isset($_POST)) {

    echo json_encode(["message" => "Ocorreu um erro ao enviar os dados...", "error" => 1]);
    exit;
}

$dados = $_POST;

if (!empty($dados['titulo']) && !empty($dados['texto']) && !empty($dados['data'])) {

    require "./modelos/Diarios.php";

    $diario = new Diarios();
    $diario->addDiario($dados);
}
else {
    echo json_encode(["message" => "Preencha os campos", "error" => 1]);
}



?>