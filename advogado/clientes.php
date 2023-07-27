<?php 
$pagina = 'clientes';

$cpf_adv = $_SESSION['cpf_usuario']; 
?>


<div class="container">
	<div class="row botao-novo">
		<div class="col-md-12">

			<a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
			<a href="index.php?acao=<?php echo $pagina ?>&funcao=novo"  type="button" class="btn btn-info">Novo Cliente</a>

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

					<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF" aria-label="Search" name="txtbuscar" id="txtbuscar">
					<button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
				</form>
			</div>

		</div>


	</div>


	<div id="listar" class="mt-4">

	</div>


</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'editar'){

					$nome_botao = 'Editar';
					$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from clientes where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$nome = $dados[0]['nome'];

					$cpf = $dados[0]['cpf'];
					$telefone = $dados[0]['telefone'];
					$email = $dados[0]['email'];
					$endereco = $dados[0]['endereco'];
					$obs = $dados[0]['obs'];
					$pessoa = $dados[0]['tipo_pessoa'];


					$ocultar = 'divcnpj2';
					echo 'Edição de Clientes';
				}else{
					$pessoa = 'Pessoa Física';
					$nome_botao = 'Salvar';
					echo 'Cadastro de Clientes';
				} ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form method="post">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">

							<input type="hidden" id="id"  name="id" value="<?php echo @$id_reg ?>" required>

							<input type="hidden" id="cpf_antigo"  name="cpf_antigo" value="<?php echo @$cpf ?>" required>

							<label for="exampleFormControlInput1">Nome</label>
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome" name="nome" value="<?php echo @$nome ?>" required>
						</div>
					</div>



					<div class="col-md-4 col-sm-12" id="<?php echo @$ocultar ?>">
						<div class="form-group">
							<label for="exampleFormControlInput1">Física / Jurídica</label>
							<select class="form-control" id="pessoa" name="tipo_pessoa">
								<?php if(@$_GET['funcao'] == 'editar'){ ?>
									<option value="<?php echo @$pessoa ?>"><?php echo @$pessoa ?></option>
									<?php  

									if($pessoa != 'Pessoa Física'){
										echo '<option value="Pessoa Física">Pessoa Física</option>';
									}

									if($pessoa != 'Pessoa Jurídica'){
										echo '<option value="Pessoa Jurídica">Pessoa Jurídica</option>';
									}
								}else{
									echo '<option value="Pessoa Física">Pessoa Física</option>';
									echo '<option value="Pessoa Jurídica">Pessoa Jurídica</option>';
								}
								?>	
								

								
								
							</select>
						</div>
					</div>

					<?php if(@$pessoa == 'Pessoa Física'){ ?>
						<div class="col-md-4 col-sm-12" id="divcpf">
							<div class="form-group">
								<label for="exampleFormControlInput1">CPF</label>
								<?php if(@$_GET['funcao'] == 'editar'){ ?>

									<input type="hidden" class="form-control" name="cpf_oculto" value="<?php echo @$cpf ?>">

									<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF" disabled value="<?php echo @$cpf ?>">
								<?php }else{ ?>
									<input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF" required value="<?php echo @$cpf ?>">
								<?php } ?>
							</div>

						</div>
					<?php } ?>

					<?php if(@$pessoa == 'Pessoa Jurídica'){ ?>
						<div class="col-md-4 col-sm-12" id="divcnpj">
							<div class="form-group">
								<label for="exampleFormControlInput1">CNPJ</label>
								<?php if(@$_GET['funcao'] == 'editar'){ ?>

									<input type="hidden" class="form-control" name="cpf_oculto" value="<?php echo @$cpf ?>">

									<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Insira o CPF" disabled value="<?php echo @$cpf ?>">
								<?php }else{ ?>
									<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Insira o CNPJ" required value="<?php echo @$cpf ?>">
								<?php } ?>
							</div>

						</div>
					<?php } ?>



					<div class="col-md-4 col-sm-12" id="divcnpj2">
						<div class="form-group">
							<label for="exampleFormControlInput1">CNPJ</label>
							
							<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Insira o CNPJ" required value="<?php echo @$cpf ?>">

						</div>

					</div>

					

				</div>

				<div class="row">


					<div class="col-md-3 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Telefone</label>
							<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Insira o Telefone" value="<?php echo @$telefone ?>">
						</div>
					</div>

					<div class="col-md-3 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email</label>

							<input type="text" class="form-control" id="email" name="email" placeholder="Insira o Email" required value="<?php echo @$email ?>">
							
						</div>


					</div>


					<div class="col-md-6 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Endereço</label>
							<input type="text" class="form-control"  name="endereco" placeholder="Insira o Endereço" value="<?php echo @$endereco ?>">
						</div>
					</div>

					


				</div>




				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Observações</label>
							<textarea class="form-control"  name="obs" maxlength="350"><?php echo @$obs ?></textarea>
						</div>
					</div>
				</div>




				<div id="mensagem" class="">

				</div>

			</div>
			<div class="modal-footer">
				<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>

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





<!--CHAMADA DA MODAL ABRIR PROCESSO -->
<?php 
if(@$_GET['funcao'] == 'processo' && @$item_paginado == ''){ 
	$cpf = $_GET['cpf'];
	?>

	<div class="modal" id="modal-processo" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Abrir Processo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form method="post">

					<input type="hidden" class="form-control" value="<?php echo $cpf ?>" name="cpf_cliente">

					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Número Processo</label>
								<input id="num_processo" type="text" class="form-control"  name="numero" placeholder="Número do Processo">
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Vara</label>
								<select class="form-control" id="" name="vara">
								<?php 
								$res = $pdo->query("SELECT * from varas order by nome asc");
									$dados = $res->fetchAll(PDO::FETCH_ASSOC);

									for ($i=0; $i < count($dados); $i++) { 
										foreach ($dados[$i] as $key => $value) {
										}

										$id = $dados[$i]['id'];	
										$nome = $dados[$i]['nome'];

										
											echo '<option value="'.$id.'">'.$nome.'</option>';
										
									}
								 ?>
								</select>
							</div>
						</div>
						
					</div>

					<div class="row">
						
						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="exampleFormControlInput1">Tipo Processo</label>
								<select class="form-control" id="" name="tipo">
								<?php 
								$res = $pdo->query("SELECT * from especialidades order by nome asc");
									$dados = $res->fetchAll(PDO::FETCH_ASSOC);

									for ($i=0; $i < count($dados); $i++) { 
										foreach ($dados[$i] as $key => $value) {
										}

										$id = $dados[$i]['id'];	
										$nome = $dados[$i]['nome'];

										
											echo '<option value="'.$id.'">'.$nome.'</option>';
										
									}
								 ?>
								</select>
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="form-group">
								<label for="">Parte Contrária</label>
								<select  class="form-control select2" id="processado" name="processado">
									
								<?php 
								$res = $pdo->query("SELECT * from processados where advogado = '$cpf_adv' order by nome asc");
									$dados = $res->fetchAll(PDO::FETCH_ASSOC);

									for ($i=0; $i < count($dados); $i++) { 
										foreach ($dados[$i] as $key => $value) {
										}

										$cpf = $dados[$i]['cpf'];	
										$nome = $dados[$i]['nome'];

										
											echo '<option value="'.$cpf.'">'.$nome.' - '.$cpf.'</option>';
										
									}
								 ?>
								</select>
							</div>
						</div>


					</div>



				<div id="mensagem" class="">

				</div>

					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar">Cancelar</button>
					
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<input type="hidden" id="btn-buscar-contraria" name="btn-info"></input>

						<button type="button" id="btn-processo" name="btn-info" class="btn btn-info">Abrir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-processo').modal("show");</script>






<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>





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

						$('#nome').val('')
						$('#cpf').val('')
						$('#telefone').val('')
						
						$('#email').val('')

						$('#txtbuscar').val('')
						$('#btn-buscar').click();

						//$('#btn-fechar').click();




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

						$('#nome').val('')
						$('#cpf').val('')
						$('#telefone').val('')
						
						$('#email').val('')

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

					$('#txtbuscar').val('')
					$('#btn-buscar').click();
					$('#btn-cancelar-excluir').click();

				},
				
			})
		})
	})
</script>




<!--AJAX PARA OCULTAR DIV QUANDO TROCADO O SELECT -->
<script type="text/javascript">
	$('#pessoa').change(function(){
		var select = document.getElementById('pessoa');
		var value = select.options[select.selectedIndex].value;
		
		if(value == 'Pessoa Jurídica'){
			$("#divcpf").hide();
			document.getElementById("divcnpj2").style.display = 'block';
		}else{
			$("#divcpf").show();
			document.getElementById("divcnpj2").style.display = 'none';
		}


		

	})
</script>






<!--AJAX PARA OCULTAR DIV QUANDO TROCADO O SELECT DO PROCESSO -->
<script type="text/javascript">
	$('#pessoa_processo').change(function(){
		var select = document.getElementById('pessoa_processo');
		var value = select.options[select.selectedIndex].value;
		
		if(value == 'Pessoa Jurídica'){
			
			document.getElementById("divcnpjprocessado").style.display = 'block';
			document.getElementById("divcpfprocessado").style.display = 'none';
		}else{
			document.getElementById("divcnpjprocessado").style.display = 'none';
			document.getElementById("divcpfprocessado").style.display = 'block';
		}


		

	})
</script>






<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
		$('#btn-buscar-contraria').click(function(event){
			event.preventDefault();	
			
			$.ajax({
				url: pag + "/buscar-nome.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					document.getElementById("nomeprocessado").value = result;
					
				},
				

			})

		})

		
	})
</script>


<!--AJAX PARA BUSCAR O NOME DO PROCESSADO -->
<script type="text/javascript">
	$('#cpf2').keyup(function(){
		$('#btn-buscar-contraria').click();
	})
</script>


<!--AJAX PARA BUSCAR O NOME DO PROCESSADO -->
<script type="text/javascript">
	$('#cnpj2').keyup(function(){
		$('#btn-buscar-contraria').click();
	})
</script>






<!--AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-processo').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/inserir-processo.php",
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



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('.select2').select2({
    	dropdownParent: $('#modal-processo')
    });
});
</script>


<style type="text/css">
  .select2-selection__rendered {
    line-height: 40px !important;
    margin:0px !important;
    padding:0px !important;
    padding-left:5px !important;
    font-size:16px !important;
  }

  .select2-selection {
    height: 40px !important;
    margin:0px !important;
    padding:0px !important;
     padding-left:5px !important;
     font-size:16px !important;
  }
</style>  