<?php $pagina = 'pagamentos';
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
		
		<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
		<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Pagamento</a>

	</div>
</div>

<div class="row mt-4">
	<div class="col-md-3 col-sm-12">
		<div class="float-left">
			
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
	

	<div class="col-md-9 col-sm-12">

		<div class="float-right mr-4">
			<form id="frm" class="form-inline my-2 my-lg-0" method="post">

				<input type="hidden" id="pag"  name="pag" value="<?php echo @$_GET['pagina'] ?>">

				<input type="hidden" id="itens"  name="itens" value="<?php echo @$itens_por_pagina; ?>">


				<input class="form-control form-control-sm mr-sm-2" type="text" name="txtbuscar" id="txtbuscar" placeholder="Nome ou CPF">

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




<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Novo Pagamento
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form id="form" method="post" enctype="multipart/form-data">


					<div class="form-group">
						
						<select class="form-control" id="cargo" name="cargo">
							<option value="">Escolha o Cargo</option>


							<?php 

								//TRAZER TODOS OS REGISTROS DE ESPECIALIZAÇÕES
							$res = $pdo->query("SELECT * from cargos order by nome asc");
							$dados = $res->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados); $i++) { 
								foreach ($dados[$i] as $key => $value) {
								}

								$id = $dados[$i]['id'];	
								$nome = $dados[$i]['nome'];


								echo '<option value="'.$nome.'">'.$nome.'</option>';



							}
							?>
						</select>
					</div>



					<div class="form-group">
						
						<span class="carregando">Aguarde, carregando...</span>
						<select class="form-control" id="funcionario" name="funcionario">
							<option value="">Escolha o Funcionário</option>

						</select>
					</div>
					

					<div class="form-group">
						<label for="exampleFormControlInput1">Valor</label>
						<input type="text" class="form-control" id="valor" placeholder="Insira o Valor " name="valor" required>
					</div>

					
					

					<div id="mensagem" class="">

					</div>

				</div>
				<div class="modal-footer">
					<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

					<button type="submit" name="Salvar" id="Salvar" class="btn btn-primary">Salvar</button>

				</div>
			</form>
		</div>
	</div>
</div>



<!--CHAMADA DA MODAL NOVO -->
<?php 
if(@$_GET['funcao'] == 'novo' && @$item_paginado == ''){ 

	?>
	<script>$('#btn-novo').click();</script>
<?php } ?>


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





<!--CHAMADA DA MODAL BAIXAR O PAGAMENTO-->
<?php 
if(@$_GET['funcao'] == 'baixar' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-baixar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmar Pagamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Baixar este Pagamento?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-editar">Cancelar</button>
					<form method="post">
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-baixar" name="btn-baixar" class="btn btn-success">Baixar</button>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php } ?>



<script>$('#modal-baixar').modal("show");</script>








<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#Salvar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
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
	$('#txtbuscar').keyup(function(){
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



<!--AJAX PARA BAIXAR O PAGAMENTO -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-baixar').click(function(event){
			event.preventDefault();

			$.ajax({
				url: pag + "/editar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){


					$('#btn-buscar').click();
					$('#btn-cancelar-editar').click();

				},

			})
		})
	})
</script>





<!--AJAX PARA CHAMAR O CARREGAMENTO DO INPUT SELECT A PARTIR DE OUTRO INPUT -->
<script type="text/javascript">
	$(function(){
		$('#cargo').change(function(){
			if( $(this).val() ) {
				$('#funcionario').hide();
				$('.carregando').show();
				$.getJSON('pagamentos/listar-func.php?search=',{cargo: $(this).val(), ajax: 'true'}, function(j){
					var options = '<option value="">Escolha Funcionário</option>';	
					for (var i = 0; i < j.length; i++) {
						options += '<option value="' + j[i].cpf + '">' + j[i].nome + '</option>';
					}	
					$('#funcionario').html(options).show();
					$('.carregando').hide();
				});
			} else {
				$('#funcionario').html('<option value="">– Escolha Funcionário –</option>');
			}
		});
	});
</script>




	<!--AJAX PARA BUSCAR OS DADOS PELA DATA INICIAL -->
	<script type="text/javascript">
		$('#dataInicial').change(function(){
			$('#btn-buscar').click();
		})
	</script>


	<!--AJAX PARA BUSCAR OS DADOS PELA DATA FINAL -->
	<script type="text/javascript">
		$('#dataFinal').change(function(){
			$('#btn-buscar').click();
		})
	</script>