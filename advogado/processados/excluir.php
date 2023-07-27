<?php 

require_once("../../conexao.php");

$id = $_POST['id'];


$res = $pdo->query("DELETE from processados where id = '$id' ");


?>