<?php 

require_once("../../conexao.php");
$pagina = 'receber';

$txtbuscar = @$_POST['txtbuscar'];
$txtbuscar2 = @$_POST['txtbuscar2'];
$cpf_adv = $_SESSION['cpf_usuario'];


if($txtbuscar == '' and $txtbuscar2 == ''){
		$res = $pdo->query("SELECT r.id, r.descricao, r.valor, r.advogado, r.cliente, r.data, r.pago, r.processo, c.nome as nome_cliente, a.nome as nome_advogado from receber as r INNER JOIN clientes as c ON r.cliente = c.cpf INNER JOIN advogados as a ON r.advogado = a.cpf where r.data = curDate()");
	}else{
		
		$txtbuscar2 = '%'.@$_POST['txtbuscar2'].'%';
		$res = $pdo->query("SELECT r.id, r.descricao, r.valor, r.advogado, r.cliente, r.data, r.pago, r.processo, c.nome as nome_cliente, a.nome as nome_advogado from receber as r INNER JOIN clientes as c ON r.cliente = c.cpf INNER JOIN advogados as a ON r.advogado = a.cpf where r.data = '$txtbuscar' and (r.cliente LIKE '$txtbuscar2' or c.nome LIKE '$txtbuscar2')");

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
			<th scope="col">Cliente</th>
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';

	
	  
	



	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			
			$descricao = $dados[$i]['descricao'];
			$valor = $dados[$i]['valor'];
			$cliente = $dados[$i]['nome_cliente'];
			$advogado = $dados[$i]['nome_advogado'];
			$pago = $dados[$i]['pago'];

			

echo '
		<tr>

			
			<td>'.$descricao.'</td>
			
			
			<td>R$ '.$valor.'</td>
			<td>'.$advogado.'</td>
			<td>'.$cliente.'</td>
			
			
			
			<td>
				
				';

				if($pago == 'nao'){
					echo '
				<a title="Excluir Registro" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>

				<a title="Baixar Pagamento" href="index.php?acao='.$pagina.'&funcao=concluir&id='.$id.'">
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