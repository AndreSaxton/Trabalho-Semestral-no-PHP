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
			top: -110px;
		}
		#busca{
			position: relative;
			left: 150px;
			top: -110px;
			display:none;			
		}	
		#btn{			
			position: relative;
		}
		#teste{
			display: inline-block;
			background-color: #dddddd;
			padding: 10px;
			margin: 2px;
			color: black;			
		}
	</style>
	
	<script language="javascript">		
	
		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			//var campoBusca ="André";
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 99%;"></object>';
			//document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?'+campoBusca+'" style="width:100%; height: 300px;"></object>';
			mostraDireita();
			
			//funcaoSalvarPessoa.php?nNome=Cristiane+Fornazieri+Saxton+Verges&nCep=11700170&nEndereco=Rua+Rui+Barbosa%2C+605%2C+apto+308&nDDD=&nTelefone=1334739008&nEmail=&nTipoPessoa=Fisica&nDocumento=&nStatus=Cliente
			//'campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'"
			document.getElementById("testeCondicao").innerHTML += condicaoBusca;
			document.getElementById("testeBuscarPor").innerHTML += buscarPor;
			document.getElementById("testeCampo").innerHTML += campoBusca;
		}
		function mostraDiv(){
			document.getElementById("busca").style.display="block";			
		}
		function someBuscaPessoa(){							
			document.getElementById("busca").style.display="none";
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "block";			
		}
		
	</script>
</head>
<body>
	<h1>Selecione para onde quer ir</h1>
	
	<input id="btn" type="submit" value="Mostrar todos" onclick="exibirTabelaPessoa()"/>
	<br/><br/>
	<input id="btn" type="submit" value="Buscar" onclick="mostraDiv()">	
	<br/><br/>
	<a id="btn" href="salvarPessoa.php"><input type="submit" value="Cadastrar"></a>
	<br/><br/>
	<a id="btn" href="index.php"><input type="submit" value="Voltar"></a>
	
	<aside id="direita">
		<?php
			//include("exibirTabelaPessoa.php");
		?>
	</aside>
	<aside id="busca">
		<?php
			include("buscarPessoa.php");
		?>
	</aside>
	
	
	<a href="gestaoPessoa.php" id="teste" onclick="myfunction()" type="button">A new Window</a> 
<script>
    var myWindow; 
    function abc() {
        alert("abc");
    };

    function myfunction() {
        var teste = prompt("Buscar por:");
        //<button type="button1" onclick="opener.abc()">Call parentabc<\/button>;
        

        //myWindow.document.write();

    };
</script>
<p id="testeCondicao">Condição:</p>
<p id="testeBuscarPor">Buscar por:</p>
<p id="testeCampo">Campo de Busca:</p>
</body>
</html>