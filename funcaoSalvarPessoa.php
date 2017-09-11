<?php

	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
	$nome =  $_GET["nNome"];
	$endereco =  $_GET["nEndereco"];
	$cep =  $_GET["nCep"];
	$ddd =  $_GET["nDDD"];
	$telefone =  $_GET["nTelefone"];
	$email =  $_GET["nEmail"];
	$tipo =  $_GET["nTipoPessoa"];
	$documento =  $_GET["nDocumento"];
	$status =  $_GET["nStatus"];
	//pega os dados no html
	$resultado = $conexao->query("INSERT INTO pessoa(nm_pessoa, nm_endereco_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, cd_cep_pessoa, nm_tipo_pessoa, cd_documento_pessoa, nm_status_pessoa) VALUES('$nome','$endereco','$ddd','$telefone','$email','$cep','$tipo', '$documento','$status')"); //inserindo dados na tabela mercadoria"
	
	header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoPessoa.php");
?>