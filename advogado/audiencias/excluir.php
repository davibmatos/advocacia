<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



//BUSCAR O NUMERO DO PROCESSO
$res_valor = $pdo->query("select * from audiencias where id = '$id'");
$dados_valor  = $res_valor ->fetchAll(PDO::FETCH_ASSOC);
$processo = $dados_valor [0]['processo'];

//TRAZER O TOTAL DE AUDIENCIAS JÁ REALIZADAS NO PROCESSO
	$res_a = $pdo->query("SELECT * from processos where num_processo = '$processo'");
	$dados_a = $res_a->fetchAll(PDO::FETCH_ASSOC);
	$total_aud = $dados_a[0]['audiencias'];
	$total_aud = $total_aud - 1;

$res = $pdo->query("UPDATE processos SET audiencias = '$total_aud' WHERE num_processo = '$processo'");




//EXCLUIR A AUDIENCIA
$res = $pdo->prepare("DELETE from audiencias where id = :id ");

$res->bindValue(":id", $id);

$res->execute();




?>