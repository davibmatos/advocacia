<?php 
$pagina = 'processos';
$agora = date('Y-m-d');
$data = date('Y-m-d');
?>


<div class="container">
	<div class="row botao-novo">
		<div class="col-md-12">
			
			
		</div>
	</div>



	<div class="row mt-4">
		<div class="col-md-6 col-sm-12">
			<div class="float-left">
				<form method="post">
					<select id="itens-pagina" onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

						<?php 

						if(isset($_POST['itens-pagina'])){
							$item_paginado = $_POST['itens-pagina'];
						}elseif(isset($_GET['itens'])){
							$item_paginado = $_GET['itens'];
						}

						?>

						<option value="<?php echo @$item_paginado ?>"><?php echo @$item_paginado ?> Registros</option>

						<?php if(@$item_paginado != $opcao1){ ?> 
							<option value="<?php echo $opcao1 ?>"><?php echo $opcao1 ?> Registros</option>
						<?php } ?>

						<?php if(@$item_paginado != $opcao2){ ?> 
							<option value="<?php echo $opcao2 ?>"><?php echo $opcao2 ?> Registros</option>
						<?php } ?>

						<?php if(@$item_paginado != $opcao3){ ?> 
							<option value="<?php echo $opcao3 ?>"><?php echo $opcao3 ?> Registros</option>
						<?php } ?>




					</select>
				</form>
			</div>

		</div>

		<?php 

	//DEFINIR O NUMERO DE ITENS POR PÁGINA
		if(isset($_POST['itens-pagina'])){
			$itens_por_pagina = $_POST['itens-pagina'];
			@$_GET['pagina'] = 0;
		}elseif(isset($_GET['itens'])){
			$itens_por_pagina = $_GET['itens'];
		}
		else{
			$itens_por_pagina = $opcao1;

		}

		?>




		<div class="col-md-6 col-sm-12">

			<div class="float-right mr-4">
				<form id="frm" class="form-inline my-2 my-lg-0" method="post">

					<input type="hidden" id="pag"  name="pag" value="<?php echo @$_GET['pagina'] ?>">

					<input type="hidden" id="itens"  name="itens" value="<?php echo @$itens_por_pagina; ?>">


					<input class="form-control form-control-sm mr-sm-2" type="text" name="txtbuscar" id="txtbuscar" placeholder="Número ou CPF/CNPJ">
					<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
				</form>
			</div>

		</div>


	</div>


	<div id="listar" class="mt-4">

	</div>


</div>







<!--CHAMADA DA MODAL MARCAR AUDIENCIA -->
<?php 
if(@$_GET['funcao'] == 'audiencia' && @$item_paginado == ''){ 
	$numero = $_GET['num'];
	?>

	<div class="modal" id="modal-audiencia" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Marcar Audiência</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form method="post">

						

						<div class="form-group">
							<label for="exampleFormControlInput1">Descrição</label>
							<input type="text" class="form-control" id="descricao" placeholder="Insira a Descrição " name="descricao" required>
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Local</label>
							<input type="text" class="form-control" id="local" placeholder="Insira o Local " name="local" required>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Data</label>
									<input class="form-control form-control-sm mr-sm-2" type="date" name="data" id="data" value="<?php echo $agora ?>">
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Hora</label>
									<input class="form-control form-control-sm mr-sm-2" type="time" name="hora" id="hora">
								</div>
							</div>
						</div>
						

						

						


					</div>



					<div id="mensagem" class="">

					</div>

					

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar">Cancelar</button>

						<input type="hidden" id="numero"  name="numero" value="<?php echo @$numero ?>" required>

						

						<button type="button" id="btn-audiencia" name="btn-info" class="btn btn-info">Marcar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-audiencia').modal("show");</script>







<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>








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



<!--AJAX PARA BUSCAR OS DADOS PELA TROCA NA DATA-->
<script type="text/javascript">
	$('#txtbuscar').keyup(function(){
		$('#btn-buscar').click();
	})
</script>




<!--AJAX PARA INSERÇÃO DA AUDIENCIA -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-audiencia').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir-audiencia.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						$('#mensagem').addClass('mensagem-sucesso')

						

						$('#btn-cancelar').click();




					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>
