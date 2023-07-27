<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$obs = $_POST['obs'];

$res = $pdo->query("UPDATE processos set obs = '$obs' where id = '$id' ");


?>