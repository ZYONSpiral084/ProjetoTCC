<?php 

if(isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    require "./modelos/Clientes.php";

    $email = $_POST['email'];
    $cli = new Clientes();
    $cli->GetCliente_Email($email);
}
else {
    echo json_encode(["message" => "Preencha o campo corretamente!", "error" => 1]);
}


?>