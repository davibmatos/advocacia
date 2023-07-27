<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];


$func = $_SESSION['cpf_usuario'];


$pdo->query("UPDATE pagar set pagamento = curDate(), pago = 'Sim', funcionario = '$func'  where id = '$id' ");


echo "Editado com Sucesso!!";





//LANÇAR NA TABELA DE MOVIMENTAÇÕES

//BUSCAR O VALOR DA CONSULTA FEITA
$res_valor = $pdo->query("select * from pagar where id = '$id'");
$dados_valor  = $res_valor ->fetchAll(PDO::FETCH_ASSOC);
$valor = $dados_valor [0]['valor'];

$res = $pdo->prepare("INSERT into movimentacoes (tipo, movimento, valor, tesoureiro, data, id_movimento) values (:tipo, :movimento, :valor, :tesoureiro, curDate(), :id_movimento)");

$res->bindValue(":tipo", 'Saída');
$res->bindValue(":movimento", 'Pagamento Conta');
$res->bindValue(":valor", $valor);
$res->bindValue(":tesoureiro", $func);
$res->bindValue(":id_movimento", $id);

$res->execute();



?>