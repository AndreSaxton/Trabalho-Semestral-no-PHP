<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<?php
		/*function salvarConta(){	
			require_once('funcaoSalvarConta.php');
			$salvar = new Salvar();
			$salvar->funcaoSalvarConta($_GET["nNome"], $_GET["nValor"], $_GET["nVencimento"], $_GET["nPagamento"]);
			header("Location: http://localhost/Trabalho%20Semestral%20no%20PHP/exibirTabelaConta.php");
		}*/
	?>	
	<style>
		#buscaPessoa, #buscaConta{
			position: relative;
			left: 325px;			
			display:none;
		}	
		#btn{
			
			position: relative;
			float: left;
			margin: 2px;
		}
		#direita, #direitaPessoa{
			color: blue;
			display: none;
			float: right;
			width: 60%;
			height: auto;
			overflow:auto;
			border-style: solid;
			border-width: 2px 2px 2px 2px;			
		}
		#esquerda{
			color: blue;
			display: block;
			float: left;
			width: auto;
			height: auto;
			border-style: solid;
			border-width: 2px 2px 2px 2px;
		}
		
		
	</style>
	<script language="javascript">	
		function exibirTabelaPessoa(campoBusca="", condicaoBusca="",buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaPessoa.php?campoBusca='+campoBusca+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 440px;"></object>';
			
			mostraDireita();
			//document.getElementById("direitaPessoa").style.display = "inline-block";
		}
		function exibirTabelaConta(campoBusca="",campoBusca2="", condicaoBusca="", buscarPor=""){
			document.getElementById("direita").innerHTML='<object type="text/html" data="exibirTabelaConta.php?campoBusca='+campoBusca+'&campoBusca2='+campoBusca2+'&condicaoBusca='+condicaoBusca+'&buscarPor='+buscarPor+'" style="width:100%; height: 440px;"></object>';
			
			mostraDireita();
		}
		function mostraDireita(){			
			document.getElementById("direita").style.display = "inline-block";
		}
		function mostraDireitaPessoa(){			
			document.getElementById("direita").style.display = "inline-block";
		}
		function mostraBuscaPessoa(){
			someDiv()			
			document.getElementById("buscaPessoa").style.display = "block";			
		}		
		function mostraBuscaConta(){
			someDiv();
			document.getElementById("buscaConta").style.display = "block";			
		}
		function someDataPagamento(){
			var teste = document.getElementById("iCheckPagamento").checked;
			if(teste == true)
				document.getElementById("iPagamento").readOnly="true";
			else
				document.getElementById("iPagamento").removeAttribute("readonly");
			document.getElementById("iPagamento").valueAsDate = null;
		}		
		function teste(){
			document.getElementById("testeCondicao").innerHTML += condicaoBusca;
			document.getElementById("testeBuscarPor").innerHTML += buscarPor;
			document.getElementById("testeCampo").innerHTML += campoBusca;		
			document.getElementById("testeCampo2").innerHTML += campoBusca;
		}
		function someDiv(){			
			document.getElementById("buscaPessoa").style.display="none";
			document.getElementById("buscaConta").style.display="none";
		}
		function someTabela(){			
			document.getElementById("direita").innerHTML =none;			
		}
		function someBuscaConta(){			
			document.getElementById("buscaConta").style.display="none";
		}
		function someBuscaPessoa(){			
			document.getElementById("buscaPessoa").style.display="none";
		}		
		function validarCodigoPessoa(){			
		var valor = document.getElementById("iCodigoPessoa").value;
			if(valor==""){
				var resposta = alert('Preencha o Código da Pessoa.');
				if (resposta){
					document.write("alerta");
				}
				return false;
			}
			else
				return true;
		}
	</script>
</head>
<body>
	<h1>Cadastro de Contas</h1>
	<aside id="esquerda">
		<form method="GET" name="cadastroConta" action="funcaoSalvarConta.php" onsubmit="return validarCodigoPessoa()">			
			<p>Código da Pessoa:<input type="number" name="nCodigoPessoa" id="iCodigoPessoa" readonly="readonly"/></p>
			<p>Cadastrar como:
				<select name="nTransacao" id="iTransacao">
					<option value="Lucro">Lucro</option>
					<option value="Gasto">Gasto</option>
				</select>
			</p>
			<p>Nome da Conta:<input type="text" name="nNome" id="iNome" required/></p>
			<p>Valor da Conta:<input type="number" name="nValor" id="iValor" required/></p>			
			<p>Data de Vencimento:<input type="date" name="nVencimento" id="iVencimento" required/></p>
			<p>Data de Pagamento:<input type="date" name="nPagamento" id="iPagamento"/><input type="checkbox" name="nCheckPagamento" id="iCheckPagamento" value="naoPago" onchange="someDataPagamento()"/>Não há</p>
			<input id="btn" type="submit" value="Validar"/>		
		</form>
		<a id="btn" href="gestaoFinanceira.php"><button>Cancelar</button></a>		
	</aside>
	
	<input type="submit" value="Buscar Pessoa" onclick="mostraBuscaPessoa()"/>
	<input type="submit" value="Buscar Conta" onclick="mostraBuscaConta()"/>
	<input type="submit" value="Ver Pessoa" onclick="exibirTabelaPessoa()"/>
	<input type="submit" value="Ver Conta" onclick="exibirTabelaConta()"/>
	
	<aside id="direita">	
				
	</aside>
	<aside id="direitaPessoa">	
				
	</aside>
	
	<aside id="buscaPessoa" src="buscarPessoa.php">
		<?php			
			include("buscarPessoa.php");
		?>
	</aside>
	<aside id="buscaConta" src="buscarConta.php">
		<?php			
			include("buscarConta.php");
		?>
	</aside>	
</body>
</html>