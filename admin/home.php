<?php 

require_once("../conexao.php");
$cpf = $_SESSION['cpf_usuario'];




$res_c = $pdo->query("SELECT * from audiencias where data = curDate()");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$total_audiencias = count($dados_c);



$res_p = $pdo->query("SELECT * from clientes");
$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
$total_clientes = count($dados_p);



$res_a = $pdo->query("SELECT * from advogados");
$dados_a = $res_a->fetchAll(PDO::FETCH_ASSOC);
$total_advogados = count($dados_a);



$res = $pdo->query("SELECT * from movimentacoes where data = curDate()");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);

$total_entradas = 0;
$total_saidas = 0;

for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$tipo = $dados[$i]['tipo'];
	$valor = $dados[$i]['valor'];
	

	if($tipo == 'Entrada'){
		@$total_entradas = $total_entradas + $valor;
	}else{
		@$total_saidas = $total_saidas + $valor;
	}

}

@$total = @$total_entradas - @$total_saidas;
if(@$total >= 0){
	$cor = 'text-success';
}else{
	$cor = 'text-danger';
}

$totalF = number_format($total, 2, ',', '.');

?>

<div class="container-fluid conteudo-painel">

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
						Total de Audiências Hoje

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
									<p class="titulo-card">Clientes</p>
									<p class="subtitulo-card"><?php echo $total_clientes ?><p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer rodape-card">
							Total de Clientes
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
									<p class="titulo-card">Advogados</p>
									<p class="subtitulo-card"><?php echo $total_advogados ?><p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer rodape-card">
							Total de Advogados

						</div>
					</div>
				</div>


				<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
					<div class="card card-stats">
						<div class="card-body ">
							<div class="row">
								<div class="col-5 col-md-4">
									<div class="icone-card text-center <?php echo $cor ?>">
										<i class="fas fa-money-bill-wave-alt"></i>
									</div>
								</div>
								<div class="col-7 col-md-8">
									<div class="numbers">
										<p class="titulo-card">Saldo</p>
										<p class="subtitulo-card-valores"><?php echo $totalF ?><p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer rodape-card">
								Saldo total do dia

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
					$res = $pdo->query("SELECT * from audiencias where data = curDate() and hora >= curTime() order by hora asc limit 8");
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