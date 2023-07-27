<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



//BUSCAR O EMAIL DO REGISTRO PARA TAMBÉM DELETAR NA TABELA DE FUNCIONÁRIOS
$res_excluir = $pdo->query("select * from funcionarios where id = '$id'");
$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
$email= $dados_excluir[0]['email'];
$cargo= $dados_excluir[0]['cargo'];



//EXCLUIR NA TABELA DE ADVOGADOS
if($cargo == 'Advogado'){
$pdo->query("DELETE from advogados where email = '$email' ");

}

//EXCLUIR NA TABELA DE USUÁRIOS
$pdo->query("DELETE from usuarios where usuario = '$email' ");


$res = $pdo->query("DELETE from funcionarios where id = '$id' ");


?>