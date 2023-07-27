<?php 
$pagina = 'processos';
$agora = date('Y-m-d');
$data = date('Y-m-d');
?>


<div class="container">
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


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php if(@$_GET['funcao'] == 'editar'){

					$nome_botao = 'Editar';
					$id_reg = $_GET['id'];

					//BUSCAR DADOS DO REGISTRO A SER EDITADO
					$res = $pdo->query("select * from processos where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$num_processo = $dados[0]['num_processo'];

					$vara = $dados[0]['vara'];
					$tipo_acao = $dados[0]['tipo_acao'];
					$data_peticao = $dados[0]['data_peticao'];
					$status = $dados[0]['status'];

					if($data == ''){
						$data = date('Y-m-d');
					}
					


					echo 'Edição do Processo';

				} ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form method="post">

				<input id="antigo" type="hidden" class="form-control"  name="antigo" value="<?php echo $num_processo ?>">


				<input id="id" type="hidden" class="form-control"  name="id" value="<?php echo $id_reg ?>">
				
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Número Processo</label>
							<input id="num_processo" type="text" class="form-control"  name="numero" placeholder="Número do Processo" value="<?php echo $num_processo ?>">
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Vara</label>
							<select class="form-control" id="" name="vara">
								<?php 
								//SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO O CARGO DO FUNCIONARIO
								if(@$_GET['funcao'] == 'editar'){

									$res_espec = $pdo->query("SELECT * from varas where id = '$vara'");
									$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

									for ($i=0; $i < count($dados_espec); $i++) { 
										foreach ($dados_espec[$i] as $key => $value) {
										}

										$id_cargo = $dados_espec[$i]['id'];	
										$nome_cargo = $dados_espec[$i]['nome'];

									}


									echo '<option value="'.$id_cargo.'">'.$nome_cargo.'</option>';
								}



								//TRAZER TODOS OS REGISTROS DE CARGOS
								$res = $pdo->query("SELECT * from varas order by nome asc");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);

								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$id = $dados[$i]['id'];	
									$nome = $dados[$i]['nome'];

									if($nome_cargo != $nome){
										echo '<option value="'.$id.'">'.$nome.'</option>';
									}


								}
								?>
							</select>
						</div>
					</div>

					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Tipo Ação</label>
							<select class="form-control" id="" name="tipo_acao">
								<?php 
								//SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO O CARGO DO FUNCIONARIO
								if(@$_GET['funcao'] == 'editar'){

									$res_espec = $pdo->query("SELECT * from especialidades where id = '$tipo_acao'");
									$dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

									for ($i=0; $i < count($dados_espec); $i++) { 
										foreach ($dados_espec[$i] as $key => $value) {
										}

										$id_cargo = $dados_espec[$i]['id'];	
										$nome_cargo = $dados_espec[$i]['nome'];

									}


									echo '<option value="'.$id_cargo.'">'.$nome_cargo.'</option>';
								}



								//TRAZER TODOS OS REGISTROS DE CARGOS
								$res = $pdo->query("SELECT * from especialidades order by nome asc");
								$dados = $res->fetchAll(PDO::FETCH_ASSOC);

								for ($i=0; $i < count($dados); $i++) { 
									foreach ($dados[$i] as $key => $value) {
									}

									$id = $dados[$i]['id'];	
									$nome = $dados[$i]['nome'];

									if($nome_cargo != $nome){
										echo '<option value="'.$id.'">'.$nome.'</option>';
									}


								}
								?>
							</select>
						</div>
					</div>
				</div>	

				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Data Petição</label>
							<input class="form-control form-control-sm mr-sm-2" type="date" name="data_peticao"  value="<?php echo $data_peticao ?>">
						</div>
					</div>


					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label for="exampleFormControlInput1">Status Processo</label>
							
							<select class="form-control" id="" name="status">
								<?php 
								
								echo '<option value="'.$status.'">'.$status.'</option>';					

								if($status != 'Aberto'){
									echo '<option value="Aberto">Aberto</option>';
								}

								if($status != 'Andamento'){
									echo '<option value="Andamento">Andamento</option>';
								}


								if($status != 'Arquivado'){
									echo '<option value="Arquivado">Arquivado</option>';
								}

								if($status != 'Concluído'){
									echo '<option value="Concluído">Concluído</option>';
								}


								if($status != 'Cancelado'){
									echo '<option value="Cancelado">Cancelado</option>';
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
				<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>

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
					<h5 class="modal-title">Cancelar Processo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Cancelar este Processo?</p>
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





<!--CHAMADA DA MODAL CONCLUIR -->
<?php 
if(@$_GET['funcao'] == 'concluir' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-concluir" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Concluir Processo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Finalizar o Processo?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-tarefa">Cancelar</button>
					<form method="post">
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-concluir" name="btn-deletar" class="btn btn-success">Concluir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>



<script>$('#modal-concluir').modal("show");</script>








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
					<h5 class="modal-title">Gerar Cobrança</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleFormControlInput1">Descrição</label>
									<input type="text" class="form-control"  name="descricao" placeholder="Descrição da Cobrança">
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="exampleFormControlInput1">Valor</label>
									<input type="text" class="form-control"  name="valor" placeholder="Valor">
								</div>
							</div>
						</div>


						<hr>
						<p>ÚLTIMAS COBRANÇAS</p>
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


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-cobranca">Cancelar</button>

						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-cobranca" name="btn-cobranca" class="btn btn-success">Cobrar</button>
					</form>
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
					<h5 class="modal-title">Movimentação</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>


				<div class="modal-body">
					<form method="post">

						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="exampleFormControlInput1">Titulo</label>
									<input type="text" class="form-control"  name="titulo" placeholder="Titulo da Movimentação">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleFormControlInput1">Data</label>
									<input class="form-control form-control-sm mr-sm-2" type="date" name="data" id="data" value="<?php echo $agora ?>">
								</div>
							</div>
						</div>


						<div class="form-group">
							<label for="exampleFormControlInput1">Observações</label>
							<textarea class="form-control"  name="obs" maxlength="350"></textarea> 
						</div>


						<hr>
						<p>ÚLTIMAS MOVIMENTAÇÕES</p>
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
									echo 'Não possui ainda nenhuma movimentação!';
								}

								?>


							</tbody>
						</table>



					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-mov">Cancelar</button>

						<input type="hidden" id="id"  name="num" value="<?php echo @$num ?>" required>

						<button type="button" id="btn-mov" name="btn-cobranca" class="btn btn-success">Lançar</button>
					</form>
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
					<h5 class="modal-title">Arquivo Imagem, PDF e ZIP</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form id="form" method="post" enctype="multipart/form-data">



						<input type="hidden" class="form-control" id="" value="<?php echo $num ?>" name="processo" >



						<div class="form-group">
							<label for="exampleFormControlInput1">Descrição</label>
							<input type="text" class="form-control" id="descricao" placeholder="Insira a Descrição" name="descricao" required>
						</div>

						<div class="form-group">
						<label for="inputAddress">Foto</label>
						<div class="custom-file">
							<input type="file" name="foto" id="foto" onChange="carregarImg();">
						</div>

					</div>

					<div id="divImg" class="mt-4">
						<img src="../img/arquivos/sem-foto.png"  width="100px" id="target">									
					</div>

						<div id="mensagem" align="center" class="text-success">

						</div>

					</div>

					<div class="modal-footer mb-4">
						<button type="button" class="btn btn-secondary" id="btn-cancelar-arquivo" data-dismiss="modal">Cancelar</button>

						<button type="submit" id="btn-arquivo" name="btn-arquivo" class="btn btn-primary">Inserir</button>
					</form>
				</div>

				<hr>


				<div class="p-3">

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
						<a title="Excluir" href="index.php?acao=<?php echo $pagina ?>&funcao=excluir_arq&id=<?php echo $id_arq ?>"><i class="far fa-trash-alt text-danger ml-1"></i></a>

					</span>



					<hr>

				<?php }  } ?>

			</div>

			</div>
		</div>
	</div>


<?php } ?>



<script>$('#modal-arquivo').modal("show");</script>







<!--CHAMADA DA MODAL DELETAR -->
<?php 
if(@$_GET['funcao'] == 'excluir_arq' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-deletar-arquivo" tabindex="-1" role="dialog">
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



<script>$('#modal-deletar-arquivo').modal("show");</script>





<?php 
if(@$_GET['funcao'] == 'peticao' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>


	<!-- Modal -->
	<div class="modal fade" id="modal-peticao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						Gerar Petição Inicial
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form method="post" action="rel/rel_peticao_class.php" target="_blank" id="form-peticao" name="form-peticao">

						<?php 
						$res = $pdo->query("SELECT * from peticoes where processo = '$id'");
						$dados = $res->fetchAll(PDO::FETCH_ASSOC);
						$titulo = @$dados[0]['titulo'];
						$acao = @$dados[0]['acao'];
						$agravante = @$dados[0]['agravante'];
						$agravado = @$dados[0]['agravado'];
						$texto = @$dados[0]['texto'];

						if($titulo != ''){
							$editar = 'sim';
						}

						?>

						<input type="hidden" class="form-control" id="" name="processo" value="<?php echo $id ?>">
						<input type="hidden" class="form-control" id="" name="editar" value="<?php echo $editar ?>">

						<div class="form-group">
							<label for="exampleFormControlInput1">Titulo</label>
							<input type="text" class="form-control" id="" placeholder="Insira o Titulo da Petição" name="titulo" value="<?php echo @$titulo ?>">
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Tipo Ação</label>
							<input type="text" class="form-control" id="" placeholder="Insira o Tipo de Ação" name="acao" value="<?php echo @$acao ?>">
						</div>


						<div class="form-group">
							<label for="exampleFormControlInput1">Agravante</label>
							<input type="text" class="form-control" id="" placeholder="Insira o nome do Agravante" name="agravante" value="<?php echo @$agravante ?>">
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Agravado</label>
							<input type="text" class="form-control" id="" placeholder="Insira o nome do Agravado" name="agravado" value="<?php echo @$agravado ?>">
						</div>

						<div class="form-group">
							<label for="exampleFormControlInput1">Texto</label>
							<textarea maxlength="1500" type="text" class="form-control" id="" name="texto"><?php echo @$texto ?></textarea>
						</div>


						<div id="mensagem" class="">

						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

						<button name="btn-peticao" id="btn-peticao" class="btn btn-info">Relatório</button>

					</div>
				</form>
			</div>
		</div>
	</div>


<?php } ?>


<script>$('#modal-peticao').modal("show");</script>







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
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-aud">Cancelar</button>

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