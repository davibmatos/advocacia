<?php 

require_once("../../conexao.php");


$id = $_POST['id'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$local = $_POST['local'];


$res = $pdo->prepare("UPDATE audiencias set descricao = :descricao, local = :local, data = :data, hora = :hora  where id = '$id' ");

	$res->bindValue(":hora", $hora);
	$res->bindValue(":local", $local);
	$res->bindValue(":data", $data);
	$res->bindValue(":descricao", $descricao);
	

	$res->execute();


echo "Editado com Sucesso!!";





//LANÇAR NA TABELA DE PROCESSOS

//BUSCAR O NUMERO DO PROCESSO
$res_valor = $pdo->query("select * from audiencias where id = '$id'");
$dados_valor  = $res_valor ->fetchAll(PDO::FETCH_ASSOC);
$processo = $dados_valor [0]['processo'];

$res = $pdo->prepare("UPDATE processos SET data_audiencia = :data_audiencia, hora_audiencia = :hora_audiencia WHERE num_processo = :processo");

$res->bindValue(":data_audiencia", $data);
$res->bindValue(":hora_audiencia", $hora);
$res->bindValue(":processo", $processo);


$res->execute();



?>