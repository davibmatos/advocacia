<?php 
require_once("../conexao.php");

$email_usuario = @$_SESSION['email_usuario'];

if(@$_SESSION['nivel_usuario'] != 'Recepcionista' and @$_SESSION['nivel_usuario'] != 'Tesoureiro' and @$_SESSION['nivel_usuario'] != 'admin'){
	echo "<script language='javascript'>window.location='../index.php'; </script>";

}


if(@$_SESSION['nivel_usuario'] == 'Recepcionista'){
  $nome1 = 'Recepcionista';
  $nome2 = 'Recepção';
}

if(@$_SESSION['nivel_usuario'] == 'Tesoureiro'){
  $nome1 = 'Tesoureiro';
  $nome2 = 'Tesouraria';
}

if(@$_SESSION['nivel_usuario'] == 'admin'){
  $nome1 = 'Financeiro';
  $nome2 = 'Financeiro';
}


//VAVIAVEL ITEM QUE VAI DEFINIR A CHAMADA DAS PAGINAS NO MENU
$item1 = 'home';
$item2 = 'receber';
$item3 = 'pagar';
$item4 = 'pagamentos';
$item5 = 'movimentacoes';
$item6 = 'audiencias';
$item7 = 'clientes';
$item8 = 'processos';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Painel da <?php echo $nome2 ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">

	
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style-painel.css">
  <link rel="stylesheet" href="../css/style.css">








</head>
<body>
 <header class="section page-header rd-navbar-transparent-wrap">
  <!--RD Navbar-->
  <div class="rd-navbar-wrap">
    <nav class="rd-navbar rd-navbar-transparent" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="20px" data-xl-stick-up-offset="20px" data-xxl-stick-up-offset="20px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
      <div class="rd-navbar-aside-outer rd-navbar-collapse">
        <div class="rd-navbar-aside">
          <div class="rd-navbar-info">
            Painel <?php echo $nome1 ?>
          </div>
          <ul class="list-lined">
            <li><a href=""><?php echo $_SESSION['nome_usuario'] ?></a></li>
            <li><a href="../logout.php">Sair</a></li>

          </ul>
        </div>
      </div>
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main-inner">
          <div class="rd-navbar-main">
            <!--RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!--RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!--RD Navbar Brand-->
              <div class="rd-navbar-brand">
                <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="../img/logo.png" alt="" width="146" height="22"/><img class="brand-logo-light" src="../img/logobranca.png" alt="" width="155" height="22"/></a>
              </div>
            </div>
            <div class="rd-navbar-main-element">
              <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">

                 <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item1 ?>">Home</a>
                
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item2 ?>">Contas à receber</a>
                  </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item3 ?>">Contas à pagar</a>
                  </li>
                   <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item4 ?>">Pagamentos</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item5 ?>">Movimentações</a>
                  </li>
                  <?php if(@$_SESSION['nivel_usuario'] != 'Tesoureiro'){ ?>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item6 ?>">Audiências</a>
                  </li>
                   <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item7 ?>">Clientes</a>
                  </li>
                   <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item8 ?>">Processos</a>
                  </li>

                  
                   <?php } ?>

                    <li class="rd-nav-item"><a class="rd-nav-link" data-toggle="modal" data-target="#modal-senha">Editar Senha</a>
                  </li>


                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>


<script src="../js/core.min.js"></script>
<script src="../js/script.js"></script>


<div class="conteudo-painel">
 <?php 
 if(@$_GET['acao'] == $item1){
   include_once($item1. ".php");
 }elseif(@$_GET['acao'] == $item2){
   include_once($item2. ".php");

 }elseif(@$_GET['acao'] == $item3){
   include_once($item3. ".php");

 }elseif(@$_GET['acao'] == $item4){
   include_once($item4. ".php");

  }elseif(@$_GET['acao'] == $item5){
   include_once($item5. ".php");

 }elseif(@$_GET['acao'] == $item6){
  if(@$_SESSION['nivel_usuario'] != 'Tesoureiro'){ 
   include_once($item6. ".php");
 }else{
  include_once($item1. ".php");
 }
}

 elseif(@$_GET['acao'] == $item7){
  if(@$_SESSION['nivel_usuario'] != 'Tesoureiro'){ 
   include_once($item7. ".php");
 }else{
  include_once($item1. ".php");
 }
}

 elseif(@$_GET['acao'] == $item8){
  if(@$_SESSION['nivel_usuario'] != 'Tesoureiro'){ 
   include_once($item8. ".php");
 }else{
  include_once($item1. ".php");
 }


  }else{
    include_once($item1. ".php");
  }
 ?>
</div>



</body>
</html>







<!-- Modal -->
<div class="modal fade" id="modal-senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Alterar Senha
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <?php 

        $res = $pdo->query("select * from usuarios where usuario = '$email_usuario'");
        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
        $senha_original = $dados[0]['senha_original'];


        
        ?>


        <form method="post" enctype="multipart/form-data">




          <div class="form-group">
            <label for="exampleFormControlInput1">Senha</label>
            <input type="text" class="form-control" id="" placeholder="Insira a Senha" name="senha" value="<?php echo $senha_original ?>">
          </div>


          


                


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

          <button type="submit" name="btn-senha" class="btn btn-primary">Alterar</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!--CÓDIGO DO BOTÃO SALVAR -->
<?php 
if(isset($_POST['btn-senha'])){
  $senha = $_POST['senha'];
 


     $res_usuario_2 = $pdo->query("SELECT * from usuarios where usuario = '$email_usuario'");
  $dados_usuario_2 = $res_usuario_2->fetchAll(PDO::FETCH_ASSOC);
    $id_user = $dados_usuario_2[0]['id'];  
                
   

     $res = $pdo->prepare("UPDATE usuarios SET senha = :senha, senha_original = :senha_original where id = :id");

    $res->bindValue(":senha", md5($senha));
    $res->bindValue(":senha_original", $senha);
    $res->bindValue(":id", $id_user);

    $res->execute();

    
    echo "<script language='javascript'>window.location='index.php'; </script>";

 

  

}

?>