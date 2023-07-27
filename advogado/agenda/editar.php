<?php 

require_once("../../conexao.php");


$id = $_POST['id'];

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$antigo = $_POST['antigo'];
$antigo2 = $_POST['antigo2'];

$cpf_adv = $_SESSION['cpf_usuario'];


//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
if($antigo != $hora or $antigo2 != $data){

		//VERIFICAR SE O FUNCIONÁRIO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from tarefas where data = '$data' and hora = '$hora' and advogado = '$cpf_adv'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Horário não está disponível!!";
		exit();
	}

}



	$res = $pdo->prepare("UPDATE tarefas set nome = :nome, descricao = :descricao, data = :data, hora = :hora where id = :id ");

	$res->bindValue(":nome", $nome);
//$res->bindValue(":cpf", $cpf);
	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":data", $data);
	$res->bindValue(":hora", $hora);
	$res->bindValue(":id", $id);


	$res->execute();

	echo "Editado com Sucesso!!";






?>