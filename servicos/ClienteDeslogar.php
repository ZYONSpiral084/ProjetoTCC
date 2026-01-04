<?php  

session_start();

if (isset($_SESSION["cliente"])) {

    if (!isset($_GET['email'])) {

        unset($_SESSION['cliente']);
    }
    else {
        
        session_destroy();
    }
    echo json_encode(['message' => 'Conta deslogada', 'error' => 0]);
}
else {
    echo json_encode(['message' => 'Você não está logado!', 'error' => 1]);
}

?>