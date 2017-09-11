<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<style>
		table{
			border: 1px solid black;
			border-collapse: collapse;	
		}
		table td{
			border: 1px solid black;
		}
		button{
			margin: 4px;
		}		
	</style>
	<script language="javascript">		
		function testePrint(){
			document.getElementById("buttonTestePrint").style.display = "none";			
			 //self.print();
			 window.print();
			 document.getElementById("buttonTestePrint").style.display = "block";	
		}
	</script>
</head>
<body>
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php
	require_once('conexao.php'); //chama o arquivo de conexão com o banco			
		
		$campoBusca =  $_GET["campoBusca"];
		$campoBusca2 =  $_GET["campoBusca2"];
		$condicaoBusca =  $_GET["condicaoBusca"];
		$buscarPor =  $_GET["buscarPor"];
		
		if($buscarPor!=""){
			if($buscarPor=="Gasto")
				$buscarPor = 0;
			else
				$buscarPor = 1;
		}
				
		//$consulta = "SELECT * FROM conta ";
		$consulta = "SELECT conta.*, pessoa.nm_pessoa 
					 FROM conta JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa";
				  //"SELECT conta.*, pessoa.nm_pessoa FROM conta INNER JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa");
		if(($campoBusca!="")||($campoBusca2!="")||($condicaoBusca!="")||($buscarPor!="")){
			if($condicaoBusca=="Nome"){//se buscar nome{
				if(($campoBusca =="")||($campoBusca2 =="")){//se um dos dois campos estiverem vazios
					$consulta = $consulta. " WHERE cd_transacao_conta =".$buscarPor."";
					
					if(($campoBusca !="")&&($campoBusca2 =="")){//se apenas o campo 2 estiver vazio
						$consulta = $consulta." AND nm_conta ='".$campoBusca."'";
					}
					elseif(($campoBusca =="")&&($campoBusca2 !="")){//se apenas o campo 1 estiver vazio}
						$consulta = $consulta." AND conta.cd_pessoa =".$campoBusca2."";
					}					
				}	
				else{//os dois campos estao preenchidos
						$consulta = $consulta. " WHERE cd_transacao_conta =".$buscarPor." AND nm_conta ='".$campoBusca."' AND conta.cd_pessoa =".$campoBusca2."";						
				}
			}
			else{//se buscar por periodo
				if($campoBusca =="")//se nao houver nada preenchido
					$consulta = $consulta. " WHERE cd_transacao_conta ='".$buscarPor."'";
				else
					$consulta = $consulta. " WHERE dt_vencimento_conta = '".$campoBusca."' AND cd_transacao_conta ='".$buscarPor."'";	
			}
		}
		//olhar linha 20 a 40. 
		//ver consulta por beneficiario, na tabela conta tem apenas cd_pessoa

		
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao inserir informação";
			echo $consulta;
        }
		else{		
		//$busca = $conexao->query("SELECT conta.*, pessoa.nm_pessoa FROM conta INNER JOIN pessoa ON conta.cd_pessoa=pessoa.cd_pessoa");   
		$busca = $conexao->query($consulta);
				
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código da Conta </td>			
			<td> Nome da Conta </td>			
			<td> Valor </td>
			<td> Data de Vencimento </td>
			<td> Data de Pagamento </td>
			<td> Tipo da Transação </td>
			<td> Nome da Pessoa </td>
		</tr>";
		while($info = $busca->fetch_assoc()){
			if ($info['cd_transacao_conta'] == 0)
				$info['cd_transacao_conta'] = "Gasto";
			else
				$info['cd_transacao_conta'] = "Lucro";
		echo "<tr class='um'>
			<td> ".$info['cd_conta']." </td>
			<td> ". $info['nm_conta']." </td>
			<td> R$ ". number_format( $info['vl_conta'],2,',','.')." </td>
			<td> ". $info['dt_vencimento_conta']." </td>
			<td> ". $info['dt_pagamento_conta']." </td>
			<td> ". $info['cd_transacao_conta']." </td>
			<td> ". $info['nm_pessoa']." </td>
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>