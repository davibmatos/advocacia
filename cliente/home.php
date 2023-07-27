<?php 

require_once("../conexao.php");
$cpf = $_SESSION['cpf_usuario'];




$res_c = $pdo->query("SELECT * from audiencias where cliente = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$total_audiencias = count($dados_c);



$res_p = $pdo->query("SELECT * from processos where cliente = '$cpf' and status = 'Concluído'");
$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
$processos_concluidos = count($dados_p);



$res_a = $pdo->query("SELECT * from processos where cliente = '$cpf' and status = 'Andamento'");
$dados_a = $res_a->fetchAll(PDO::FETCH_ASSOC);
$processos_andamento = count($dados_a);



$res_z = $pdo->query("SELECT * from receber where cliente = '$cpf' and pago = 'nao'");
$dados_z = $res_z->fetchAll(PDO::FETCH_ASSOC);
$contas = count($dados_z);


?>

<div class="container-fluid">

<div class="area_cards">
	<div class="row">

		<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-info">
								<i class="far fa-file-alt"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Audiências</p>
								<p class="subtitulo-card"><?php echo $total_audiencias ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
						Total de Audiências

					</div>
				</div>
			</div>


			<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
				<div class="card card-stats">
					<div class="card-body ">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="icone-card text-center text-success">
									<i class="fas fa-paste"></i>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="numbers">
									<p class="titulo-card">Processos Concluídos</p>
									<p class="subtitulo-card"><?php echo $processos_concluidos ?><p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer rodape-card">
							Processos Concluídos

						</div>
					</div>
				</div>


				<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
				<div class="card card-stats">
					<div class="card-body ">
						<div class="row">
							<div class="col-5 col-md-4">
								<div class="icone-card text-center text-primary">
									<i class="fas fa-paste"></i>
								</div>
							</div>
							<div class="col-7 col-md-8">
								<div class="numbers">
									<p class="titulo-card">Processos Andamento</p>
									<p class="subtitulo-card"><?php echo $processos_andamento ?><p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer rodape-card">
							Processos em Andamento

						</div>
					</div>
				</div>


				<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
					<div class="card card-stats">
						<div class="card-body ">
							<div class="row">
								<div class="col-5 col-md-4">
									<div class="icone-card text-center text-danger">
										<i class="fas fa-money-bill-wave-alt"></i>
									</div>
								</div>
								<div class="col-7 col-md-8">
									<div class="numbers">
										<p class="titulo-card">Pagamentos</p>
										<p class="subtitulo-card"><?php echo $contas ?><p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer rodape-card">
								Contas à pagar Pendentes

							</div>
						</div>
					</div>


					
				</div>
			</div>


			<div class="mt-4">
				<i class="far fa-calendar-check ml-4 text-danger"></i>
				<span class="text-muted ml-1">PRÓXIMAS AUDIÊNCIAS</span>
				<hr>

				<div class="row">
					

					<?php 
					$res = $pdo->query("SELECT * from audiencias where cliente = '$cpf' and data >= curDate() order by data asc limit 4");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					for ($i=0; $i < count($dados); $i++) { 
						foreach ($dados[$i] as $key => $value) {
						}

						$id = $dados[$i]['id'];	
						$descricao = $dados[$i]['descricao'];

						
						$hora = $dados[$i]['hora'];
						$data = $dados[$i]['data'];
						$data2 = implode('/', array_reverse(explode('-', $data)));
						?>

						<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
							<div class="card card-stats bg-light mb-3">
								<div class="card-header bg-dark text-white"><?php echo $data2 ?></div>
								<div class="card-body">
									<span class="card-title text-secondary"><big><big><?php echo $hora ?></span></big></big>
									<p class="card-text text-dark"><?php echo $descricao ?></p>
								</div>
							</div>
						</div>

						<?php } ?>
						




					</div>


				</div>


</div>