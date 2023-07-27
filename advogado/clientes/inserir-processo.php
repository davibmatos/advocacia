<?php 

require_once("../../conexao.php");

$numero = $_POST['numero'];
$vara = $_POST['vara'];
$tipo = $_POST['tipo'];
$cpf = $_POST['processado'];
$cpf_cliente = $_POST['cpf_cliente'];

$cpf_adv = $_SESSION['cpf_usuario'];

if($cpf == ''){
	$cpf = $_POST['cnpj'];
}

//TRAZER O TIPO DE PESSOA
$res_c = $pdo->query("select * from processados where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$tipo_pessoa = $dados_c[0]['tipo_pessoa'];

//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from processos where num_processo = '$numero'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into processos (num_processo, vara, tipo_acao, advogado, cliente, processado, data_abertura, status, tipo_pessoa) values (:num_processo, :vara, :tipo_acao, :advogado, :cliente, :processado, curDate(), :status, :tipo_pessoa) ");

	$res->bindValue(":num_processo", $numero);
	$res->bindValue(":vara", $vara);
	$res->bindValue(":tipo_acao", $tipo);
	$res->bindValue(":advogado", $cpf_adv);
	$res->bindValue(":cliente", $cpf_cliente);
	$res->bindValue(":processado", $cpf);
	$res->bindValue(":status", 'Aberto');
	$res->bindValue(":tipo_pessoa", $tipo_pessoa);

	$res->execute();


	




	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Registro já está cadastrado!!";
}

?>