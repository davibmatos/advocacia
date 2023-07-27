<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$id = $_POST['id'];
$cpf_antigo = $_POST['cpf_antigo'];
$cargo = @$_POST['cargo'];

$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
$cpf_cript = md5($cpf_limpo);

if($cpf_antigo != $cpf){

		//VERIFICAR SE O FUNCIONÁRIO JÁ ESTÁ CADASTRADO
	$res_c = $pdo->query("select * from funcionarios where cpf = '$cpf'");
	$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados_c);

	if($linhas != 0){

		echo "Este Funcionário já está cadastrado!!";
		exit();
	}

}





$res = $pdo->prepare("UPDATE funcionarios set nome = :nome,  cpf = :cpf, telefone = :telefone, email = :email where id = :id ");

$res->bindValue(":nome", $nome);
$res->bindValue(":cpf", $cpf);
$res->bindValue(":telefone", $telefone);
$res->bindValue(":email", $email);

$res->bindValue(":id", $id);


$res->execute();



if($cargo == 'Advogado'){
		$res = $pdo->prepare("UPDATE advogados set nome = :nome,  cpf = :cpf, telefone = :telefone, email = :email where email = :id ");


	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":id", $email);

	$res->execute();



	
	$res = $pdo->prepare("UPDATE usuarios set nome = :nome,  usuario = :usuario, senha = :senha, senha_original = :senha_original, nivel = :nivel where usuario = :id ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);
	$res->bindValue(":senha", $cpf_cript);
	$res->bindValue(":senha_original", $cpf_limpo);
	$res->bindValue(":nivel", 'Advogado');
	$res->bindValue(":id", $email);

	$res->execute();
	}


	if($cargo == 'Tesoureiro'){
	$res = $pdo->prepare("UPDATE usuarios set nome = :nome,  usuario = :usuario, senha = :senha, senha_original = :senha_original, nivel = :nivel where usuario = :id ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":usuario", $email);
	$res->bindValue(":senha", $cpf_cript);
	$res->bindValue(":senha_original", $cpf_limpo);
	$res->bindValue(":nivel", 'Tesoureiro');
	$res->bindValue(":id", $email);

	$res->execute();
	}
	




echo "Editado com Sucesso!!";





?>