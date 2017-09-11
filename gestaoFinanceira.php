<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	
	<?php
	
	?>
	
	<style>
		#direita{
			position: relative;
			color: blue;
			display: none;
			float: right;
			width: 50%;
			height: 600px;
			border-style: solid;
			border-width: 2px 2px 2px 2px;
			overflow:auto;
			top: -114px;
		}
		#busca{
			position: relative;
			left: 150px;
			top: -135px;
			display:none;			
		}		
	</style>
	
	<script language="javascript">	
	
		
		function someBuscaConta(){			
			document.getElementById("busca").style.display="none";
		}		
		function exibirTabelaConta(campoBusca="",campoBusca2="", condicaoBusca="", buscarPor=""){
			
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaConta.php?campoBusca='+campoBusca+'&campoBusca2='+campoBusca2+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			
			mostraDireita();			
			
			document.getElementById("testeCondicao").innerHTML += condicaoBusca;
			document.getElementById("testeBuscarPor").innerHTML += buscarPor;
			document.getElementById("testeCampo").innerHTML += campoBusca;
			document.getElementById("testeCampo2").innerHTML += campoBusca2;
		}
		function mostraDiv(){
			document.getElementById("busca").style.display="block";			
		}		
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}		
		
	</script>
</head>
<body>
	<h1>Selecione para onde quer ir</h1>
	
	<input type="submit" value="Mostrar todos" onclick="exibirTabelaConta()">	
	<br/>
	<br/>
	<input type="submit" value="Buscar" onclick="mostraDiv()"/>	
	<br/>
	<br/>	
	<a href="salvarConta.php"><input type="submit" value="Cadastrar"></a>
	<br/><br/>
	<a href="index.php"><input type="submit" value="Voltar"></a>
	
	<aside id="direita">
		<?php
		?>		
	</aside>
	
	<aside	id="busca">
		<?php			
			include("buscarConta.php");
		?>
	</aside>
	<p id="testeCondicao">Condição:</p>
	<p id="testeBuscarPor">Buscar por:</p>
	<p id="testeCampo">Campo de Busca:</p>
	<p id="testeCampo2">Campo de Busca2:</p>
</body>
</html>