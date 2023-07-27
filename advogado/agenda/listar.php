<?php 

require_once("../../conexao.php");
$pagina = 'agenda';

$txtbuscar = @$_POST['txtbuscar'];
$cpf_adv = $_SESSION['cpf_usuario'];
$data_inicio = @$_POST['txtbuscar'];
$data_fim = @$_POST['txtbuscar2'];

if($data_inicio == '' && $data_fim == ''){
    $res = $pdo->query("SELECT * from tarefas where advogado = '$cpf_adv' and data = curDate() order by hora asc");
}else{
    $res = $pdo->query("SELECT * from tarefas where advogado = '$cpf_adv' and data >= '$data_inicio' and data <= '$data_fim' order by hora asc");
}

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$total_registros = count($dados);
	if($total_registros > 0){




echo '
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Descrição</th>
			<th scope="col">Data Fatal</th>
			<th scope="col">Hora</th>
			
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';

	
	  
	



	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			
			$descricao = $dados[$i]['descricao'];
			$hora = $dados[$i]['hora'];
			$status = $dados[$i]['status'];
			$data = $dados[$i]['data'];
			

			

echo '
		<tr>

			
			<td>'.$nome.'</td>
			
			
			<td>'.$descricao.'</td>
			<td>'.$data.'</td>
			<td>'.$hora.'</td>
			
			<td>
				<a title="Editar Registro" href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
				<a title="Excluir Registro" href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>';

				if($status == 'Agendada'){
					echo '

				<a title="Concluir Tarefa" href="index.php?acao='.$pagina.'&funcao=concluir&id='.$id.'">
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