<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



//BUSCAR O EMAIL DO REGISTRO PARA TAMBÉM DELETAR NA TABELA DE FUNCIONÁRIOS
$res_excluir = $pdo->query("select * from clientes where id = '$id'");
$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
$cpf= $dados_excluir[0]['cpf'];
$cargo= $dados_excluir[0]['cargo'];


//EXCLUIR NA TABELA DE USUÁRIOS
$pdo->query("DELETE from usuarios where cpf = '$cpf' ");


$res = $pdo->query("DELETE from clientes where id = '$id' ");


?>