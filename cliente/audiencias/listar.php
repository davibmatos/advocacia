<?php 

require_once("../../conexao.php");
$pagina = 'audiencias';

$agora = date('Y-m-d');
$txtbuscar = @$_POST['txtbuscar'];
$txtbuscar2 = @$_POST['txtbuscar2'];
$cpf = $_SESSION['cpf_usuario'];




echo '
<table class="table table-sm mt-3 tabelas">
<thead class="thead-light">
<tr>
<th scope="col">Descrição</th>
<th scope="col">Local</th>
<th scope="col">Data</th>
<th scope="col">Hora</th>
<th scope="col">Advogado</th>
<th scope="col">Prazo</th>

<th scope="col">Ações</th>
</tr>
</thead>
<tbody>';




if($txtbuscar == ''){
	$res = $pdo->query("SELECT * from audiencias where cliente = '$cpf' order by data desc limit 20");
}else{
	$txtbuscar = @$_POST['txtbuscar'];
	$txtbuscar_num = '%'.@$_POST['txtbuscar2'].'%';

	if($txtbuscar2 == ''){
		$res = $pdo->query("SELECT * from audiencias where cliente = '$cpf' and data = '$txtbuscar' order by hora asc");
	}else{
		$res = $pdo->query("SELECT * from audiencias where cliente = '$cpf' and processo LIKE '$txtbuscar_num' order by hora asc");
	}
	

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

	//CALCULAR PRAZO DE DIAS ENTRE DATAS
	$agora = date('Y-m-d');
	$diferenca = strtotime($data) - strtotime($agora);
	$prazo = floor($diferenca / (60*60*24));
	
	
	//BUSCAR O NOME DO ADVOGADO
	$res_cli = $pdo->query("select * from advogados where cpf = '$advogado'");
	$dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
	$nome_adv = $dados_cli[0]['nome'];



	echo '
	<tr>


	<td>'.$descricao.'</td>
	<td>'.$local.'</td>
	<td>'.$data2.'</td>
	<td>'.$hora.'</td>
	
	<td>'.$nome_adv.'</td>
	<td>'.$prazo.'</td>
	

	<td>


	<a title="Observações" href="index.php?acao='.$pagina.'&funcao=obs&id='.$id.'"><i class="fas fa-comment text-info"></i></a>

	 
	</td>
	</tr>';


	

}

echo  '
</tbody>
</table> ';





?>