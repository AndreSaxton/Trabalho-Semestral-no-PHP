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
	$resultado = $conexao->query("UPDATE pessoa SET nm_pessoa ='$nome', nm_endereco_pessoa ='$endereco', cd_documento_pessoa ='$documento', nm_tipo_pessoa ='$tipo',nm_status_pessoa = '$status',cd_ddd_pessoa = '$ddd',cd_telefone_pessoa = '$telefone',nm_email_pessoa = '$email',cd_cep_pessoa = '$cep' WHERE cd_documento_pessoa = '$documento'"); //inserindo dados na tabela mercadoria"
	
	header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoPessoa.php");
?>