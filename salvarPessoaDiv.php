<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>	
	<style>		
		#btn{				
			position: absolute;			
			margin: 2px;
			float: left;	
			display: inline-block;
			bottom: 0px;
		}
		a#btn{		
			left: 70px;
		}
		a{				
			position: relative;			
			margin: 2px;
			float: right;	
			display: inline-block;
		}
					
		#formCadastro{
			margin: 0px;
			color: blue;
			display: block;
			float: none;
			overflow: hidden;
			width: auto;
			height: auto;
		}
		
	</style>
	<script language="javascript">					
		
	</script>
	
</head>
<body>	
<?php	
		$codigo = isset($_GET["nCodigo"]) ? $_GET["nCodigo"] : '';
		//$codigo = $_GET["nCodigo"];
		
		$consulta = "SELECT * FROM pessoa WHERE cd_pessoa = '".$codigo."'";
		
		require_once('conexao.php'); //chama o arquivo de conexão com o banco		
					
		$verifica = $conexao->query($consulta);
        $rows = $verifica->num_rows;
        
		$busca = $conexao->query($consulta);     
		//busca os dados na tabela 
		
		if($codigo != ""){		
			while($info = $busca->fetch_assoc()){
				$codigo = $info["cd_pessoa"];
				$nome = $info['nm_pessoa'];
				$endereco = $info['nm_endereco_pessoa'];
				$cep = $info['cd_cep_pessoa'];
				$ddd = $info['cd_ddd_pessoa'];
				$telefone = $info['cd_telefone_pessoa'];
				$email = $info['nm_email_pessoa'];
				$tipo = $info['nm_tipo_pessoa'];
				$documento = $info['cd_documento_pessoa'];
				$status = $info['nm_status_pessoa'];
			}
		}
		else{
			$codigo = "";
			$nome = "";
			$endereco = "";
			$cep = "";
			$ddd = "";
			$telefone = "";
			$email = "";
			$tipo = "";
			$documento = "";
			$status = "";
		}
?>
		<form method="GET" name="cadastroPessoa" action="validarSalvarPessoa.php" id="formCadastro">
			<p>Código:<input type="number" name="nCodigoPessoa" id="iCodigo" readonly="readonly" value="<?php echo $codigo?>"/></p>
			<p>Nome:<input type="text" name="nNome" id="iNome" required value="<?php echo $nome?>"/></p>
			<p>CEP:<input type="text" name="nCep" id="iCep" required value="<?php echo $cep?>"/></p>		
			<p>Endereço:<input type="text" name="nEndereco" id="iEndereco" required value="<?php echo $endereco?>"/></p>
			<p>DDD:<input type="number" name="nDDD" id="iDDD" required value="<?php echo $ddd?>"/></p>
			<p for="iTelefone">Telefone:<input type="number" name="nTelefone" id="iTelefone" required value="<?php echo $telefone?>"/></p>
			<p>Email:<input type="mail" name="nEmail" id="iEmail" required value="<?php echo $email?>"/></p>
			<p>Tipo de Pessoa:
				<select name="nTipoPessoa" id="iTipoPessoa">
					<option value="Fisica" <?php if($tipo=='Fisica') echo 'selected';?>>Fisica</option>
					<option value="Juridica" <?php if($tipo=='Juridica') echo 'selected';?>>Juridica</option>
				</select>
			</p>		
			<p>Documento:<input type="text" name="nDocumento" id="iDocumento" required value="<?php echo $documento?>"/></p>
			<p>Cadastrar como:
				<select name="nStatus" id="iStatus">
					<option value="Cliente" <?php if($status=='Cliente') echo 'selected';?>>Cliente</option>
					<option value="Fornecedor" <?php if($status=='Fornecedor') echo 'selected';?>>Fornecedor</option>
				</select>
			</p>			
			<input id="btn" type="submit" value="Validar"/>		
		</form>			
		<a id="btn" onclick="window.history.back();"><button>Cancelar</button></a>
</body>
</html>