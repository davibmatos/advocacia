<?php 
require_once("../conexao.php");

if(@$_SESSION['nivel_usuario'] != 'admin'){
	echo "<script language='javascript'>window.location='../index.php'; </script>";
	}


//VAVIAVEL ITEM QUE VAI DEFINIR A CHAMADA DAS PAGINAS NO MENU
$item1 = 'home';
$item2 = 'funcionarios';
$item3 = 'advogados';
$item4 = 'clientes';
$item5 = 'cargos';
$item6 = 'especialidades';
$item7 = 'varas';
$item8 = 'processos';
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Painel Administrativo</title>
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
                  Painel Administrativo
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
                        
                         <li class="rd-nav-item"><a class="rd-nav-link" href="index.php?acao=<?php echo $item1 ?>">Home</a></li>

                           <li class="rd-nav-item dropdown">
                          <a class="rd-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pessoas
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="nav-link" href="index.php?acao=<?php echo $item2 ?>">Funcionários</a>
                           <a class="nav-link" href="index.php?acao=<?php echo $item3 ?>">Advogados</a>
                            <a class="nav-link" href="index.php?acao=<?php echo $item4 ?>">Clientes</a>
                          </div>
                        </li>

                      
                         <li class="rd-nav-item dropdown">
                          <a class="rd-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastros
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="index.php?acao=<?php echo $item5 ?>">Cargos</a>
                           <a class="nav-link" href="index.php?acao=<?php echo $item6 ?>">Especialidades</a>
                            <a class="nav-link" href="index.php?acao=<?php echo $item7 ?>">Varas</a>
                          </div>
                        </li>

                           <li class="rd-nav-item">
                          <a class="rd-nav-link" id="v-pills-messages-tab"  href="index.php?acao=<?php echo $item8 ?>" role="tab" aria-controls="v-pills-messages" aria-selected="false">Processos</a>
                        </li>

                       <li class="rd-nav-item">
                          <a class="rd-nav-link" id="v-pills-messages-tab"  href="backup.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Backup do Banco</a>
                        </li>

                         <li class="rd-nav-item"><a target="_blank" class="rd-nav-link" href="../recepcao">Financeiro / Recepção</a>
                        
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


      <div>
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




