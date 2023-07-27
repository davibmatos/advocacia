<?php $pagina = 'audiencias';
$agora = date('Y-m-d'); ?>

<div class="container">
<div class="row botao-novo">
	<div class="col-md-12">
		
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		

	</div>
</div>

<div class="row mt-4">
	<div class="col-md-6 col-sm-12">
		

	</div>


	

	<div class="col-md-6 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input class="form-control form-control-sm mr-sm-2" type="text" name="txtbuscar2" id="num_processo" placeholder="Número do Processo">
			
				<input class="form-control form-control-sm mr-sm-2" type="date" name="txtbuscar" id="txtbuscar" value="<?php echo $agora ?>">

				<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
			</form>
		</div>
		
	</div>

	
</div>


<div id="listar">
	
</div>



</div>





<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Audiência
				</h5>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form id="form" method="post" enctype="multipart/form-data">

					<?php if(@$_GET['funcao'] == 'editar'){

					$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from audiencias where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					

					$descricao = $dados[0]['descricao'];
					$data = $dados[0]['data'];
					$hora = $dados[0]['hora'];
					$local = $dados[0]['local'];

				} ?>


					<div class="form-group">
							<label for="exampleFormControlInput1">Descrição</label>
							<input type="text" class="form-control" id="descricao" placeholder="Insira a Descrição " name="descricao" required value="<?php echo $descricao ?>">
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Local</label>
							<input type="text" class="form-control" id="local" placeholder="Insira o Local " name="local" required value="<?php echo $local ?>">
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Data</label>
									<input class="form-control form-control-sm mr-sm-2" type="date" name="data" id="data" value="<?php echo $data ?>">
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlInput1">Hora</label>
									<input class="form-control form-control-sm mr-sm-2" type="time" name="hora" id="hora" value="<?php echo $hora ?>">
								</div>
							</div>
						</div>
						

			


						



						<div id="mensagem" class="">

						</div>

					</div>
					<div class="modal-footer">
						<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

						<input type="hidden" id="id"  name="id" value="<?php echo @$id_reg ?>" required>


						<button type="submit" name="Salvar" id="Editar" class="btn btn-primary">Editar</button>

					</div>
				</form>
			</div>
		</div>
	</div>



	

	<!--CHAMADA DA MODAL EDITAR -->
	<?php 
	if(@$_GET['funcao'] == 'editar' && @$item_paginado == ''){ 

		?>
		<script>$('#btn-novo').click();</script>
	<?php } ?>



	<!--CHAMADA DA MODAL DELETAR -->
	<?php 
	if(@$_GET['funcao'] == 'excluir' && @$item_paginado == ''){ 
		$id = $_GET['id'];
		?>

		<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Excluir Registro</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<p>Deseja realmente Excluir este Registro?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
						<form method="post">
							<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

							<button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
						</form>
					</div>
				</div>
			</div>
		</div>


	<?php } ?>



	<script>$('#modal-deletar').modal("show");</script>







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



	<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
	<script type="text/javascript">
		$('#num_processo').keyup(function(){
			$('#btn-buscar').click();
		})
	</script>







	<!--AJAX PARA EDIÇÃO DOS DADOS -->
	<script type="text/javascript">
		$(document).ready(function(){
			var pag = "<?=$pagina?>";
			$('#Editar').click(function(event){
				event.preventDefault();

				$.ajax({
					url: pag + "/editar.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function(mensagem){

						$('#mensagem').removeClass()

						if(mensagem == 'Editado com Sucesso!!'){

							$('#mensagem').addClass('mensagem-sucesso')


							$('#txtbuscar').val('')
							$('#btn-buscar').click();

							$('#btn-fechar').click();




						}else{

							$('#mensagem').addClass('mensagem-erro')
						}

						$('#mensagem').text(mensagem)

					},

				})
			})
		})
	</script>



	<!--AJAX PARA EXCLUSÃO DOS DADOS -->
	<script type="text/javascript">
		$(document).ready(function(){
			var pag = "<?=$pagina?>";
			$('#btn-deletar').click(function(event){
				event.preventDefault();
				
				$.ajax({
					url: pag + "/excluir.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function(mensagem){

						
						$('#btn-buscar').click();
						$('#btn-cancelar-excluir').click();

					},

				})
			})
		})
	</script>



	<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
	<script type="text/javascript">
		$('#txtbuscar').change(function(){
			$('#btn-buscar').click();
		})
	</script>



	