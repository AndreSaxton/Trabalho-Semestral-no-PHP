	<?php		
		
		
		$codigo =  $_GET["nCodigo"];
				
		$consulta = "SELECT * FROM pessoa WHERE cd_pessoa = '".$codigo."'";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        if($rows == 0){ //verifica se a informação chegou
            echo "falha ao buscar, ". $codigo." não encontrado";
			//echo $consulta;
        }else{		
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		echo "<table>";
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
		echo "<tr>	
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
		//ver como retornar os valores
		echo $info['nm_pessoa'];
	?>