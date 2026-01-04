<?php

// namespace Modelos;

class Clientes {
    
    private $conn = null;

    /*
        Erros:
        - error 0 -> Não há erro, apenas uma mensagem de Sucesso;
        - error 1 -> Erros que vão ser exibidos;
        - error 2 -> Erros exibidos apenas no Console;
    */

    public function __construct() {
        
        require 'Conexao.php';

        $c = new Conexao();
        $this->conn = $c->getCon();
    }

    /**
     * Registra o Cliente e seus respectivos Dados no Banco de Dados
     * 
     * @param array $dados Dados pessoais do Cliente que seram inseridos, dentre eles:
     *  Nome, CPF, Data de Nascimento, Telefone, E-mail e Senha
     */
    public function Cadastrar ($dados = []) {

        if (count($dados) != 0) {

            $nome = ucwords(strtolower(trim($dados["nome"])));
            $email = trim($dados["email"]);
            $cpf = trim($dados["cpf"]);
            $senha = password_hash($dados["senha"], PASSWORD_DEFAULT);

            if ($this->conn != null) {
                try {
    
                    // Verificando se o Usuário já foi Cadastrado, caso não, Registrar ele no Sistema
                    $busca = $this->conn->prepare("SELECT * FROM clientes WHERE email = :email");
                    $busca->bindParam(":email", $email);
                    $busca->execute();

                    if(count($busca->fetchAll()) > 0) {
                        $this->enviarJSON("Esse usuário já foi cadastrado!", 1);
                    }
                    else {
                        // Registando o Usuário no Banco de Dados...
                        $stmt = $this->conn->prepare("INSERT INTO clientes(cpf, nome, dataN, telefone, email, senha)
                                                    VALUES(:cpf, :nome, :dataN, :telefone, :email, :senha)");
                        $stmt->bindParam(":cpf", $cpf);
                        $stmt->bindParam(":nome", $nome);
                        $stmt->bindParam(":telefone", $dados["telefone"]);
                        $stmt->bindParam(":dataN", $dados["dataN"]);
                        $stmt->bindParam(":email", $email);
                        $stmt->bindParam(":senha", $senha);

                        if ($stmt->execute()) {
                            $this->enviarJSON("Usuário cadastrado", 0);
                        }
                        else {
                            $this->enviarJSON("Erro ao cadastrar usuário", 1);
                        }
                    }
                }
                catch (\PDOException $e) {
                    $this->enviarJSON("Erro com o Banco de Dados: ".$e->getMessage(), 2);
                }
    
            }
        }
    }

    /**
     * Executa o Login do Cliente no Site
     * 
     * @param array $dados Dados do Cliente a serem verificados, no caso: E-mail e Senha
     */
    public function Logar($dados = []) {

        if (count($dados) != 0) {

            $email = trim($dados["email"]);
            $senha = trim($dados["senha"]);

            if (!isset($_SESSION)) {
                session_start();
            }

            try {      
                // Buscando o E-mail no Banco de Dados...
                // Se existir um E-mail igual Cadastrado, verifica a Senha. Após isso Completa o Login 
                $busca = $this->conn->prepare("SELECT senha, cpf, email FROM clientes WHERE email = :email");
                $busca->bindParam(":email", $email);
                
                if ($busca->execute() && $busca->rowCount() != 0) {
                    $cli = $busca->fetch(); // Recebe a Senha criptografada com Password Hash

                    if(password_verify($senha, $cli["senha"])) {

                        $_SESSION["cliente"] = $cli["cpf"]; //Salvar login
                        
                        if ($dados["salvarLogin"] === "true") {

                            $_SESSION["email"] = $cli["email"];
                        }

                        $this->enviarJSON("Login concluido", 0);
                    }
                    else {
                        $this->enviarJSON("E-mail ou Senha incorreto", 1);
                    }
                }
                else {
                    $this->enviarJSON("E-mail ou Senha incorreto", 1);
                }  
            }
            catch(\PDOException $e) {
                $this->enviarJSON("Erro com Banco de Dados: ".$e->getMessage(), 2);
            }
        }

    }

    /**
     * Consulta o Banco de Dados e retorna um Cliente Especifico com base no CPF
     * 
     * @param string $cpf CPF do Cliente
     */
    public function GetCliente_Cpf($cpf) {

        try {

            $busca = $this->conn->prepare("SELECT * FROM Clientes WHERE cpf = :cpf");
            $busca->bindParam(":cpf", $cpf);
            
            if ($busca->execute()) {
                if ($busca->rowCount() > 0) {

                    $cliente = $busca->fetchAll(\PDO::FETCH_ASSOC);
                    $this->enviarJSON("", 0, $cliente);
                }
                else {
                    $this->enviarJSON("E-mail incorreto!", 1);
                }
            }
            else {
                $this->enviarJSON("Ocorreu um erro... tente novamente", 1);
            }
        }
        catch(\PDOException $e) {
            $this->enviarJSON("Erro com Banco de Dados: ".$e->getMessage(), 2);
        }
    }

    /**
     * Consulta o Banco de Dados e retorna um Cliente Especifico com base no E-mail
     * 
     * @param string $email E-mail do Cliente
     */
    public function GetCliente_Email($email) {
        try {
            
            $busca = $this->conn->prepare("SELECT * FROM Clientes WHERE email = :email");
            $busca->bindParam(":email", $email);
            $busca->execute();

            if ($busca->rowCount() > 0) {

                $cliente = $busca->fetchAll(\PDO::FETCH_ASSOC);
                $this->enviarJSON("", 0, $cliente);
            }
            else {
                $this->enviarJSON("E-mail incorreto!", 1);
            }
        }
        catch(\PDOException $e) {
            $this->enviarJSON("Erro com Banco de Dados: ".$e->getMessage(), 2);
        }
    }
    
    /**
     * Atualiza a Senha do Cliente com determinado E-mail
     * 
     * @param string $novaSenha Nova senha Hash
     * @param string $email E-mail que vai servir como referencia
     * @return void
     */
    public function AlterarSenha(string $novaSenha, string $email) {

        try {

            $stmt = $this->conn->prepare("UPDATE Clientes SET senha = :senha WHERE email = :email");
            $stmt->bindParam(":senha", $novaSenha);
            $stmt->bindParam(":email", $email);

            if ($stmt->execute()) {
                $this->enviarJSON("Senha alterada com sucesso!", 0);
            }
            else {
                $this->enviarJSON("Ocorreu um erro... tente novamente", 1);
            }
        }
        catch(\PDOException $e) {
            $this->enviarJSON("Erro com Banco de Dados: ".$e->getMessage(), 2);
        }
    }

    /** 
     * Retorna a resposta ao arquivo JS que requisitou
     * 
     * @param string $message Mensagem a ser exibida
     * @param int $error Erro na requisição - 0, 1, 2
     * @param array $data Os dados que iram retornar (opcional)
     * @return void
     */
    public function enviarJSON(string $message, int $error, array $data = []) {
        echo json_encode(["message" => $message, "error" => $error, "data" => $data]);
    }
}


?>