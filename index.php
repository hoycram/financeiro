<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vendo On-Parceiros</title>

    <link href="resource/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="resource/css/freelancer-login.css" type="text/css" rel="stylesheet">
    <link href="resource/css/login.css" type="text/css" rel="stylesheet">
    <link href="resource/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="resource/fonts/Montserrat.css" rel="stylesheet" type="text/css">
    <link href="resource/fonts/Lato.css" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
                <a class="navbar-brand" href="../index.php">Sistema Vendo On Flash</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="page-scroll">
                  <a href="cadastrar.php">Cadastre-Se</a>
                </li>
                
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="intro-text">
                            <h1 class="name">Vendo On-Parceiros</h1>
                            <hr class="star-light">
    
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
                <div class="form-signin col-lg-4">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h1 class="panel-title">Entre e veja suas finanças.</h1>
                      </div>
                      
                      
                      <div class="panel-body">
                          <form method="post" method="POST" action="valida.php" data-toggle="validator" role="form">
                          <div class="form-group col-lg-12">
                              <input class="form-control" placeholder="Digite seu email." type="email" name="email" id="inputEmail" data-error="E-mail inválido." required />
                              <div class="help-block with-errors"></div>
                          </div>
                          <div class="form-group col-lg-12">
                              <input class="form-control" placeholder="Digite sua senha." type="password" name="senha" id="inputPassword" required />
                          </div>
                          <div class="form-group col-lg-12">
                            <a href="esqueceu_senha.php"><font size="2em" color="black">Esqueceu a Senha?</font></a>
                          </div>

                          <div class="form-group col-lg-12">
                            <font color="red"><div class="help-block with-errors login-error"></div></font>
                            <input class="btn btn-success btn-login" value="Entrar no seu Painel" type="submit" />
                         
                       
                            
                          </div>
    
<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
	</p>                       
  
                          
   <p class="text-center text-danger">
			<?php if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset($_SESSION['loginErro']);
			}?>
		</p>
		<p class="text-center text-success">
			<?php 
			if(isset($_SESSION['logindeslogado'])){
				echo $_SESSION['logindeslogado'];
				unset($_SESSION['logindeslogado']);
			}
			?>
	</p>
		
                      </div>
                  </div>
              </div>
              </div>
          </div>

    </header>

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