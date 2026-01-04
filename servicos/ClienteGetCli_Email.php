<?php 

session_start();

if (isset($_SESSION["email"])) {
    
    echo json_encode(["message" => "", "error" => 0, "data" => $_SESSION["email"]]);
}
else {
    echo json_encode(["message" => "", "error" => 1]);
}

?>