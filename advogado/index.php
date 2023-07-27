<?php 
require_once("../conexao.php");

$email_usuario = @$_SESSION['email_usuario'];

if(@$_SESSION['nivel_usuario'] != 'Advogado'){
	echo "<script language='javascript'>window.location='../index.php'; </script>";


}


//VAVIAVEL ITEM QUE VAI DEFINIR A CHAMADA DAS PAGINAS NO MENU
$item1 = 'home';
$item2 = 'clientes';
$item3 = 'agenda';
$item4 = 'processados';
$item5 = 'processos';
$item6 = 'audiencias';
$item7 = 'movimentacoes';
$item8 = 'pagamentos';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Painel do Advogado</title>
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
            Painel Advogado
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
                  <li class="rd-nav-item"><a class="rd-nav-link" data-toggle="modal" data-target="#modal-senha">Editar Dados</a>
                  </li>


                    <li class="rd-nav-item dropdown">
                          <a class="rd-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pessoas
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="nav-link" href="index.php?acao=<?php echo $item2 ?>">Clientes</a>
                           <a class="nav-link" href="index.php?acao=<?php echo $item4 ?>">Parte Contrária</a>
                           
                          </div>
                        </li>
                  
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item5 ?>">Processos</a>
                  </li>
                   <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item3 ?>">Prazos</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item6 ?>">Audiências</a>
                  </li>
                   <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item7 ?>">Movimentações</a>
                  </li>

                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item8 ?>">Pagamentos</a>
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
   include_once($item6. ".php");

    }elseif(@$_GET['acao'] == $item7){
   include_once($item7. ".php");


 }elseif(@$_GET['acao'] == $item8){
   include_once($item8. ".php");

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
          Alterar Dados
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


        $res_2 = $pdo->query("select * from advogados where email = '$email_usuario'");
        $dados_2 = $res_2->fetchAll(PDO::FETCH_ASSOC);
        $espec = @$dados_2[0]['especialidade'];
        $foto = @$dados_2[0]['foto'];
        $biografia = @$dados_2[0]['biografia'];

        if($foto == ''){
          $foto = 'sem-perfil.jpg';
        }
        ?>


        <form method="post" enctype="multipart/form-data">




          <div class="form-group">
            <label for="exampleFormControlInput1">Senha</label>
            <input type="text" class="form-control" id="" placeholder="Insira a Senha" name="senha" value="<?php echo $senha_original ?>">
          </div>


           <div class="form-group">
            <label for="exampleFormControlInput1">Mini Biografia</label>
            <textarea class="form-control" name="biografia" maxlength="350"><?php echo @$biografia ?></textarea> 
          </div>


          
          <div class="form-group">
            <label for="exampleFormControlSelect1">Especialidade</label>


            <select class="form-control" id="" name="especialidade">



              <?php 
                //SE EXISTIR EDIÇÃO DOS DADOS, TRAZER COMO PRIMEIRO REGISTRO O CARGO DO FUNCIONARIO

              if($espec != ''){
                $res_espec = $pdo->query("SELECT * from especialidades where nome = '$espec'");
                $dados_espec = $res_espec->fetchAll(PDO::FETCH_ASSOC);

                for ($i=0; $i < count($dados_espec); $i++) { 
                  foreach ($dados_espec[$i] as $key => $value) {
                  }

                  $id_cargo = $dados_espec[$i]['id']; 
                  $nome_cargo = $dados_espec[$i]['nome'];

                }


                echo '<option value="'.$nome_cargo.'">'.$nome_cargo.'</option>';
              }





                //TRAZER TODOS OS REGISTROS DE CARGOS
              $res = $pdo->query("SELECT * from especialidades order by nome asc");
              $dados = $res->fetchAll(PDO::FETCH_ASSOC);

              for ($i=0; $i < count($dados); $i++) { 
                foreach ($dados[$i] as $key => $value) {
                }

                $id = $dados[$i]['id']; 
                $nome = $dados[$i]['nome'];

                if($nome_espec != $nome){
                  if($nome != $espec){
                     echo '<option value="'.$nome.'">'.$nome.'</option>';
                  }
                 
                }


              }
              ?>
            </select>


            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="inputAddress">Foto</label>
                  <div class="custom-file">

                    <input type="file" name="foto" id="foto">


                  </div>


                </div>

              </div>

               <div class="col-md-6">
                    <img src="../img/profiles/<?php echo $foto ?>" width="100">
                  </div>

            </div>



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
  $especialidade = $_POST['especialidade'];
  $biografia = $_POST['biografia'];


  //SCRIPT PARA FOTO NO BANCO
    $caminho = '../img/profiles/' .$_FILES['foto']['name'];
    if ($_FILES['foto']['name'] == ""){
      $imagem = "sem-perfil.jpg";
    }else{
      $imagem = $_FILES['foto']['name']; 
    }
    
    $imagem_temp = $_FILES['foto']['tmp_name']; 
    move_uploaded_file($imagem_temp, $caminho);



  $res_adv = $pdo->query("SELECT * from advogados where email = '$email_usuario'");
  $dados_adv = $res_adv->fetchAll(PDO::FETCH_ASSOC);
    $id_adm = $dados_adv[0]['id'];  


     $res_usuario_2 = $pdo->query("SELECT * from usuarios where usuario = '$email_usuario'");
  $dados_usuario_2 = $res_usuario_2->fetchAll(PDO::FETCH_ASSOC);
    $id_user = $dados_usuario_2[0]['id'];  
                
   

      
     if ($_FILES['foto']['name'] == ""){
       $res = $pdo->prepare("UPDATE advogados SET especialidade = :especialidade, biografia = :biografia where id = :id");
     }else{
       $res = $pdo->prepare("UPDATE advogados SET especialidade = :especialidade, foto = :foto, biografia = :biografia where id = :id");
       $res->bindValue(":foto", $imagem);
     }
   

    $res->bindValue(":especialidade", $especialidade);
    $res->bindValue(":biografia", $biografia);
    
    $res->bindValue(":id", $id_adm);

    $res->execute();




     $res = $pdo->prepare("UPDATE usuarios SET senha = :senha, senha_original = :senha_original where id = :id");

    $res->bindValue(":senha", md5($senha));
    $res->bindValue(":senha_original", $senha);
    $res->bindValue(":id", $id_user);

    $res->execute();

    
    echo "<script language='javascript'>window.location='index.php'; </script>";

 

  

}

?>









<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>
