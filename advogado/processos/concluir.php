<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->query("UPDATE processos set status = 'Concluído' where id = '$id' ");


?>