<?php 

require_once("../../conexao.php");
$pagina = 'processos';

$txtbuscar = @$_POST['txtbuscar'];
$cpf_adv = $_SESSION['cpf_usuario'];

echo '
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">Número Processo</th>
			<th scope="col">Vara</th>
			<th scope="col">Tipo Ação</th>
			<th scope="col">Cliente</th>
			<th scope="col">Advogado</th>
			<th scope="col">Status</th>
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';

	
	    $itens_por_pagina = $_POST['itens'];

	//PEGAR A PÁGINA ATUAL
		$pagina_pag = intval(@$_POST['pag']);
		
		$limite = $pagina_pag * $itens_por_pagina;

		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';

	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from processos order by id desc LIMIT $limite, $itens_por_pagina");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from processos where num_processo LIKE '$txtbuscar' or cliente LIKE '$txtbuscar' order by id desc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


	//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from processos");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$num_processo = $dados[$i]['num_processo'];
			
			$vara = $dados[$i]['vara'];
			$tipo_acao = $dados[$i]['tipo_acao'];
			$cliente = $dados[$i]['cliente'];
			$advogado = $dados[$i]['advogado'];
			$status = $dados[$i]['status'];


			$res_vara = $pdo->query("SELECT * from varas where id = '$vara'");
			$dados_vara = $res_vara->fetchAll(PDO::FETCH_ASSOC);
			$linhas_vara = count($dados_vara);
			$nome_vara = $dados_vara[0]['nome'];


			$res_tipo = $pdo->query("SELECT * from especialidades where id = '$tipo_acao'");
			$dados_tipo = $res_tipo->fetchAll(PDO::FETCH_ASSOC);
			$linhas_tipo = count($dados_tipo);
			$nome_tipo = $dados_tipo[0]['nome'];


			$res_cli = $pdo->query("SELECT * from clientes where cpf = '$cliente'");
			$dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
			$linhas_cli = count($dados_cli);
			$nome_cli = $dados_cli[0]['nome'];

			$res_cli = $pdo->query("SELECT * from advogados where cpf = '$advogado'");
			$dados_cli = $res_cli->fetchAll(PDO::FETCH_ASSOC);
			$linhas_cli = count($dados_cli);
			$nome_adv = $dados_cli[0]['nome'];


			//VERIFICAR SE O PROCESSO TEM PAGAMENTO PENDENTE
			$res_rec = $pdo->query("SELECT * from receber where processo = '$id' and pago != 'sim'");
			$dados_rec = $res_rec->fetchAll(PDO::FETCH_ASSOC);
			$linhas_rec = count($dados_rec);
			if($linhas_rec > 0){
				$cor_square = 'text-danger';
			}else{
				$cor_square = 'text-success';
			}
			

echo '
		<tr>

			
			<td>
			<i class="fas fa-square mr-1 '.$cor_square.'"></i>
			'.$num_processo.'
			</td>
			
			
			<td>'.$nome_vara.'</td>
			<td>'.$nome_tipo.'</td>
			<td>'.$nome_cli.'</td>
			<td>'.$nome_adv.'</td>
			<td>'.$status.'</td>
			
			
			<td>
				';

				if($status == 'Andamento'){
					echo '

				
				<i class="fas fa-circle ml-1 text-info"></i>';
				}

				if($status == 'Aberto'){
					echo '

				<i class="fas fa-circle ml-1 text-warning"></i>';
				}

				if($status == 'Arquivado'){
					echo '

				
				<i class="fas fa-circle ml-1 text-secondary"></i>';
				}

				if($status == 'Concluído'){
					echo '

				<i class="fas fa-circle ml-1 text-success"></i>';
				}


				if($status == 'Cancelado'){
					echo '

				<i class="fas fa-circle ml-1 text-danger"></i>';
				}





				echo '

				
				
				
				<a title="Marcar Audiência" href="index.php?acao='.$pagina.'&funcao=audiencia&num='.$num_processo.'"><i class="fas fa-folder-open text-success ml-1"></i></a>
			

			</td>
		</tr>';

	}

echo  '
	</tbody>
</table> ';


if($txtbuscar == ''){


echo '
<!--ÁREA DA PÁGINAÇÃO -->
<nav class="paginacao" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>';
            
            for($i=0;$i<$num_paginas;$i++){
            $estilo = "";
            if($pagina_pag == $i)
              $estilo = "active";

          echo '
             <li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a></li>';
           } 
            
           echo '<li class="page-item">
              <a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
</nav>




';

}


?>