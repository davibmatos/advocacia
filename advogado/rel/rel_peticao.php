
<?php 
include('../../conexao.php');

$processo = $_GET['processo'];

$res = $pdo->query("SELECT * from peticoes where processo = '$processo'");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$titulo = $dados[0]['titulo'];
$acao = $dados[0]['acao'];
$agravante = $dados[0]['agravante'];
$agravado = $dados[0]['agravado'];
$texto = $dados[0]['texto'];
$data = $dados[0]['data'];





?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>

	@page {
		margin: 0px;

	}

	body{
			margin-top:0px;
			font-family:Times, "Times New Roman", Georgia, serif;
		}

	.footer {
		position:absolute;
		bottom:0;
		width:100%;
		background-color: #ebebeb;
		padding:10px;
	}

	.cabecalho {    
		background-color: #ebebeb;
		padding-top:15px;
		margin-bottom:30px;
	}


	.red{
		color:red;
	}


	.texto{
		font-size:12px;
	}

	.titulo-rel{
		font-size:20px;
		
	}



</style>


<div class="cabecalho">
	
	<div class="row">
		<div class="col-sm-4">	
			 <img src="<?php echo $url_sistema ?>img/logo2.jpg" width="250px">
		</div>
		<div class="col-sm-6" align="right">	
			 <span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
			 <span class="titulo"><small><?php echo $endereco_empresa ?></small></span>
			</div>
	</div>
	

</div>

<div class="container">


	<div class="row">
		
			<p class="titulo-rel" align="center"><?php echo mb_strtoupper($titulo) ?> </p> 
			 <hr>
	

	</div>

	<div class="row">
		<p class="texto" align="center"> EXCELENTÍSSIMO SENHOR DOUTOR DESEMBARGADOR PRESIDENTE DO EGRÉGIO TRIBUNAL DE JUSTIÇA DO ESTADO </p>

	</div>

	<div>

		<br><br>

		<b><p align="center">REFERENTE<br>
			______________________________________________
			<br><?php echo $acao ?><br>
			<span class="red">PROCESSO - <?php echo $processo ?></span></b>
			<br>
			Agravante: <?php echo $agravante ?><br>
			Agravado: <?php echo $agravado ?><br>
			</p>
	</div>

	<br><br><br>
	<div>
		<?php echo $texto ?>
	</div>	
	

<div class="footer">
	<p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>


