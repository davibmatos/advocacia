<?php 

require_once("../../conexao.php");

$titulo = $_POST['titulo'];
$acao = $_POST['acao'];
$agravante = $_POST['agravante'];
$agravado = $_POST['agravado'];
$texto = $_POST['texto'];
$processo = $_POST['processo'];
$editar = $_POST['editar'];


	if($editar == 'sim'){
		$res = $pdo->prepare("UPDATE peticoes set titulo = :titulo, acao = :acao, agravante = :agravante, agravado = :agravado, texto = :texto, data = curDate() where processo = :processo");
	}else{

		//verificar se a petição já existe
		$res_p = $pdo->query("SELECT * from peticoes where processo = '$processo'");
		$dados_p = $res_p->fetchAll(PDO::FETCH_ASSOC);
		$linhas = count($dados_p);
		if($linhas == 0){
			$res = $pdo->prepare("INSERT into peticoes (titulo, acao, processo, agravante, agravado, texto, data) values (:titulo, :acao, :processo, :agravante, :agravado, :texto, curDate())");
		}else{
			exit();
		}

		
	}

	

	$res->bindValue(":titulo", $titulo);
	$res->bindValue(":acao", $acao);
	$res->bindValue(":agravado", $agravado);
	$res->bindValue(":agravante", $agravante);
	$res->bindValue(":texto", $texto);
	$res->bindValue(":processo", $processo);
	
	

	$res->execute();


	//ATUALIZAR NA TABELA PROCESSOS A DATA DA PETICAO
	$pdo->query("UPDATE processos set data_peticao = curDate() where num_processo = '$processo'");


	

	echo "Cadastrado com Sucesso!!";





?>