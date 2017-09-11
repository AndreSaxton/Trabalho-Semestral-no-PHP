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
	.activeItem{
		background-color:#999; /*make some difference for the active item here */
	}
	.desactiveItem{
		background-color:none; /*make some difference for the active item here */
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
		function carregarDadosPessoa(cd_pessoa,t){		
		//function carregarDadosPessoa(cd_pessoa, nm_pessoa, nm_endereco_pessoa, cd_cep_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, nm_tipo_pessoa, /*cd_documento_pessoa,*/ nm_status_pessoa){
			
			parent.carregarDadosPessoa(cd_pessoa);
			//parent.carregarDadosPessoa(cd_pessoa, nm_pessoa, nm_endereco_pessoa, cd_cep_pessoa, cd_ddd_pessoa, cd_telefone_pessoa, nm_email_pessoa, nm_tipo_pessoa, /*cd_documento_pessoa,*/ nm_status_pessoa);			
			
			//echo "<tr class='um' onclick='carregarDadosPessoa(".$info['cd_pessoa'].",".$info['nm_pessoa'].",".$info['nm_endereco_pessoa'].",".$info['cd_cep_pessoa'].",".$info['cd_ddd_pessoa'].",".$info['cd_telefone_pessoa'].",".$info['nm_email_pessoa'].",".$info['nm_tipo_pessoa'].",".$info['cd_documento_pessoa'].",".$info['nm_status_pessoa'].")'>						
			
			if(prevItem != null)
				limpaClass(prevItem);
			
			if(prevItem != null){
				prevItem.className = prevItem.className.replace(/{\b}?activeItem/, "");				
			}			
				
		    t.className += " activeItem";
		    prevItem = t;			
		}
		var prevItem = null;	
		function limpaClass(item)
		{
			prevItem.className = " desactiveItem";
		}
	</script>

</head>
<body id="tabelaPessoa">
	<button id="buttonTestePrint"onclick="testePrint();">Imprimir</button>
	<br/>	
	<?php		
		
		
		$campoBusca =  $_GET["campoBusca"];
		$condicaoBusca =  $_GET["condicaoBusca"];
		$buscarPor =  $_GET["buscarPor"];
				
		$consulta = "SELECT * FROM pessoa";
		if(($campoBusca!="")||($condicaoBusca!="")||($buscarPor!="")){
			if($condicaoBusca=="Nome"){//se buscar nome{
				if($campoBusca =="")//se nao houver nada preenchido
					$consulta = $consulta. " WHERE nm_status_pessoa ='".$buscarPor."'";
				else
					$consulta = $consulta. " WHERE nm_pessoa = '".$campoBusca."' AND nm_status_pessoa ='".$buscarPor."'";
			}
			else{//se buscar documento
			/*
			$campoBusca=str_replace(",","",$campoBusca);//tira parte da string
			$campoBusca=str_replace(".","",$campoBusca);
			$campoBusca=str_replace("/","",$campoBusca);
			$campoBusca=str_replace("-","",$campoBusca);
			*/
			require_once('funcoesPHP.php');
			$campoBusca = limparDocumento($campoBusca);
			
				if($campoBusca =="")//se nao houver nada preenchido
					$consulta = $consulta. " WHERE nm_tipo_pessoa ='".$buscarPor."'";
				else
					$consulta = $consulta. " WHERE cd_documento_pessoa = '".$campoBusca."' AND nm_tipo_pessoa ='".$buscarPor."'";
					//nm_tipo_pessoa
			}
		}
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
			
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, ". $campoBusca." não encontrado";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		echo "<table>
			<tr class='dois'>
			<td> Código da Pessoa </td>			
			<td> Nome da Pessoa </td>			
			<td> Endereço </td>
			<td> CEP </td>
			<td> DDD </td>
			<td> Telefone </td>
			<td> Email </td>
			<td> Pessoa </td>
			<td> Documento </td>
			<td> Condição </td>
		</tr>";
		while($info = $busca->fetch_assoc()){
			if($info['nm_tipo_pessoa']=="Juridica"){
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 2, 0);//usar para incluir ponto
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 6, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 10, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "-", 15, 0);
			}
			else{
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 3, 0);//usar para incluir ponto
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], ".", 7, 0);
				$info['cd_documento_pessoa'] = substr_replace($info['cd_documento_pessoa'], "/", 11, 0);				
			}
		echo "<tr class='um' onclick='carregarDadosPessoa(".$info['cd_pessoa'].",this)'>	
			<td> ".$info['cd_pessoa']." </td>
			<td> ". $info['nm_pessoa']." </td>			
			<td> ". $info['nm_endereco_pessoa']." </td>
			<td> ". $info['cd_cep_pessoa']." </td>
			<td> ". $info['cd_ddd_pessoa']." </td>
			<td> ". $info['cd_telefone_pessoa']." </td>
			<td> ". $info['nm_email_pessoa']." </td>			
			<td> ". $info['nm_tipo_pessoa']." </td>
			<td> ". $info['cd_documento_pessoa']." </td>
			<td> ". $info['nm_status_pessoa']." </td>
		<tr/>";
        }
		echo "</table>";
        }
	?>	
</body>
</html>
