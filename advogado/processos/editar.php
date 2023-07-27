<?php 

require_once("../../conexao.php");


$id = $_POST['id'];

$num_processo = $_POST['numero'];
$vara = $_POST['vara'];
$tipo_acao = $_POST['tipo_acao'];
$data_peticao = $_POST['data_peticao'];
$status = $_POST['status'];

$antigo = $_POST['antigo'];

$cpf_adv = $_SESSION['cpf_usuario'];


//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
if($antigo != $num_processo){

		//VERIFICAR SE O FUNCIONÁRIO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from processos where num_processo = '$num_processo'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Processo já foi lançado!!";
		exit();
	}

}



	$res = $pdo->prepare("UPDATE processos set num_processo = :num_processo, vara = :vara, tipo_acao = :tipo_acao, data_peticao = :data_peticao, status = :status where id = :id ");

	$res->bindValue(":num_processo", $num_processo);

	$res->bindValue(":vara", $vara);
	$res->bindValue(":tipo_acao", $tipo_acao);
	$res->bindValue(":data_peticao", $data_peticao);
	$res->bindValue(":status", $status);
	$res->bindValue(":id", $id);


	$res->execute();

	echo "Editado com Sucesso!!";






?>