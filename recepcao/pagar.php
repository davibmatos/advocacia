<?php $pagina = 'pagar';
$agora = date('Y-m-d'); ?>

<div class="container">
	<div class="row botao-novo">
		<div class="col-md-12">

			<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
			<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-secondary">Novo Pagamento</a>

		</div>
	</div>

	<div class="row mt-4">
		<div class="col-md-6 col-sm-12">
			<div class="float-left">
				<form method="post">
					<select onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

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
				<h5 class="modal-title" id="exampleModalLabel">Novo Pagamento
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form id="form" method="post" enctype="multipart/form-data">

					<div class="form-group">


						<label for="exampleFormControlInput1">Descrição</label>
						<input type="text" class="form-control" id="descricao" placeholder="Insira a Descrição " name="descricao" required>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">Valor</label>
								<input type="text" class="form-control" id="valor" placeholder="Insira o Valor " name="valor" required>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlInput1">Data</label>
								<input class="form-control form-control-sm mr-sm-2" type="date" name="data" id="data" value="<?php echo $agora ?>">
							</div>
						</div>
					</div>



					<div class="form-group">
						<label for="inputAddress">Foto</label>
						<div class="custom-file">
							<input type="file" name="foto" id="foto" onChange="carregarImg();">
						</div>

					</div>

					<div id="divImg" class="mt-4">
						<img src="../img/pagamentos/sem-foto.png"  width="150px" id="target">									
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




<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>





<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$("#form").submit(function () {
		var pag = "<?=$pagina?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/inserir.php",
			type: 'POST',
			data: formData,
			success: function (data) {
				$('#btn-buscar').click();
				$('#btn-fechar').click();
			},
			cache: false,
			contentType: false,
			processData: false,
        xhr: function() {  // Custom XMLHttpRequest
        	var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
            	myXhr.upload.addEventListener('progress', function () {
            		/* faz alguma coisa durante o progresso do upload */
            	}, false);
            }
            return myXhr;
        }
    });
	});
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



<script type="text/javascript">
	

function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("input[type=file]").files[0];
    var arquivo = file['name'];
    resultado = arquivo.split(".", 2);
        //console.log(resultado[1]);
        if(resultado[1] === 'pdf'){
            $('#target').attr('src', "../img/pagamentos/pdf.png");
            return;
        }

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }

</script>