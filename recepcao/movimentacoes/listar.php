<?php 

require_once("../../conexao.php");
$pagina = 'movimentacoes';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];

$agora = date('Y-m-d');


$cpf_tesoureiro = $_SESSION['cpf_usuario'];

$total_entradas = 0;
$total_saidas = 0;
 
echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Tipo</th>
<th scope="col">Movimento</th>
<th scope="col">Valor</th>
<th scope="col">Funcionário</th>
<th scope="col">Data</th>


</tr>
</thead>
<tbody>';




	$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
	$res = $pdo->query("SELECT * from movimentacoes where tipo LIKE '$txtbuscar' and (data >= '$dataInicial' and data <= '$dataFinal') order by id asc");


$dados = $res->fetchAll(PDO::FETCH_ASSOC);




for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$tipo = $dados[$i]['tipo'];
	$valor = $dados[$i]['valor'];
	$data = $dados[$i]['data'];
	$movimento = $dados[$i]['movimento'];
	$tesoureiro = $dados[$i]['tesoureiro'];
	$data2 = implode('/', array_reverse(explode('-', $data)));
	$valorF = number_format($valor, 2, ',', '.');

	if($tipo == 'Entrada'){
		@$total_entradas = $total_entradas + $valor;
		$classe = 'text-success';
	}else{
		@$total_saidas = $total_saidas + $valor;
		$classe = 'text-danger';
	}


	$total_entradasF = number_format($total_entradas, 2, ',', '.');
	$total_saidasF = number_format($total_saidas, 2, ',', '.');

	

	//BUSCAR O NOME DO TESOUREIRO
	$res_excluir = $pdo->query("select * from funcionarios where cpf = '$tesoureiro'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$nome_tesoureiro = $dados_excluir[0]['nome'];




	echo '
	<tr>


	<td>'.$tipo.'</td>
	<td>'.$movimento.'</td>
	<td class="'.$classe.'">R$ '.$valorF.'</td>
	<td>'.$nome_tesoureiro.'</td>
	<td>'.$data2.'</td>
	

	</tr>';


	

}


@$total = $total_entradas - $total_saidas;
$totalF = number_format($total, 2, ',', '.');

echo  '
</tbody>
</table>


<div class="row">
<div class="col-md-9">
<div class="float-left totalpago"><span class="mr-4 text-success">Total Entradas: R$ '.$total_entradasF.'</span> <span class="text-danger">Total Saídas: R$ '.$total_saidasF.'</span></div>
</div>
<div class="col-md-3">';

if($total > 0){
	echo '
<div class="float-right text-success totalpago">Total: R$ '.$totalF.'</div>';
}else{
	echo '
<div class="float-right text-danger totalpago">Total: R$ '.$totalF.'</div>';
}



echo '
</div>
</div>
 ';





?>