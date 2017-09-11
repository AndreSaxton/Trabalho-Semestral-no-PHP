<?php	
		require_once('conexao.php'); //chama o arquivo de conexão com o banco			
		$pessoa =  $_GET["nCodigoPessoa"];
		$transacao =  $_GET["nTransacao"];
		$nome =  $_GET["nNome"];
		$valor =  $_GET["nValor"];
		$vencimento =  $_GET["nVencimento"];
		$pagamento =  $_GET["nPagamento"];				
		//$codigo = 2;
		//pega os dados no html
		$resultado = $conexao->query("INSERT INTO conta(nm_conta,vl_conta,cd_transacao_conta,dt_vencimento_conta,dt_pagamento_conta,cd_pessoa) VALUES('$nome','$valor','$transacao','$vencimento','$pagamento','$pessoa')"); //inserindo dados na tabela conta"	
	
		header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/gestaoFinanceira.php");
		//exit;*/		
?>	