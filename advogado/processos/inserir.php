<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$hora = $_POST['hora'];


$cpf_adv = $_SESSION['cpf_usuario'];

	
	//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from tarefas where data = '$data' and hora = '$hora'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);
	if($linhas == 0){



	$res = $pdo->prepare("INSERT into tarefas (nome, descricao, data, hora, advogado, status) values (:nome, :descricao, :data, :hora, :advogado, :status) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":data", $data);
	$res->bindValue(":hora", $hora);
	$res->bindValue(":advogado", $cpf_adv);
	$res->bindValue(":status", 'Agendada');

	$res->execute();
	echo "Cadastrado com Sucesso!!";

	}else{
		echo "Já existe uma tarefa agendada para este horário!!";
	}
	


	



?>