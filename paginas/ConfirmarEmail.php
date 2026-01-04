<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAV-ICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon_.ico">
    <link rel="apple-touch-icon" href="paginas/image/favicon/apple-touch-icon.png">

    <title>Esqueceu Senha - Confirmar E-mail </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="paginas/styles/TrocarSenha.css">
</head>
<body>

    <div class="effect">
        <div class="response">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form method="POST" autocomplete="">
                    <h2 class="text-center">Esqueceu a Senha</h2>
                    <p class="text-center">Informe o seu E-mail</p>
                    <div class="form-group">
                        <input class="form-control" type="email" id="email" placeholder="E-mail: exemplo@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" id="btnContinuar" value="Continuar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="paginas/scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="paginas/scripts/EsqueceuSenha.js"></script>
</body>
</html>