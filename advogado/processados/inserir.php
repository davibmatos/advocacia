<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$obs = $_POST['obs'];
$pessoa = $_POST['tipo_pessoa'];

$cpf_adv = $_SESSION['cpf_usuario'];

if($cpf == ''){
	$cpf = $_POST['cnpj'];
}

if($cpf == '' and $_POST['cnpj'] == ''){
	echo 'Selecione um CPF / CNPJ';
	exit();
}


$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
$cpf_cript = md5($cpf_limpo);

//VERIFICAR SE O REGISTRO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from processados where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into processados (nome, cpf, telefone, email, endereco, advogado, data, obs, tipo_pessoa) values (:nome, :cpf, :telefone, :email, :endereco, :advogado, curDate(), :obs, :tipo_pessoa) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":endereco", $endereco);
	$res->bindValue(":advogado", $cpf_adv);
	
	$res->bindValue(":obs", $obs);
	$res->bindValue(":tipo_pessoa", $pessoa);

	$res->execute();




	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Registro já está cadastrado!!";
}

?>