<?php 

require_once("../conexao.php");
$cpf_adv = $_SESSION['cpf_usuario'];
?>


<?php 
$total_entradasF = 0;
$total_saidasF = 0;
$totalF = 0;

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
	$textcor = 'text-success';
}else{
	$textcor = 'text-danger';
}

$total_entradasF = number_format($total_entradas, 2, ',', '.');
$total_saidasF = number_format($total_saidas, 2, ',', '.');
$totalF = number_format($total, 2, ',', '.');

//TOTALIZAR CONTAS VENCENDO HOJE
$res_c = $pdo->query("SELECT * from pagar where vencimento = curDate() and pago != 'Sim'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$total_contas = count($dados_c);
?>

<div class="container-fluid">

<div class="area_cards">
	<div class="row">

		<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icone-card text-center text-success">
								<i class="fas fa-coins"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="titulo-card">Entradas</p>
								<p class="subtitulo-card-valores"><?php echo $total_entradasF ?><p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer rodape-card">
						Total de Entradas do Dia

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
									<p class="titulo-card">Saídas</p>
									<p class="subtitulo-card-valores"><?php echo $total_saidasF ?><p>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer rodape-card">
							Total de Saídas do Dia

						</div>
					</div>
				</div>


				<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
					<div class="card card-stats">
						<div class="card-body ">
							<div class="row">
								<div class="col-5 col-md-4">
									<div class="icone-card text-center <?php echo $textcor ?>">
										<i class="fas fa-dollar-sign"></i>
									</div>
								</div>
								<div class="col-7 col-md-8">
									<div class="numbers">
										<p class="titulo-card">Saldo Total</p>
										<p class="subtitulo-card-valores"><?php echo $totalF ?><p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer rodape-card">
								Saldo total do Dia

							</div>
						</div>
					</div>


					<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
					<div class="card card-stats">
						<div class="card-body ">
							<div class="row">
								<div class="col-5 col-md-4">
									<div class="icone-card text-danger text-danger">
										<i class="fas fa-search-dollar"></i>
									</div>
								</div>
								<div class="col-7 col-md-8">
									<div class="numbers">
										<p class="titulo-card">Contas à Pagar</p>
										<p class="subtitulo-card"><?php echo $total_contas ?><p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer rodape-card">
								Contas com Vencimento Hoje

							</div>
						</div>
					</div>

				</div>
			</div>


			<div class="mt-4">
				<i class="far fa-calendar-check ml-4 text-danger"></i>
				<span class="text-muted ml-1">CONTAS COM VENCIMENTO PARA HOJE</span>
				<hr>

				<div class="row">
					

					<?php 
					
					for ($i=0; $i < count($dados_c); $i++) { 
						foreach ($dados_c[$i] as $key => $value) {
						}

						$id = $dados_c[$i]['id'];	
						$descricao = $dados_c[$i]['descricao'];	
						$valor = $dados_c[$i]['valor'];	
						$funcionario = $dados_c[$i]['funcionario'];	


						$res_f = $pdo->query("SELECT * from funcionarios where cpf = '$funcionario'");
						$dados_f = $res_f->fetchAll(PDO::FETCH_ASSOC);
						$nome_func = $dados_f[0]['nome'];

						?>

						<div class="col-sm-12 col-lg-3 col-md-6 col-sm-6 mb-4">
							<div class="card card-stats bg-light mb-3">
								<div class="card-header bg-danger text-white">R$ <?php echo $valor ?></div>
								<div class="card-body">
									<span class="card-title text-secondary"><big><big><?php echo $descricao ?></span></big></big>
									<p class="card-text text-dark"><?php echo $nome_func ?></p>
								</div>
							</div>
						</div>

						<?php } ?>
						




					</div>


				</div>


</div>