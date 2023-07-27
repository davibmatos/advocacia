<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->query("UPDATE tarefas set status = 'Concluida' where id = '$id' ");


?>