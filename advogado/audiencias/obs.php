<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$obs = $_POST['obs'];

$res = $pdo->query("UPDATE audiencias set obs = '$obs' where id = '$id' ");


?>