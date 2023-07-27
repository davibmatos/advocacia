<?php 

require_once("../../conexao.php");

$id = $_POST['id'];

$res = $pdo->query("DELETE from receber where id = '$id' ");


?>