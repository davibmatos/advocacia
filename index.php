<?php 

require_once("conexao.php");


$senha = '123';
$senha_cript = md5($senha);
$res_usuarios = $pdo->query("SELECT * from usuarios where nivel = 'admin'");
$dados_usuarios = $res_usuarios->fetchAll(PDO::FETCH_ASSOC);
$linhas_usuarios = count($dados_usuarios);
if($linhas_usuarios == 0){
  $res_insert = $pdo->query("INSERT into usuarios (nome, cpf, usuario, senha, senha_original, nivel) values ('Administrador', '000.000.000-00', '$email_site', '$senha_cript', '$senha', 'admin')");

  $res_insert = $pdo->query("INSERT into funcionarios (nome, cpf, telefone, email, cargo) values ('Administrador', '000.000.000-00', '$telefone_empresa', '$email_site', 'admin')");
}

 ?>


 <!DOCTYPE html>
<html>
<head>
  <title>Painel Administrativo</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

  
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/x-icon">

<link href="css/style.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</head>
<body>

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Faça seu Login</h2>
		    <form class="login-form" method="post" action="autenticar.php">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Usuário</label>
    <input type="email" name="usuario" class="form-control" placeholder="Digite seu Email" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Senha</label>
    <input type="password" name="senha" class="form-control" placeholder="" required>
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Lembrar-Me</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Logar</button>
  </div>
  
</form>
<div class="copy-text"><a class="text-dark" href="" data-toggle="modal" data-target="#modal-recuperar">Recuperar Senha</a></div>
		</div>
		<div class="col-md-8 banner-sec">
           
	</div>
</div>
</section>


</body>
</html>





<div class="modal fade" id="modal-recuperar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Recuperar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">

          <div class="form-group">
            <label class="text-dark" for="exampleInputEmail1">Seu Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEmail">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button name="recuperar-senha" type="submit" class="btn btn-primary">Recuperar</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php 
if(isset($_POST['recuperar-senha'])){
  $email_usuario = $_POST['txtEmail'];

  $res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario");

  $res->bindValue(":usuario", $email_usuario);
  $res->execute();

  $dados = $res->fetchAll(PDO::FETCH_ASSOC);
  $linhas = count($dados);

  if($linhas > 0){
    $nome_usu = $dados[0]['nome'];
    $senha_usu = $dados[0]['senha_original'];
    $nivel_usu = $dados[0]['nivel'];

  }else{
    echo "<script language='javascript'>window.alert('Este email não está cadastrado no sistema!'); </script>";
  }


  //AQUI VAI O CÓDIGO DE ENVIO DO EMAIL
  $to = $email_usuario;
  $subject = "Recuperação de Senha $nome_empresa ";

  $message = "

  Olá $nome_usu!! 
  <br><br> Sua senha é <b>$senha_usu </b>

  <br><br> Ir Para o Sistema -> <a href='$url_sistema'  target='_blank'> Clique Aqui </a>

  ";

  $remetente = $email_site;
  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8;' . "\r\n";
  $headers .= "From: " .$remetente;
  mail($to, $subject, $message, $headers);

  

  echo "<script language='javascript'>window.alert('Sua senha foi enviada no seu email, verifique no spam ou lixo eletrônico!!'); </script>";

  echo "<script language='javascript'>window.location='index.php'; </script>";


}
?>



