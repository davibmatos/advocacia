<?php 

require_once("../../conexao.php");

$id = $_POST['id'];




$res = $pdo->prepare("DELETE from pagamentos where id = :id ");

$res->bindValue(":id", $id);

$res->execute();


$res = $pdo->prepare("DELETE from movimentacoes where id_movimento = :id and movimento = 'Pgto Funcionário' ");

$res->bindValue(":id", $id);

$res->execute();



?>