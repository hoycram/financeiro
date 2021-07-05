<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parceiro<?php
	session_start();
	echo ": ". $_SESSION['usuarioNome'];	
?> </title>

    <link href="resource/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="sf_usuario/css/free.css" type="text/css" rel="stylesheet">
    <link href="resource/css/login.css" type="text/css" rel="stylesheet">
    <link rel="shortcut icon" href="/resource/img/Logotipo01.png">
    <link href="resource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="resource/js/fonts/Montserrat.css" rel="stylesheet" type="text/css">
    <link href="resource/js/fonts/Lato.css" rel="stylesheet" type="text/css">

    <script src="resource/jquery/jquery-3.1.1.js"></script>
    <script src="resource/js/bootstrap.js"></script>
    <script src="resource/js/jquery.easing.min.js"></script>
    <script src="resource/js/validator.js"></script>
    <script src="resource/js/freelancer.js"></script>
    <script src="js/loader.js"></script>

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
                <a class="navbar-brand" href="#">Seja Bem Vindo <?php
	session_start();
	echo "Sr(a).  ". $_SESSION['usuarioNome'];	
?></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form name="formLogin" id="formLogin" method="post" data-toggle="validator">

                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="sair.php">
                              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-user menu-i">
                              <li class="divider"></li>
                              <li><a href= "sair.php"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                              </li>
                          </ul>
                      </li>
                    </ul>
                    <ul class= "nav navbar-nav navbar-right">
                      <li class="page-scroll">
                        <a href="">Home</a>
                      </li>
                      <li class="page-scroll">
                        <a href="cliente.php">Cadastrar Cliente</a>
                      </li>
                      <li class="page-scroll">
                        <a href="contabancaria.php">Conta Bancaria</a>
                      </li>
                     
                    </ul>
                </form>
            </div>
        </div>
    </nav>

<br><br><br><br><br>

 <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">

                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociais</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                             <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li> 
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                      LEMTEC - Todos os direitos reservados &copy; 2021
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="resource/jquery/jquery-3.1.1.js"></script>
    <script src="resource/js/bootstrap.js"></script>
    <script src="resource/js/jquery.easing.min.js"></script>
    <script src="resource/js/validator.js"></script>
    <script src="resource/js/freelancer.js"></script>
    <script src="resource/js/util.js"></script>


</body>
</html>