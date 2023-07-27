<?php 


require_once("../../conexao.php");
$pagina = 'pagamentos';

$txtbuscar = @$_POST['txtbuscar'];
$dataInicial = @$_POST['dataInicial'];
$dataFinal = @$_POST['dataFinal'];

$agora = date('Y-m-d');


$cpf_tesoureiro = $_SESSION['cpf_usuario'];


 
echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Funcionário</th>
<th scope="col">Valor</th>
<th scope="col">Tesoureiro</th>
<th scope="col">Cargo</th>
<th scope="col">Data</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';




	$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
	$res = $pdo->query("SELECT * from pagamentos where (funcionario LIKE '$txtbuscar' or nome_funcionario LIKE '$txtbuscar') and (data >= '$dataInicial' and data <= '$dataFinal') order by id asc");


$dados = $res->fetchAll(PDO::FETCH_ASSOC);




for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$funcionario = $dados[$i]['funcionario'];
	$valor = $dados[$i]['valor'];
	$data = $dados[$i]['data'];
	$tesoureiro = $dados[$i]['tesoureiro'];
	$nome_funcionario = $dados[$i]['nome_funcionario'];
	$data2 = implode('/', array_reverse(explode('-', $data)));

	@$total = $total + $valor;

	//BUSCAR O NOME DO TESOUREIRO
	$res_excluir = $pdo->query("select * from funcionarios where cpf = '$tesoureiro'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$nome_tesoureiro = $dados_excluir[0]['nome'];
	

	//BUSCAR O NOME DO CARGO DO FUNCIONARIO
	$res_func = $pdo->query("select * from funcionarios where cpf = '$funcionario'");
	$dados_func = $res_func->fetchAll(PDO::FETCH_ASSOC);
	$cargo = $dados_func[0]['cargo'];

	
	


	echo '
	<tr>


	<td>'.$nome_funcionario.'</td>
	<td>R$ '.$valor.'</td>
	<td>'.$nome_tesoureiro.'</td>
	<td>'.$cargo.'</td>
	<td>'.$data2.'</td>
	

	<td>

	
	 <a title="Excluir Pagamentos" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
	


	</td></tr>';


	

}

echo  '
</tbody>


<tfoot>
<tr><td colspan="6">
<div class="float-right totalpago">Total Pago: R$ '.@$total.',00</div>
</td></tr>
</tfoot>


</table>




 ';





?>