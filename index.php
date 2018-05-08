<?php

require_once("config.php");

$sql = new Sql();//para encontrar a classe criada na mesma pasta


//após encontrar essa classe 'Sql', irá executar um comando no banco de dados
$usuarios = $sql->select("SELECT * FROM tb_usuarios");// pesquisar todos os dados dos usuários

echo json_encode($usuarios);

?>