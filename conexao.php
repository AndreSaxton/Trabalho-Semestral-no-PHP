<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:serverpresentacao1309.database.windows.net,1433; Database = bdapresentacao", "saxton", "apresentac@0");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
$conexao = $conn;

//$conexao = new mysqli('localhost', 'root','', 'bdtrabalho'); 
//Variavel = new mysqli("servidor", "usuario", "senha", "banco") or die("Erro ao conectar");
	if (!$conexao)
	{ 
	 	die('problema na conexão');
	}
?>
