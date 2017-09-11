<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8"/>
    <title>Trabalho Semestral no PHP</title>
	<style>		
		#asideBuscarConta{ 
			width:275px; 
			height:225px;  
			position:absolute; 
			background-color: #777777;
			padding: 15px;
			padding-top: 5px;
		}
		#btn{
			position: relative;
			float: left;
			margin: 2px;
		}
		section#iBuscarNomeConta, section#iBuscarPeriodoConta {
			display: none;
		}
	</style>
	<script language="javascript">
		function someBuscarConta(){			
		//document.getElementById("asideBuscarConta").parentNode.style.display='none';
		parent.someBuscaConta();//chama a funcção do pai
		}
		function mostraNomeConta(){			
			someSectionConta()
			document.getElementById("iBuscarNomeConta").style.display = "block";			
		}
		function mostraPeriodo(){		
			someSectionConta()		
			document.getElementById("iBuscarPeriodoConta").style.display = "block";			
		}
		function someSectionConta(){			
			document.getElementById("iBuscarPeriodoConta").style.display = "none";
			document.getElementById("iBuscarNomeConta").style.display = "none";
		}
		function buscarConta(){
			var condicaoBusca = document.querySelector('input[id="iCondicaoBusca"]:checked').value;
			
			if(condicaoBusca=="Nome"){//buscar por nome
				var campoBusca = document.getElementById("iNomeBusca").value;
				var campoBusca2 = document.getElementById("iPessoaBusca").value;
			}
			else{//buscar por periodo
				var campoBusca = document.getElementById("iVencimentoBusca").value;			
			}
			
			var buscarPor = document.getElementById("iTipoContaBusca").value;
			parent.exibirTabelaConta(campoBusca,campoBusca2, condicaoBusca, buscarPor);
			someBuscarConta();			
		}
	</script>
</head>
<body>
	
	<aside id="asideBuscarConta">
		<h3>Preencha os campos para buscar</h3>	

		
			<input type="radio" name="condicao" value="Nome" id="iCondicaoBusca" onclick="mostraNomeConta();">Nome</input>
			<input type="radio" name="condicao" value="Periodo" id="iCondicaoBusca" onclick="mostraPeriodo();">Periodo</input>			
			
			<section name="buscarNomeConta" id="iBuscarNomeConta">
				<p>Nome:<input type="text" name="nNome" id="iNomeBusca"/></p>
				<p>Beneficiario:<input type="Text" name="nPessoa" id="iPessoaBusca"/></p>
			</section>
			<section name="buscarPeriodoConta" id="iBuscarPeriodoConta">
				<p>Vencimento:<input type="date" name="nVencimento" id="iVencimentoBusca"/></p>
			</section>
			
			<p>Tipo de Conta:
				<select name="nTipoConta" id="iTipoContaBusca">
					<option value="Lucro">Lucro</option>
					<option value="Gasto">Gasto</option>
				</select>
			</p>		
						
			<input id="btn" type="submit" value="Validar" onclick="buscarConta()"/>
		
		<input id="btn" type="submit" value="Cancelar" onclick="someBuscarConta()"/>		
	</aside>
</body>
</html>