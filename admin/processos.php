<?php 
$pagina = 'processos';
$agora = date('Y-m-d');
$data = date('Y-m-d');
?>


<div class="container conteudo-painel">
	<div class="row botao-novo">
		<div class="col-md-12">
			<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
			
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




<!--CHAMADA DA MODAL OBSERVAÇÕES -->
<?php 
if(@$_GET['funcao'] == 'obs' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-obs" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Observações</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">

						<?php 
						$res = $pdo->query("select * from processos where id = '$id'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$obs = $dados[0]['obs'];
						?>

						<div class="form-group">
							<label for="exampleFormControlInput1">Observação</label>
							<textarea maxlength="350" type="text" class="form-control"  name="obs"><?php echo @$obs ?></textarea>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-obs">Cancelar</button>

						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-obs" name="btn-deletar" class="btn btn-info">Lançar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-obs').modal("show");</script>






<!--CHAMADA DA MODAL COBRANÇA -->
<?php 
if(@$_GET['funcao'] == 'cobranca' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-cobranca" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Ver Cobranças</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					
						<table class="table table-sm mt-3 tabelas">
							<thead class="thead-light">
								<tr>
									<th scope="col">Descrição</th>
									<th scope="col">Valor</th>
									<th scope="col">Data</th>
									<th scope="col">Pago</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$res = $pdo->query("SELECT * from receber where processo = '$id' order by id asc ");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);
								if(@count($dados) > 0){
									for ($i=0; $i < count($dados); $i++) { 
										foreach ($dados[$i] as $key => $value) {
										}

										$descricao = $dados[$i]['descricao'];	
										$valor = $dados[$i]['valor'];	
										$data = $dados[$i]['data'];	
										$pago = $dados[$i]['pago'];

										if($pago == 'sim'){
											$pago = 'Sim';
											$classe = 'text-success';
										}else{
											$pago = 'Não';
											$classe = 'text-danger';
										}

										$data = implode('/', array_reverse(explode('-', $data)));
										$valor = number_format($valor, 2, ',', '.');


										?>
										<tr>
											<td scope="col"><?php echo $descricao ?></td>
											<td class="<?php echo $classe ?>" scope="col">R$ <?php echo $valor ?></td>
											<td scope="col"><?php echo $data ?></td>
											<td  scope="col"><?php echo $pago ?></td>

										</tr>

									<?php }

								}else{
									echo 'Não possui ainda nenhuma cobrança!';
								}

								?>


							</tbody>
						</table>


					</div>


				
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-cobranca').modal("show");</script>







<!--CHAMADA DA MODAL MOVIMENTAÇÃO -->
<?php 
if(@$_GET['funcao'] == 'mov' && @$item_paginado == ''){ 
	$num = $_GET['num'];
	?>

	<div class="modal" id="modal-mov" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Movimentações do Processo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					

						
						<table class="table table-sm mt-3 tabelas">
							<thead class="thead-light">
								<tr>
									<th scope="col">Título</th>
									<th scope="col">Observações</th>
									<th scope="col">Data</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								$res = $pdo->query("SELECT * from historico where processo = '$num' order by id desc ");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);
								if(@count($dados) > 0){
									for ($i=0; $i < count($dados); $i++) { 
										foreach ($dados[$i] as $key => $value) {
										}

										$titulo = $dados[$i]['titulo'];	
										$obs = $dados[$i]['obs'];	
										$data = $dados[$i]['data'];	
										

										

										$data = implode('/', array_reverse(explode('-', $data)));
										

										?>
										<tr>
											<td scope="col"><?php echo $titulo ?></td>
											<td  scope="col"><?php echo $obs ?></td>
											<td scope="col"><?php echo $data ?></td>
											

										</tr>

									<?php }

								}else{
									echo 'Não possui ainda nenhuma cobrança!';
								}

								?>


							</tbody>
						</table>



					</div>


					
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-mov').modal("show");</script>









<!--CHAMADA DA MODAL INSERIR ARQUIVOS -->
<?php 
if(@$_GET['funcao'] == 'arquivo' && @$item_paginado == ''){ 
	$num = $_GET['id'];
	?>

	<div class="modal" id="modal-arquivo" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Ver Arquivos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				<div class="p-1">

				<?php 
				$res = $pdo->query("SELECT * from documentos where processo = '$num' order by id desc");
				$dados = $res->fetchAll(PDO::FETCH_ASSOC);
				if(@count($dados) > 0){
					echo '<p class="mb-1 text-danger"><small>ARQUIVOS DO PROCESSO</small></p><hr>';

				for ($i=0; $i < count($dados); $i++) { 
					foreach ($dados[$i] as $key => $value) {
					}

					$id_arq = $dados[$i]['id'];	
					$descricao = $dados[$i]['descricao'];
					$data = $dados[$i]['data'];
					$arquivo = $dados[$i]['arquivo'];
					$data2 = implode('/', array_reverse(explode('-', $data)));

					$ext = pathinfo($arquivo, PATHINFO_EXTENSION);   
		if($ext == 'pdf'){ 
			$tumb_arquivo = 'pdf.png';
		}else if($ext == 'rar' || $ext == 'zip'){
			$tumb_arquivo = 'rar.png';
		}else{
			$tumb_arquivo = $arquivo;
		}
					?>


					<span class="text-muted mb-1">
						<img src="../img/arquivos/<?php echo $tumb_arquivo ?>"  width="20px">		
						<a target="_blank" class="text-secondary" title="Abrir Arquivo" href="../img/arquivos/<?php echo $arquivo ?>">
							<span class="mr-4"><?php echo $descricao ?></span>  <span>Data: <?php echo $data2 ?></span>
						</a>
						
					</span>



					<hr>

				<?php }  } ?>

			</div>

			</div>
		</div>
	</div>


<?php } ?>



<script>$('#modal-arquivo').modal("show");</script>





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





<!--AJAX PARA CONCLUIR TAREFA -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-concluir').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/concluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					
					$('#btn-buscar').click();
					$('#btn-cancelar-tarefa').click();

				},
				
			})
		})
	})
</script>






<!--AJAX PARA CONCLUIR COBRANÇA -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-cobranca').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/cobranca.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					
					$('#btn-buscar').click();
					$('#btn-cancelar-cobranca').click();

				},
				
			})
		})
	})
</script>






<!--AJAX PARA LANÇAR OBS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-obs').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/obs.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					
					$('#btn-buscar').click();
					$('#btn-cancelar-obs').click();

				},
				
			})
		})
	})
</script>




<!--AJAX PARA INSERÇÃO DA AUDIENCIA -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-mov').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir-mov.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						console.log('aaaaaaaaa');
						$('#mensagem').addClass('mensagem-sucesso')
						$('#btn-cancelar-mov').click();

					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>






<!--AJAX PARA INSERÇÃO DOS ARQUIVOS -->
<script type="text/javascript">
	$("#form").submit(function () {
		var pag = "<?=$pagina?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/inserir-arquivo.php",
			type: 'POST',
			data: formData,
			success: function (data) {
				$('#mensagem').text(data);
				$('#descricao').val('');
				$('#foto').val('');
				$('#btn-cancelar-arquivo').click();

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




<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-deletar').click(function(event){
			event.preventDefault();

			$.ajax({
				url: pag + "/excluir-arquivo.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){



					$('#btn-cancelar-excluir').click();


				},

			})
		})
	})
</script>






<!--AJAX PARA INSERÇÃO DA PETICAO -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-peticao').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir-peticao.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						$('#mensagem').addClass('mensagem-sucesso')
						document.forms['form-peticao'].submit();
						


					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

				},
				
			})
		})
	})
</script>




<!--AJAX PARA INSERÇÃO DA AUDIENCIA -->
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#btn-audiencia').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: "../recepcao/processos/inserir-audiencia.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem').removeClass()

					if(mensagem == 'Cadastrado com Sucesso!!'){
						
						$('#mensagem').addClass('mensagem-sucesso')


						$('#btn-cancelar-aud').click();


					}else{
						
						$('#mensagem').addClass('mensagem-erro')
					}
					
					$('#mensagem').text(mensagem)

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
            $('#target').attr('src', "../img/arquivos/pdf.png");
            return;
        }

         if(resultado[1] === 'zip'){
            $('#target').attr('src', "../img/arquivos/rar.png");
            return;
        }

        if(resultado[1] === 'rar'){
            $('#target').attr('src', "../img/arquivos/rar.png");
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