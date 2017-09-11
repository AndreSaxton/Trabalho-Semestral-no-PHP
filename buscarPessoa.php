<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<style>		
		#asideBuscarPessoa{ 
			width:200px; 
			height:240px;  
			position:absolute; 
			background-color: #777777;
			padding: 15px;
			padding-top: 5px;
		}
		aside #btn1{
			position: absolute;
			left: 5px;
			bottom: 5px;
		}
		aside #btn2{
			position: absolute;
			left: 70px;
			bottom: 5px;
		}
		section#iBuscarNome, section#iBuscarDocumento {
			display: none;
		}
	</style>
	<script language="javascript">
		function someBuscarPessoa(){			
			//document.getElementById("asideBuscarPessoa").parentNode.style.display='none';http://localhost/Trabalho%20Semestral%20no%20PHP/salvarConta.php
			parent.someBuscaPessoa();//chama a funcção do pai			
		}
		function buscarPessoa(){
			var condicaoBusca = document.querySelector('input[id="iCondicaoBusca"]:checked').value;
			//document.getElementById("direita").parentNode.innerHTML='<object type="text/html" data="exibirTabelaPessoa.php" style="width:100%; height: 100%;"></object>';
			if(condicaoBusca=="Nome"){//buscar por nome
				var campoBusca = document.getElementById("iNomePessoaBusca").value;
				var buscarPor = document.getElementById("iStatusBusca").value;
			}
			else{//buscar por documento
				var campoBusca = document.getElementById("iDocumentoBusca").value;
			//var campoBusca ="André";
				var buscarPor = document.getElementById("iTipoPessoaBusca").value;
			}
			
			parent.exibirTabelaPessoa(campoBusca, condicaoBusca, buscarPor);
			someBuscarPessoa();			
		}
		function mostraNome(){			
			someSection()
			document.getElementById("iBuscarNome").style.display = "block";			
		}
		function mostraDocumento(){		
			someSection()		
			document.getElementById("iBuscarDocumento").style.display = "block";			
		}
		function someSection(){			
			document.getElementById("iBuscarDocumento").style.display = "none";
			document.getElementById("iBuscarNome").style.display = "none";
		}
		function mudarDocumento(tipoDocumento){		
			document.getElementById("pDocumento").innerHTML = tipoDocumento;
		}
	</script>
</head>
<body>
	
	<aside id="asideBuscarPessoa">
		<h3>Preencha os campos<br/> para buscar</h3>	
		<input type="radio" name="condicao" value="Nome" id="iCondicaoBusca" onclick="mostraNome();">Nome</input>
		<input type="radio" name="condicao" value="Documento" id="iCondicaoBusca" onclick="mostraDocumento();">Documento</input>
		<section name="buscarNome" id="iBuscarNome">			
			<p>Cadastrado como:
				<select name="nStatus" id="iStatusBusca">
					<option value="Cliente">Cliente</option>
					<option value="Fornecedor">Fornecedor</option>
				</select>
			</p>		
			<p>Nome:<input type="text" name="nNome" id="iNomePessoaBusca"/></p>				
		</section>
		
		<section name="buscarDocumento" id="iBuscarDocumento">
			<p>Tipo de Pessoa:
			<br/>
				<select name="nTipoPessoa" id="iTipoPessoaBusca" onchange="mudarDocumento(this.value);">
					<option value="Fisica">Fisica</option>
					<option value="Juridica">Juridica</option>
				</select>
			</p>		
			<p id="pDocumento">Documento:<input type="text" name="nDocumento" id="iDocumentoBusca"/></p>
		</section>
		
		<input id="btn1" type="submit" value="Validar" onclick="buscarPessoa()"/>
		<input id="btn2" type="submit" value="Cancelar" onclick="someBuscarPessoa()"/>		
	</aside>
</body>
</html>