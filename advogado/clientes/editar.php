<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf_oculto'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$id = $_POST['id'];
$cpf_antigo = $_POST['cpf_antigo'];
$endereco = @$_POST['endereco'];
$obs = @$_POST['obs'];
$pessoa = $_POST['tipo_pessoa'];

$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
$cpf_cript = md5($cpf_limpo);

if($cpf_antigo != $cpf){

		//VERIFICAR SE O FUNCIONÁRIO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from clientes where cpf = '$cpf'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Registro já está cadastrado!!";
		exit();
	}

}





$res = $pdo->prepare("UPDATE clientes set nome = :nome, telefone = :telefone, email = :email, endereco = :endereco, obs = :obs, tipo_pessoa = :tipo_pessoa where id = :id ");

$res->bindValue(":nome", $nome);
//$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);
$res->bindValue(":endereco", $endereco);
$res->bindValue(":obs", $obs);
$res->bindValue(":tipo_pessoa", $pessoa);
$res->bindValue(":id", $id);


$res->execute();


	
	$res = $pdo->prepare("UPDATE usuarios set nome = :nome,  usuario = :usuario where cpf = :cpf ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);
	
	$res->bindValue(":cpf", $cpf);

	$res->execute();
	

echo "Editado com Sucesso!!";





?>