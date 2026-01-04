<?php

$dados = $_POST;

// Verificando os Campos, e depois os trata
if ((!filter_var($dados['email'], FILTER_VALIDATE_EMAIL) || strlen($dados['email']) > 180)
    && (filter_var($dados['nome'], FILTER_VALIDATE_INT) || strlen($dados['nome']) > 80)
    && (!is_string($dados['cpf']) ||  strlen($dados['cpf']) != 14)
) {

    echo json_encode(['message' => 'Preencha os Campos corretamente', 'error' => 1]);
    exit;
}
else {
    require './modelos/Clientes.php';

    $cli = new Clientes();
    $cli->Cadastrar($dados);
}


