<?php 

// namespace Modelos;

class Conexao {

    public $host = "localhost";
    private $user = "root";
    private $pass = "";
    public $db = "bd_tcc";

    private $con = null;

    function __construct() {
        try {
            $this->setCon(new \PDO("mysql:host=". $this->host .";dbname=". $this->db, $this->getUser(), $this->getPass()));
        }
        catch(\PDOException $e) {
            echo json_encode(["message" => "Erro com o Banco de Dados: " . $e->getMessage(), "error" => 2]);
        }
        catch(\Exception $e) {
            echo json_encode(["message" => "Erro: " . $e->getMessage(), "error" => 2]);
        }
    }

	/**
	 * @return string
	 */
	public function getUser() {
		return $this->user;
	}
	
	/**
	 * @return string
	 */
	public function getPass() {
		return $this->pass;
	}

	/**
	 * @return mixed
	 */
	public function getCon() {
		return $this->con;
	}

	/**
	 * @param mixed $con 
	 * @return self
	 */
	public function setCon($con): self {
		$this->con = $con;
		return $this;
	}
}


?>