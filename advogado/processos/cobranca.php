<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];

$cpf_adv = $_SESSION['cpf_usuario'];


//RECUPERAR O CPF DO CLIENTE
	$res_c = $pdo->query("select * from processos where id = '$id'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$cpf_cliente = $dados_c[0]['cliente'];


$res = $pdo->prepare("INSERT INTO receber (descricao, valor, advogado, cliente, data, pago, processo) values (:descricao, :valor, :advogado, :cliente, curDate(), :pago, :processo)");

	$res->bindValue(":descricao", $descricao);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":advogado", $cpf_adv);
	$res->bindValue(":cliente", $cpf_cliente);
	$res->bindValue(":pago", 'nao');
	$res->bindValue(":processo", $id);

	$res->execute();
	echo "Cadastrado com Sucesso!!";


?>