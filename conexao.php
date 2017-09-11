<?php

$host = 'serverpresentacao1309.database.windows.net';
$username = 'saxton';
$password = 'apresentac@0';
$db_name = 'bdapresentacao1309';
$conn = mysqli_init();
$conexao($host, $username, $password, $db_name, 3306);

//$conexao = new mysqli('localhost', 'root','', 'bdtrabalho'); 
//Variavel = new mysqli("servidor", "usuario", "senha", "banco") or die("Erro ao conectar");
	if (!$conexao)
	{ 
	 	die('problema na conexão');
	}
?>
