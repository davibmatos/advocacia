<?php 

require_once("../../conexao.php");
$pagina = 'movimentacoes';

$txtbuscar = @$_POST['txtbuscar'];
$txtbuscar2 = @$_POST['txtbuscar2'];

echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Titulo</th>
<th scope="col">Obs</th>
<th scope="col">Data</th>
<th scope="col">Processo</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';




if($txtbuscar == ''){
	$res = $pdo->query("SELECT * from historico where data = curDate() order by id desc");
}else{
	$txtbuscar = @$_POST['txtbuscar'];
	$txtbuscar2 = '%'.@$_POST['txtbuscar2'].'%';
	$res = $pdo->query("SELECT * from historico where data = '$txtbuscar' and processo LIKE '$txtbuscar2' order by id desc");

}

$dados = $res->fetchAll(PDO::FETCH_ASSOC);



for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}

	$id = $dados[$i]['id'];	
	$titulo = $dados[$i]['titulo'];
	$obs = $dados[$i]['obs'];
	$data = $dados[$i]['data'];
	
	$processo = $dados[$i]['processo'];

	$data2 = implode('/', array_reverse(explode('-', $data)));

	

	echo '
	<tr>


	<td>'.$titulo.'</td>
	<td>'.$obs.'</td>
	<td>'.$data2.'</td>
	<td>'.$processo.'</td>
	

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