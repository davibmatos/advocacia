<?php 

require_once("../../conexao.php");

$id = $_POST['id'];
$func = $_SESSION['cpf_usuario'];

//BUSCAR AS INFORMAÇÕES DE CONTAS A RECEBER PARA LANÇAR NAS MOVIMENTAÇÕES
$res_c = $pdo->query("select * from receber where id = '$id'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$valor = $dados_c[0]['valor'];



$res = $pdo->query("UPDATE receber set pago = 'sim' where id = '$id' ");


//LANÇAR O VALOR NA TABELA DE MOVIMENTAÇÕES
$res2 = $pdo->prepare("INSERT into movimentacoes (tipo, movimento, valor, tesoureiro, data, id_movimento) values (:tipo, :movimento, :valor, :tesoureiro, curDate(), :id_movimento)");

$res2->bindValue(":tipo", 'Entrada');
$res2->bindValue(":movimento", 'Processo');
$res2->bindValue(":valor", $valor);
$res2->bindValue(":tesoureiro", $func);
$res2->bindValue(":id_movimento", $id);

$res2->execute();


?>