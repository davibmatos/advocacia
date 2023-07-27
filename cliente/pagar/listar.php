<?php 

require_once("../../conexao.php");
$pagina = 'pagar';

$hoje = date('Y-m-d');
$txtbuscar = @$_POST['txtbuscar'];

$cpf = $_SESSION['cpf_usuario'];


if($txtbuscar == '' or $txtbuscar == $hoje){
		$res = $pdo->query("SELECT * from receber where cliente = '$cpf' order by data desc");
	}else{
		
		
		$res = $pdo->query("SELECT * from receber where cliente = '$cpf' and data = '$txtbuscar' order by id asc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$total_registros = count($dados);
	if($total_registros > 0){




echo '
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			
			<th scope="col">Descrição</th>
			<th scope="col">Valor</th>
			<th scope="col">Advogado</th>
			<th scope="col">Data</th>
			
			<th scope="col">Pago</th>
		</tr>
	</thead>
	<tbody>';

	
	  
	



	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			
			$descricao = $dados[$i]['descricao'];
			$valor = $dados[$i]['valor'];
			
			$cpf_adv = $dados[$i]['advogado'];
			$pago = $dados[$i]['pago'];
			$data = $dados[$i]['data'];
			$data2 = implode('/', array_reverse(explode('-', $data)));

			$res_cli = $pdo->query("SELECT * from advogados where cpf = '$cpf_adv'");
			$dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
			$linhas_cli = count($dados_cli);
			$advogado = $dados_cli[0]['nome'];

echo '
		<tr>

			
			<td>'.$descricao.'</td>
			
			
			<td>R$ '.$valor.'</td>
			<td>'.$advogado.'</td>
			
			<td>'.$data2.'</td>
			
			
			<td>
				
				';

				if($pago == 'nao'){
					echo '
				
				<i class="fas fa-circle ml-1 text-danger"></i>';
				}else{
					echo '
				<i class="fas fa-circle ml-1 text-success"></i>';

				}
				
				echo '
			</td>
		</tr>';

	}

echo  '
	</tbody>
</table> ';


}else{
	echo 'Não Existem Registros Cadastrados!!';
}


?>