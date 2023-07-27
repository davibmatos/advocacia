<?php $pagina = 'movimentacoes';
$agora = date('Y-m-d'); ?>


<style type="text/css">
	.carregando{
		color:#ff0000;
		display:none;
	}
</style>

<div class="container">

<div class="row botao-novo">
	<div class="col-md-12">
		


	</div>
</div>

<div class="row mt-4">
	<div class="col-md-3 col-sm-12">
		<div class="float-left">
			<form action="rel/rel_mov_class.php" method="POST" target="_blank">
				<i class="fas fa-book text-info"></i>
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataInicialPost" id="dataInicialPost" >
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="dataFinalPost" id="dataFinalPost">
				<input class="form-control form-control-sm mr-sm-2" type="hidden" name="tipo" id="tipo">
				<button class="botao-link text-info">Relatório</button>
			</form>
			
		</div>

	</div>


	

	<div class="col-md-9 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input type="hidden" id="pag"  name="pag" value="<?php echo @$_GET['pagina'] ?>">

				<input type="hidden" id="itens"  name="itens" value="<?php echo @$itens_por_pagina; ?>">


				<select class="form-control form-control-sm mr-4" id="txtbuscar" name="txtbuscar">

					<option value="">Entradas e Sáidas</option>
					<option value="Entrada">Entradas</option>

					<option value="Saída">Saídas</option>

				</select>

				<input class="form-control form-control-sm mr-sm-2" type="date" name="dataInicial" id="dataInicial" value="<?php echo $agora ?>">

				<input class="form-control form-control-sm mr-sm-2" type="date" name="dataFinal" id="dataFinal" value="<?php echo $agora ?>">

				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>


</div>


<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();	

			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)

				},


			})

		})


	})
</script>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},


		})
	})
</script>







<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').change(function(){
		$('#btn-buscar').click();
		document.getElementById('tipo').value = document.getElementById('txtbuscar').value;
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA DATA INICIAL -->
<script type="text/javascript">
	$('#dataInicial').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataInicialPost').value = document.getElementById('dataInicial').value;
	})
</script>


<!--AJAX PARA BUSCAR OS DADOS PELA DATA FINAL -->
<script type="text/javascript">
	$('#dataFinal').change(function(){
		$('#btn-buscar').click();
		document.getElementById('dataFinalPost').value = document.getElementById('dataFinal').value;
	})
</script>