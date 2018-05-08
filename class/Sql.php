<?php 

// pode ser colocado qualquer nome na 'class'
class Sql extends PDO {

	private $conn; // conexão privada

	//método construtor para conectar direto no banco de dados
	public function __construct() {

		$this->conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");
	} //com isto já se concta com o banco de dados

	private function setParams($statment, $parameters = array()){

		//para associar os paramE~tros a este comando
		foreach ($parameters as $key => $value) {
			
			$this->setParam($key, $value);
		}

	}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}


	//para executar os comandos no banco de dados
	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
		
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}

}

?>