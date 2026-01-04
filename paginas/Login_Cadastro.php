<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro e Login de Clientes</title>
  <!-- FAV-ICON -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon_.ico">
  <link rel="apple-touch-icon" href="paginas/image/favicon/apple-touch-icon.png">
  
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="paginas/styles/LoginCadastro.css">
  
</head>
<body>
  <div class="effect">
    <div class="response">
    </div>
  </div>

  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="" enctype="multipart/form-data">
        <h1>Cadastre-se</h1>
        <input type="text" placeholder="CPF" id="cpf" required>
        <input type="text" placeholder="Nome" id="nome">
        <input type="date" placeholder="Data" id="dataN">
        <input type="text" placeholder="Telefone" id="telefone">

        <input type="email" placeholder="E-mail" id="emailC" required>
        <input type="password" placeholder="Senha" id="senhaC" required>
        <button type="submit" id="btnRegistrar">Registrar</button>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="">
        <h1>Login</h1>
        <input type="email" placeholder="E-mail" id="email" required>
        <input type="password" placeholder="Senha" id="senha" required>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox_SalvarSenha" placeholder="-"> <!-- Salvar Senha -->
            <label>Lembrar-me</label>
          </div>
          <div class="pass-link">
            <a id="esqueceuSenha">Esqueceu a Senha?</a> <!-- href="paginas/ConfirmarEmail.html" -->
          </div>
        </div>
        <button type="submit" id="btnEntrar">Entrar</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Olá </h1>
          <p>se você já tiver uma conta, faça o login aqui!</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>

          <svg class="loader">
            <!-- <circle cx="40" cy="40" r="35"></circle> -->
          </svg>

        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Se registre <br>agora </h1>
          <p>caso não tenha uma conta ainda, venha aqui e crie a sua.</p>
          <button class="ghost" id="register">Cadastrar
            <i class="lni lni-arrow-right register"></i>
          </button>

          <svg class="loader">
            <!-- <circle cx="40" cy="40" r="35"></circle> -->
          </svg>

        </div>
      </div>
    </div>

  </div>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
  <script src="paginas/scripts/jquery/jquery-3.5.1.min.js"></script>
  <script src="paginas/scripts/jquery/jquery.mask.min.js"></script>
  <script src='paginas/scripts/CadastroLogin.js'></script>
</body>
</html>