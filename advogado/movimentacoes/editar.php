<?php 

require_once("../../conexao.php");


$id = $_POST['id'];
$titulo = $_POST['titulo'];
$data = $_POST['data'];
$obs = $_POST['obs'];



$res = $pdo->prepare("UPDATE historico set titulo = :titulo, obs = :obs, data = :data where id = '$id' ");

	$res->bindValue(":titulo", $titulo);
	$res->bindValue(":obs", $obs);
	$res->bindValue(":data", $data);
	
	

	$res->execute();


echo "Editado com Sucesso!!";


$res->execute();



?>