<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



//EXCLUIR A AUDIENCIA
$res = $pdo->prepare("DELETE from historico where id = :id ");

$res->bindValue(":id", $id);

$res->execute();




?>