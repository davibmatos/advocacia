<?php 

require_once("../../conexao.php");
$pagina = 'audiencias';

$txtbuscar = @$_POST['txtbuscar'];
$txtbuscar2 = @$_POST['txtbuscar2'];

echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Descrição</th>
<th scope="col">Local</th>
<th scope="col">Data</th>
<th scope="col">Hora</th>
<th scope="col">Advogado</th>
<th scope="col">Cliente</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';




if($txtbuscar == ''){
	$res = $pdo->query("SELECT * from audiencias where data = curDate() order by hora asc");
}else{
	$txtbuscar = @$_POST['txtbuscar'];
	$txtbuscar2 = '%'.@$_POST['txtbuscar2'].'%';
	$res = $pdo->query("SELECT * from audiencias where data = '$txtbuscar' and processo LIKE '$txtbuscar2' order by hora asc");

}

$dados = $res->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$descricao = $dados[$i]['descricao'];
	$local = $dados[$i]['local'];
	$data = $dados[$i]['data'];
	$hora = $dados[$i]['hora'];
	$advogado = $dados[$i]['advogado'];
	$cliente = $dados[$i]['cliente'];

	$data2 = implode('/', array_reverse(explode('-', $data)));

	//BUSCAR O NOME DO ADVOGADO
	$res_excluir = $pdo->query("select * from advogados where cpf = '$advogado'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$nome_advogado = $dados_excluir[0]['nome'];

	//BUSCAR O NOME DO CLIENTE
	$res_cli = $pdo->query("select * from clientes where cpf = '$cliente'");
	$dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
	$nome_cliente = $dados_cli[0]['nome'];



	echo '
	<tr>


	<td>'.$descricao.'</td>
	<td>'.$local.'</td>
	<td>'.$data2.'</td>
	<td>'.$hora.'</td>
	<td>'.$nome_advogado.'</td>
	<td>'.$nome_cliente.'</td>
	

	<td>


	<a title="Editar Audiência" href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>

	 <a title="Excluir" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
	</td>
	</tr>';


	

}

echo  '
</tbody>
</table> ';





?>