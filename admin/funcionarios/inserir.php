<?php 

require_once("../../conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];

$cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
$cpf_cript = md5($cpf_limpo);

//VERIFICAR SE O FUNCIONÁRIO JÁ ESTÁ CADASTRADO
$res_c = $pdo->query("select * from funcionarios where cpf = '$cpf'");
$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados_c);
if($linhas == 0){
	$res = $pdo->prepare("INSERT into funcionarios (nome, cpf, telefone, email, cargo) values (:nome, :cpf, :telefone, :email, :cargo) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);
	$res->bindValue(":cargo", $cargo);

	$res->execute();


	if($cargo == 'Advogado'){
		$res = $pdo->prepare("INSERT into advogados (nome, cpf, telefone, email, foto) values (:nome, :cpf, :telefone, :email, 'sem-perfil.jpg') ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":telefone", $telefone);
	$res->bindValue(":email", $email);

	$res->execute();



	$res = $pdo->prepare("INSERT into usuarios (nome, cpf, usuario, senha, senha_original, nivel) values (:nome, :cpf, :usuario, :senha, :senha_original, :nivel) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":usuario", $email);
	$res->bindValue(":senha", $cpf_cript);
	$res->bindValue(":senha_original", $cpf_limpo);
	$res->bindValue(":nivel", 'Advogado');

	$res->execute();
	}


	if($cargo == 'Tesoureiro'){
	$res = $pdo->prepare("INSERT into usuarios (nome, cpf, usuario, senha, senha_original, nivel) values (:nome, :cpf, :usuario, :senha, :senha_original, :nivel) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":usuario", $email);
	$res->bindValue(":senha", $cpf_cript);
	$res->bindValue(":senha_original", $cpf_limpo);
	$res->bindValue(":nivel", 'Tesoureiro');

	$res->execute();
	}
	


	if($cargo == 'Recepcionista'){
	$res = $pdo->prepare("INSERT into usuarios (nome, cpf, usuario, senha, senha_original, nivel) values (:nome, :cpf, :usuario, :senha, :senha_original, :nivel) ");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":cpf", $cpf);
	$res->bindValue(":usuario", $email);
	$res->bindValue(":senha", $cpf_cript);
	$res->bindValue(":senha_original", $cpf_limpo);
	$res->bindValue(":nivel", 'Recepcionista');

	$res->execute();
	}

	
	




	echo "Cadastrado com Sucesso!!";

}else{
	echo "Este Funcionário já está cadastrado!!";
}

?>