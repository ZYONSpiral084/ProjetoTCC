<?php 

// require '../plugins/composer/vendor/autoload.php';
// use Modelos\Clientes;

session_start();

if (!isset($_POST)) {

    echo json_encode(["message" => "Ocorreu um erro", "error" => 1]);
    exit;
}

$dados = $_POST;

// Verificando os Campos, e depois os trata
if ((!filter_var($dados['email'], FILTER_VALIDATE_EMAIL) || strlen($dados['email']) > 180)
    && strlen($dados["senha"]) > 16) {

    echo json_encode(['message' => 'Preencha os Campos corretamente', 'error' => 1]);
}
else {
    require './modelos/Clientes.php';

    $cli = new Clientes();
    $cli->Logar($dados);
}


?>