<?php

class Diarios {

    private $conn = null;

    /*
        Erros:
        - error 0 -> Não há erro, apenas uma mensagem de Sucesso;
        - error 1 -> Erros que vão ser exibidos;
        - error 2 -> Erros exibidos apenas no Console;
    */
    public function __construct() {

        require "Conexao.php";

        $c = new Conexao();
        $this->conn = $c->getCon();
    }

    /**
     * Registra o Diário no Banco de Dados, e o associa com o Cliente cadastrado
     * 
     * @param array $dados Array Associativo, contendo dados a serem registrados, como: título, texto, número da página(página atual)
     */
    public function addDiario($dados):void {
        
        if (count($dados) != 0) {

            if (!isset($_SESSION)) {
                session_start();
            }

            try {
                $pagina = $this->getPagina($_SESSION['cliente']);

                // Registrando Diário(texto do diário) no Banco de Dados, e criando a chave estrangeira (id_cliente - cpf)
                $stmt = $this->conn->prepare('INSERT INTO Diarios (titulo_pagina, texto_pagina, numero_pagina, id_cliente)
                                                VALUES(:titulo_pagina, :texto_pagina, :numero_pagina, :id_cliente)');
                $stmt->bindParam(':titulo_pagina', $dados['titulo']);
                $stmt->bindParam(':texto_pagina', $dados['texto']);
                $stmt->bindParam(':numero_pagina', $pagina);
                $stmt->bindParam(':id_cliente', $_SESSION['cliente']);

                if ($stmt->execute()) {

                    echo json_encode(['message' => 'Diario criado com sucesso!', 'error' => 0]);
                }
                else {
                    echo json_encode(['message' => 'Ocorreu um erro, tente novamente', 'error' => 1]);
                }
            }
            catch(PDOException $e) {
                echo json_encode(['message' => 'Erro com Banco de Dados: ' . $e->getMessage(), 'error' => 2]);
            }
        }

    }

    /**
     * Summary of getDiario
     * @param int $id_cli
     * @return void
     */
    public function getDiario($id_cli):void {

        try {

            $busca = $this->conn->prepare('SELECT * FROM Diarios WHERE id_cliente = :id_cliente ORDER BY numero_pagina ASC');
            $busca->bindParam(':id_cliente', $id_cli);
            $busca->execute();
            
            $diario = $busca->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['message' => '', 'error' => 0, 'data' => $diario]);
        }
        catch(PDOException $e) {
            echo json_encode(['message' => 'Erro no Banco de Dados: ' . $e->getMessage(), 'error' => 2]);
        }
    }

    public function getDiario_Cliente($cpf) {

        try {

            $busca = $this->conn->prepare("SELECT d.*, c.nome AS nome_cliente 
                                           FROM diarios AS D INNER JOIN clientes AS C 
                                           ON d.id_cliente = c.cpf
                                           WHERE d.id_cliente = :id_cli");
            $busca->bindParam(':id_cli', $cpf);
            $busca->execute();

            if ($busca->rowCount() > 0) {

                $dados = $busca->fetchAll(PDO::FETCH_ASSOC);

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['dados'] = $dados;
                echo json_encode(['error' => 0, 'data' => $dados]);
            }
            else {
                echo json_encode(['message' => 'Você não enviou nenhum texto do diário!', 'error' => 1]);
            }
        }
        catch(PDOException $e) {
            echo json_encode(['message' => 'Erro no Banco de Dados: ' . $e->getMessage(), 'error' => 2]);
        }
    }

    /**
     * Retorna a página do texto com base no número de Textos já escritos pelo Cliente
     * @param int $id_cli CPF do Cliente
     * @return int Número de páginas
     */
    public function getPagina($id_cli):int {
        try {

            $busca = $this->conn->prepare("SELECT texto_pagina FROM Diarios WHERE id_cliente = :id_cliente");
            $busca->bindParam(':id_cliente', $id_cli);
            $busca->execute();

            $registros = $busca->rowCount(); 
        }
        catch(PDOException $e) {
            echo json_encode(['message' => 'Erro no Banco de Dados: ' . $e->getMessage(), 'error' => 2]);
        }

        return $registros;
    }

}

?>