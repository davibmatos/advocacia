<?php 

require_once("../../conexao.php");
$pagina = 'pagamentos';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];

$agora = date('Y-m-d');


$cpf_adv = $_SESSION['cpf_usuario'];

$total_entradas = 0;
$total_saidas = 0;
 
echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Descrição</th>
<th scope="col">Valor</th>
<th scope="col">Cliente</th>
<th scope="col">Data</th>
<th scope="col">Pago</th>
<th scope="col">Processo</th>

</tr>
</thead>
<tbody>';




	$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
	$res = $pdo->query("SELECT * from receber where pago LIKE '$txtbuscar' and (data >= '$dataInicial' and data <= '$dataFinal') order by id asc");


$dados = $res->fetchAll(PDO::FETCH_ASSOC);




for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$descricao = $dados[$i]['descricao'];
	$valor = $dados[$i]['valor'];
	$data = $dados[$i]['data'];
	$cliente = $dados[$i]['cliente'];
	$pago = $dados[$i]['pago'];
	$processo = $dados[$i]['processo'];
	$data2 = implode('/', array_reverse(explode('-', $data)));
	$valorF = number_format($valor, 2, ',', '.');

	if($pago == 'sim'){
		@$total_entradas = $total_entradas + $valor;
		$classe = 'text-success';
		$pago_titulo = 'Sim';
	}else{
		@$total_saidas = $total_saidas + $valor;
		$classe = 'text-danger';
		$pago_titulo = 'Não';
	}


	

	//BUSCAR O NOME DO CLIENTE
	$res_excluir = $pdo->query("select * from clientes where cpf = '$cliente'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$nome_cli = $dados_excluir[0]['nome'];


	//BUSCAR O NUMERO DO PROCESSO
	$res_excluir = $pdo->query("select * from processos where id = '$processo'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$num_processo = $dados_excluir[0]['num_processo'];




	echo '
	<tr>


	<td>'.$descricao.'</td>
	<td class="'.$classe.'">R$ '.$valorF.'</td>
	<td>'.$nome_cli.'</td>
	<td>'.$data2.'</td>
	<td>'.$pago_titulo.'</td>
	<td>'.$num_processo.'</td>
	

	</tr>';


	

}

$total_entradasF = number_format($total_entradas, 2, ',', '.');
$total_saidasF = number_format($total_saidas, 2, ',', '.');

@$total = $total_entradas + $total_saidas;
$totalF = number_format($total, 2, ',', '.');

echo  '
</tbody>
</table>


<div class="row">
<div class="col-md-9">
<div class="float-left totalpago"><span class="mr-4 text-success">Custas Pagas: R$ '.$total_entradasF.'</span> <span class="text-danger">Custas Pendentes: R$ '.$total_saidasF.'</span></div>
</div>
<div class="col-md-3">';

	echo '
<div class="float-right text-success totalpago">Total à Receber: R$ '.$totalF.'</div>';




echo '
</div>
</div>
 ';





?>