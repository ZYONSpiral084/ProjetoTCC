<?php 

$_PUT = array();

// Verifica se a Requisição HTTPS é do tipo PUT, e pega os valores da URL e passa para o Array $_PUT
if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
    parse_str(file_get_contents('php://input'), $_PUT);
}

// Se exitir a Senha na requisição começa o processo para Alterar a Senha
if (isset($_PUT["senha"])) {
    
    require "./modelos/Clientes.php";

    $senha = password_hash($_PUT["senha"], PASSWORD_DEFAULT);
    $cli = new Clientes();
    $cli->AlterarSenha($senha, $_PUT["email"]);
}
else {
    echo json_encode(["message" => "Preencha os campos!", "error" => 1]);
}


?>