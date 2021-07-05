<?php
session_start();

setcookie("ck_authorized", "true", 0, "/");

if(!isset($_SESSION["usuarioId"])):
	header("location: index.php");
else:
	$login = $_SESSION["usuarioId"];
endif;

$connect = mysqli_connect("localhost", "u857042521_vendoon", "Alm#2017", "u857042521_vendoon");
$query = "SELECT * FROM ws_parceiros_usuarios INNER JOIN ws_parceiros_clientes ON ws_parceiros_clientes.id_user = ws_parceiros_usuarios.id_parceiro WHERE id_user = ($login) ORDER BY id_parceiro_cli DESC

 ";

$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   <?
   
	echo "". $_SESSION['usuarioNome'];	
?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="#" class="simple-text logo-normal">

Olá Parceiro

<!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="dashboard.php">
              <i class="nc-icon nc-touch-id"></i>
              <p>Meu Painel</p>
            </a>
          </li>
          <li>
            <a href="cliente.php">
              <i class="nc-icon nc-badge"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li>
            <a href="contabancaria.php">
              <i class="nc-icon nc-bank"></i>
              <p>Contas</p>
            </a>
          </li>
         
          
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="nc-icon nc-spaceship"></i>
              <p>LEMTEC - 2021</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;"><?php
	session_start();
	echo "". $_SESSION['usuarioNome'];	
?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Pesquise aqui">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block"></span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="sair.php">Sair</a>
          
                </div>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

   <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card demo-icons">
              <div class="card-header">
                <h5 class="card-title">Meus Clientes</h5>
                <p class="card-category">Visualize | Cadastre</p>
              </div>
         

 
 <div class="container" style="width:700px;">  
   <h3 align="center"></h3>  
   <br />  
   <div class="table">
    <div align="right">
     <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning"><center>Cadastrar o Cliente</center></button>
    </div>
    <br />
    <div id="container" style="width:700px;">
     <table class="table table-hover" >
      <tr>
    
       <th width="70%"><center>Nome</center></th>  
       <th width="50%"><center>Endereço</center></th>
       <th width="70%"><center>WhatsAPP</center></th>
       <th width="70%"><center>Plano</center></th>
       <th width="70%"><center>Data</center></th>
       <th width="70%"><center>Editar</center></th>



      </tr>
<?


while($row = $result->fetch_array())

      {
      ?>
      <tr>
      
       <td><center><?= $row["nome"]; ?></center></td>
       <td><center><?= $row["endereco"]; ?></center></td>
       <td><center><?= $row["telefone"]; ?></center></td>
       <td><center><?= $row["plano"]; ?></center></td>
       <td><center><?= $row["data"]; ?></center></td>
    
       <td><center><input type="button" 
       name="view_data" id="<?php echo $row["id_parceiro_cli"]; ?>" data-toggle="modal" data-target="#dataModal"
       value="Editar"  class="btn btn-info btn-xs " /></center></td>
   
      </tr>
      <?
        
      }


      ?>
     </table>
    </div>
   </div>  
  </div>
 
   <div id="add_data_Modal"  class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"></h4>
   </div>
   <div class="modal-body">
        <form name="contactForm" action="./insert.php" method="POST" data-toggle="validator" 
                 
                  novalidate>
                
         
     <label>Nome Completo</label>
     <input type="text"  id="nome" name="nome" class="form-control" />
     <br />
     <label>Endereço Completo</label>
     <input type="text"  id="endereco" name="endereco" class="form-control" />

     <br />
      <label>Telefone do Cliente</label>
     <input type="text"  id="telefone" name="telefone" class="form-control" />
     <br />  
     <label>Qual o Plano do Cliente?</label>
    <select required class="form-control" id="plano" name="plano">
    <option value="150">150</option>
    <option value="350">350</option>
    <option value="1500">1500</option>
    </select>
    <br />  
    <label>Data do Cadastramento</label>
    <input type="date" id="data" name="data" class="form-control" />
     <br />
     <div id="success"></div>
     <div class="modal-footer">
     <center>  <input name="SendCadCont"  type="submit" class="btn btn-success btn-lg btn-cadastrar" value="Cadastrar o Cliente">
     </center>  
</div>
    
   </div>
   </div>
   <br>
   </div>
   </form>
                </div>
            </div>
        </div>
   

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"></h4>
   </div>
  
   <div class="table" id="employee_detail" >

    <h1>testes</h1>
  
  </div>
  
<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  
  if($('#nome').val() == "")  
   {
       
   }else{
       
  
 $(document).on('click', '.view_data', function(){
  //('#dataModal').modal();
  var id = $(this).attr("id_parceiro");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{id:id_parceiro},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
};  
 };
 </script>

<br><br><br><br><br>
     <div class="row">
 </div>
          <div class="col-md-8">
           
          </div>
        </div>
      </div>
	  
	   <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
             
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

 <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>
</html>