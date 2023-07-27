<?php 

require_once("../../conexao.php");


$id = $_POST['id'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$hora = $_POST['hora'];
$local = $_POST['local'];



//BUSCAR O NUMERO DO PROCESSO / ADVOGADO / DATA E HORA ANTIGAS
$res_valor = $pdo->query("select * from audiencias where id = '$id'");
$dados_valor  = $res_valor ->fetchAll(PDO::FETCH_ASSOC);
$processo = $dados_valor [0]['processo'];
$advogado = $dados_valor [0]['advogado'];
$data_ant = $dados_valor [0]['data'];
$hora_ant = $dados_valor [0]['hora'];

$res = $pdo->prepare("UPDATE audiencias set descricao = :descricao, local = :local, data = :data, hora = :hora  where id = '$id' ");

	$res->bindValue(":hora", $hora);
	$res->bindValue(":local", $local);
	$res->bindValue(":data", $data);
	$res->bindValue(":descricao", $descricao);
	

	$res->execute();


echo "Editado com Sucesso!!";





//LANÇAR NA TABELA DE PROCESSOS


$res = $pdo->prepare("UPDATE processos SET data_audiencia = :data_audiencia, hora_audiencia = :hora_audiencia WHERE num_processo = :processo");

$res->bindValue(":data_audiencia", $data);
$res->bindValue(":hora_audiencia", $hora);
$res->bindValue(":processo", $processo);


$res->execute();



//LANÇAR NA TABELA DE TAREFAS

//BUSCAR A TAREFA DA AUDIENCIA
$res_c = $pdo->query("select * from tarefas where data = '$data_ant' and hora = '$hora_ant' and advogado = '$advogado' and nome = 'Audiência'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$id_tarefa = $dados_c[0]['id'];

$res = $pdo->prepare("UPDATE tarefas SET data = :data_audiencia, hora = :hora_audiencia WHERE id = '$id_tarefa'");

$res->bindValue(":data_audiencia", $data);
$res->bindValue(":hora_audiencia", $hora);
$res->execute();




?>