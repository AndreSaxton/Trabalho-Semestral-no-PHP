<?php
/*
$serverName = "tcp:serverpresentacao1309.database.windows.net,1433";
$connectionOptions = array(
    "Database" => "bdapresentacao",
    "Uid" => "saxton",
    "PWD" => "apresentac@0"
);
//Establishes the connection
$conexao = sqlsrv_connect($serverName, $connectionOptions);
*/

//$conexao = new mysqli('localhost', 'root','', 'bdtrabalho'); 
$conexao = new mysqli('tcp:serverpresentacao1309.database.windows.net,1433', 'saxton','apresentac@0', 'bdtrabalho'); 
//Variavel = new mysqli("servidor", "usuario", "senha", "banco") or die("Erro ao conectar");
	if (!$conexao)
	{ 
	 	die('problema na conexão');
	}
?>
