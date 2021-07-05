<?php

session_start();
setcookie("ck_authorized", "true", 0, "/");


if(!isset($_SESSION["usuarioId"])):
	header("location: index.php");
else:
	$login = $_SESSION["usuarioId"];
endif;

$connect = mysqli_connect("localhost", "u857042521_vendoon", "Alm#2017", "u857042521_vendoon");
$query = "SELECT * FROM ws_parceiros_usuarios INNER JOIN ws_parceiros_conta ON ws_parceiros_conta.id_users = ws_parceiros_usuarios.id_parceiro WHERE id_users = ($login) ORDER BY id_conta DESC
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
              <p>   <span class="copyright">
                LEMTEC© - <script>
                  document.write(new Date().getFullYear())
                </script>
              </span></p>
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
            <a class="navbar-brand" href="javascript:;">
<?php
	echo "". $_SESSION['usuarioNome'];	
?>
</a>
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
                <h5 class="card-title">Meus Dados Bancário</h5>
                <p class="card-category">Visualize | Cadastre</p>
              </div>
         


  <br /><br />  
  <div class="container" style="width:900px;">  
   <h3 align="center"></h3>  
   <br />  
   <div class="table">
    <div align="right">
     <button type="button" name="nome" id="nome" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning"><center>Cadastrar Minha Conta</center></button>
    </div>
    <br />
    <div id="employee_table">
        
     <table class="table table-hover table-bordered">
      <tr>
       <th width="70%"><center>Nome completo<c/enter></th>  
       <th width="70%"><center>PIX - CPF | E-mail<c/enter></th>  
       <th width="70%"><center>Banco<c/enter></th>  
       <th width="70%"><center>Agência</center></th>
       <th width="70%"><center>Conta<c/enter></th>  
      </tr>
<?
      
while($row = $result->fetch_array())
      {

?>
   <tr>   
       <td><center><?php echo $row["nome_conta"]; ?></center></td>
       <td><center><?php echo$row["cpf_conta"]; ?></center></td>
       <td><center><?php echo $row["banco"]; ?></center></td>
       <td><center><?php echo$row["agencia"]; ?></center></td>
       <td><center><?php echo$row["conta"]; ?></center></td>
       
      </tr>
      
      <?
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"></h4>
   </div>
   
 <div class="modal-body">
        <form name="contactForm" action="insert_banco.php" method="POST" data-toggle="validator" 
                 
                  novalidate>
                
         
     <label>Nome Completo</label>
     <input type="text"  id="nome_conta" name="nome_conta" placeholder="Informe o nome do dono da conta." class="form-control" />
     
     <br />
  
   
     <label>Banco</label>
    <select required class="form-control" id="banco" name="banco">
    <option value="1 - Banco Do Brasil S.A (BB)">	1 -Banco Do Brasil S.A (BB)	</option>
<option value="237 - Bradesco S.A.">	237 -Bradesco S.A.	</option>
<option value="335 - Banco Digio S.A.">	335 -Banco Digio S.A.	</option>
<option value="260 -Nu Pagamentos S.A (Nubank)">	260 -Nu Pagamentos S.A (Nubank)	</option>
<option value="290 -PagSeguro Internet S.A.">	290 -PagSeguro Internet S.A.	</option>
<option value="323 -Mercado Pago – Conta Do Mercado Livre">	323 -Mercado Pago – Conta Do Mercado Livre	</option>
<option value="237 -Next Bank (Mesmo Código Do Bradesco)">	237 -Next Bank (Mesmo Código Do Bradesco)	</option>
<option value="637 -Banco Sofisa S.A (Sofisa Direto)">	637 -Banco Sofisa S.A (Sofisa Direto)	</option>
<option value="77 -Banco Inter S.A.">	77 -Banco Inter S.A.	</option>
<option value="341 -Itaú Unibanco S.A.">	341 -Itaú Unibanco S.A.	</option>
<option value="104 -Caixa Econômica Federal (CEF)">	104 -Caixa Econômica Federal (CEF)	</option>
<option value="33 -Banco Santander Brasil S.A.">	33 -Banco Santander Brasil S.A.	</option>
<option value="212 -Banco Original S.A.">	212 -Banco Original S.A.	</option>
<option value="756 -Bancoob – Banco Cooperativo Do Brasil S.A.">	756 -Bancoob – Banco Cooperativo Do Brasil S.A.	</option>
<option value="655 -Banco Votorantim S.A.">	655 -Banco Votorantim S.A.	</option>
<option value="655 -Neon Pagamentos S.A (Memso Código Do Banco Votorantim)">	655 -Neon Pagamentos S.A (Memso Código Do Banco Votorantim)	</option>
<option value="41 -Banrisul – Banco Do Estado Do Rio Grande Do Sul S.A.">	41 -Banrisul – Banco Do Estado Do Rio Grande Do Sul S.A.	</option>
<option value="389 -Banco Mercantil Do Brasil S.A.">	389 -Banco Mercantil Do Brasil S.A.	</option>
<option value="422 -Banco Safra S.A.">	422 -Banco Safra S.A.	</option>
<option value="70 -BRB – Banco De Brasília S.A.">	70 -BRB – Banco De Brasília S.A.	</option>
<option value="136 -Unicred Cooperativa LTDA">	136 -Unicred Cooperativa LTDA	</option>
<option value="741 -Banco Ribeirão Preto S.A.">	741 -Banco Ribeirão Preto S.A.	</option>
<option value="739 -Banco Cetelem S.A.">	739 -Banco Cetelem S.A.	</option>
<option value="743 -Banco Semear S.A.">	743 -Banco Semear S.A.	</option>
<option value="100 -Planner Corretora De Valores S.A.">	100 -Planner Corretora De Valores S.A.	</option>
<option value="96 -Banco B3 S.A.">	96 -Banco B3 S.A.	</option>
<option value="747 -Banco Rabobank Internacional Do Brasil S.A.">	747 -Banco Rabobank Internacional Do Brasil S.A.	</option>
<option value="748 -Banco Cooperativa Sicredi S.A.">	748 -Banco Cooperativa Sicredi S.A.	</option>
<option value="752 -Banco BNP Paribas Brasil S.A.">	752 -Banco BNP Paribas Brasil S.A.	</option>
<option value="91 -Unicred Central Rs">	91 -Unicred Central Rs	</option>
<option value="399 -Kirton Bank S.A. – Banco Múltiplo">	399 -Kirton Bank S.A. – Banco Múltiplo	</option>
<option value="108 -Portocred S.A.">	108 -Portocred S.A.	</option>
<option value="757 -Banco Keb Hana Do Brasil S.A.">	757 -Banco Keb Hana Do Brasil S.A.	</option>
<option value="102 -XP Investimentos S.A.">	102 -XP Investimentos S.A.	</option>
<option value="348 -Banco XP S/A">	348 -Banco XP S/A	</option>
<option value="340 -Super Pagamentos S/A (Superdital)">	340 -Super Pagamentos S/A (Superdital)	</option>
<option value="84 -Uniprime Norte Do Paraná">	84 -Uniprime Norte Do Paraná	</option>
<option value="180 -Cm Capital Markets Cctvm Ltda">	180 -Cm Capital Markets Cctvm Ltda	</option>
<option value="66 -Banco Morgan Stanley S.A.">	66 -Banco Morgan Stanley S.A.	</option>
<option value="15 -UBS Brasil Cctvm S.A.">	15 -UBS Brasil Cctvm S.A.	</option>
<option value="143 -Treviso Cc S.A.">	143 -Treviso Cc S.A.	</option>
<option value="62 -Hipercard Banco Múltiplo S.A.">	62 -Hipercard Banco Múltiplo S.A.	</option>
<option value="74 -Banco J. Safra S.A.">	74 -Banco J. Safra S.A.	</option>
<option value="99 -Uniprime Central Ccc Ltda">	99 -Uniprime Central Ccc Ltda	</option>
<option value="25 -Banco Alfa S.A.">	25 -Banco Alfa S.A.	</option>
<option value="75 -Bco Abn Amro S.A.">	75 -Bco Abn Amro S.A.	</option>
<option value="40 -Banco Cargill S.A.">	40 -Banco Cargill S.A.	</option>
<option value="190 -Servicoop">	190 -Servicoop	</option>
<option value="63 -Banco Bradescard">	63 -Banco Bradescard	</option>
<option value="191 -Nova Futura Ctvm Ltda">	191 -Nova Futura Ctvm Ltda	</option>
<option value="64 -Goldman Sachs Do Brasil Bm S.A.">	64 -Goldman Sachs Do Brasil Bm S.A.	</option>
<option value="97 -Ccc Noroeste Brasileiro Ltda">	97 -Ccc Noroeste Brasileiro Ltda	</option>
<option value="16 -Ccm Desp Trâns Sc E Rs">	16 -Ccm Desp Trâns Sc E Rs	</option>
<option value="12 -Banco Inbursa">	12 -Banco Inbursa	</option>
<option value="3 -Banco Da Amazônia S.A.">	3 -Banco Da Amazônia S.A.	</option>
<option value="60 -Confidence Cc S.A.">	60 -Confidence Cc S.A.	</option>
<option value="37 -Banco Do Estado Do Pará S.A.">	37 -Banco Do Estado Do Pará S.A.	</option>
<option value="159 -Casa do Crédito S.A.">	159 -Casa do Crédito S.A.	</option>
<option value="172 -Albatross Ccv S.A.">	172 -Albatross Ccv S.A.	</option>
<option value="85 -Cooperativa Central de Créditos – Ailos">	85 -Cooperativa Central de Créditos – Ailos	</option>
<option value="114 -Central Cooperativa De Crédito no Estado do Espírito Santo">	114 -Central Cooperativa De Crédito no Estado do Espírito Santo	</option>
<option value="36 -Banco Bradesco BBI S.A.">	36 -Banco Bradesco BBI S.A.	</option>
<option value="394 -Banco Bradesco Financiamentos S.A.">	394 -Banco Bradesco Financiamentos S.A.	</option>
<option value="4 -Banco Do Nordeste Do Brasil S.A.">	4 -Banco Do Nordeste Do Brasil S.A.	</option>
<option value="320 -China Construction Bank – Ccb Brasil S.A.">	320 -China Construction Bank – Ccb Brasil S.A.	</option>
<option value="189 -Hs Financeira">	189 -Hs Financeira	</option>
<option value="105 -Lecca Cfi S.A.">	105 -Lecca Cfi S.A.	</option>
<option value="76 -Banco KDB Brasil S.A.">	76 -Banco KDB Brasil S.A.	</option>
<option value="82 -Banco Topázio S.A.">	82 -Banco Topázio S.A.	</option>
<option value="286 -Cooperativa de Crédito Rural de De Ouro">	286 -Cooperativa de Crédito Rural de De Ouro	</option>
<option value="93 -PóloCred Scmepp Ltda">	93 -PóloCred Scmepp Ltda	</option>
<option value="273 -Ccr De São Miguel Do Oeste">	273 -Ccr De São Miguel Do Oeste	</option>
<option value="157 -Icap Do Brasil Ctvm Ltda">	157 -Icap Do Brasil Ctvm Ltda	</option>
<option value="183 -Socred S.A.">	183 -Socred S.A.	</option>
<option value="14 -Natixis Brasil S.A.">	14 -Natixis Brasil S.A.	</option>
<option value="130 -Caruana Scfi">	130 -Caruana Scfi	</option>
<option value="127 -Codepe Cvc S.A.">	127 -Codepe Cvc S.A.	</option>
<option value="79 -Banco Original Do Agronegócio S.A.">	79 -Banco Original Do Agronegócio S.A.	</option>
<option value="81 -Bbn Banco Brasileiro De Negocios S.A.">	81 -Bbn Banco Brasileiro De Negocios S.A.	</option>
<option value="118 -Standard Chartered Bi S.A.">	118 -Standard Chartered Bi S.A.	</option>
<option value="133 -Cresol Confederação">	133 -Cresol Confederação	</option>
<option value="121 -Banco Agibank S.A.">	121 -Banco Agibank S.A.	</option>
<option value="83 -Banco Da China Brasil S.A.">	83 -Banco Da China Brasil S.A.	</option>
<option value="138 -Get Money Cc Ltda">	138 -Get Money Cc Ltda	</option>
<option value="24 -Banco Bandepe S.A.">	24 -Banco Bandepe S.A.	</option>
<option value="95 -Banco Confidence De Câmbio S.A.">	95 -Banco Confidence De Câmbio S.A.	</option>
<option value="94 -Banco Finaxis">	94 -Banco Finaxis	</option>
<option value="276 -Senff S.A.">	276 -Senff S.A.	</option>
<option value="137 -Multimoney Cc Ltda">	137 -Multimoney Cc Ltda	</option>
<option value="92 -BRK S.A.">	92 -BRK S.A.	</option>
<option value="47 -Banco do Estado de Sergipe S.A.">	47 -Banco do Estado de Sergipe S.A.	</option>
<option value="144 -Bexs Banco De Cambio S.A.">	144 -Bexs Banco De Cambio S.A.	</option>
<option value="126 -BR Partners Banco de Investimento S.A.">	126 -BR Partners Banco de Investimento S.A.	</option>
<option value="301 -BPP Instituição De Pagamentos S.A.">	301 -BPP Instituição De Pagamentos S.A.	</option>
<option value="173 -BRL Trust Dtvm Sa">	173 -BRL Trust Dtvm Sa	</option>
<option value="119 -Banco Western Union do Brasil S.A.">	119 -Banco Western Union do Brasil S.A.	</option>
<option value="254 -Paraná Banco S.A.">	254 -Paraná Banco S.A.	</option>
<option value="268 -Barigui Companhia Hipotecária">	268 -Barigui Companhia Hipotecária	</option>
<option value="107 -Banco Bocom BBM S.A.">	107 -Banco Bocom BBM S.A.	</option>
<option value="412 -Banco Capital S.A.">	412 -Banco Capital S.A.	</option>
<option value="124 -Banco Woori Bank Do Brasil S.A.">	124 -Banco Woori Bank Do Brasil S.A.	</option>
<option value="149 -Facta S.A. Cfi">	149 -Facta S.A. Cfi	</option>
<option value="197 -Stone Pagamentos S.A.">	197 -Stone Pagamentos S.A.	</option>
<option value="142 -Broker Brasil Cc Ltda">	142 -Broker Brasil Cc Ltda	</option>
<option value="389 -Banco Mercantil Do Brasil S.A.">	389 -Banco Mercantil Do Brasil S.A.	</option>
<option value="184 -Banco Itaú BBA S.A.">	184 -Banco Itaú BBA S.A.	</option>
<option value="634 -Banco Triangulo S.A (Banco Triângulo)">	634 -Banco Triangulo S.A (Banco Triângulo)	</option>
<option value="545 -Senso Ccvm S.A.">	545 -Senso Ccvm S.A.	</option>
<option value="132 -ICBC do Brasil Bm S.A.">	132 -ICBC do Brasil Bm S.A.	</option>
<option value="298 -Vip’s Cc Ltda">	298 -Vip’s Cc Ltda	</option>
<option value="129 -UBS Brasil Bi S.A.">	129 -UBS Brasil Bi S.A.	</option>
<option value="128 -Ms Bank S.A Banco De Câmbio">	128 -Ms Bank S.A Banco De Câmbio	</option>
<option value="194 -Parmetal Dtvm Ltda">	194 -Parmetal Dtvm Ltda	</option>
<option value="310 -VORTX Dtvm Ltda">	310 -VORTX Dtvm Ltda	</option>
<option value="163 -Commerzbank Brasil S.A Banco Múltiplo">	163 -Commerzbank Brasil S.A Banco Múltiplo	</option>
<option value="280 -Avista S.A.">	280 -Avista S.A.	</option>
<option value="146 -Guitta Cc Ltda">	146 -Guitta Cc Ltda	</option>
<option value="279 -Ccr De Primavera Do Leste">	279 -Ccr De Primavera Do Leste	</option>
<option value="182 -Dacasa Financeira S/A">	182 -Dacasa Financeira S/A	</option>
<option value="278 -Genial Investimentos Cvm S.A.">	278 -Genial Investimentos Cvm S.A.	</option>
<option value="271 -Ib Cctvm Ltda">	271 -Ib Cctvm Ltda	</option>
<option value="21 -Banco Banestes S.A.">	21 -Banco Banestes S.A.	</option>
<option value="246 -Banco Abc Brasil S.A.">	246 -Banco Abc Brasil S.A.	</option>
<option value="751 -Scotiabank Brasil">	751 -Scotiabank Brasil	</option>
<option value="208 -Banco BTG Pactual S.A.">	208 -Banco BTG Pactual S.A.	</option>
<option value="746 -Banco Modal S.A.">	746 -Banco Modal S.A.	</option>
<option value="241 -Banco Classico S.A.">	241 -Banco Classico S.A.	</option>
<option value="612 -Banco Guanabara S.A.">	612 -Banco Guanabara S.A.	</option>
<option value="604 -Banco Industrial Do Brasil S.A.">	604 -Banco Industrial Do Brasil S.A.	</option>
<option value="505 -Banco Credit Suisse (Brl) S.A.">	505 -Banco Credit Suisse (Brl) S.A.	</option>
<option value="196 -Banco Fair Cc S.A.">	196 -Banco Fair Cc S.A.	</option>
<option value="300 -Banco La Nacion Argentina">	300 -Banco La Nacion Argentina	</option>
<option value="477 -Citibank N.A.">	477 -Citibank N.A.	</option>
<option value="266 -Banco Cedula S.A.">	266 -Banco Cedula S.A.	</option>
<option value="122 -Banco Bradesco BERJ S.A.">	122 -Banco Bradesco BERJ S.A.	</option>
<option value="376 -Banco J.P. Morgan S.A.">	376 -Banco J.P. Morgan S.A.	</option>
<option value="473 -Banco Caixa Geral Brasil S.A.">	473 -Banco Caixa Geral Brasil S.A.	</option>
<option value="745 -Banco Citibank S.A.">	745 -Banco Citibank S.A.	</option>
<option value="120 -Banco Rodobens S.A.">	120 -Banco Rodobens S.A.	</option>
<option value="265 -Banco Fator S.A.">	265 -Banco Fator S.A.	</option>
<option value="7 -BNDES (Banco Nacional Do Desenvolvimento Social)">	7 -BNDES (Banco Nacional Do Desenvolvimento Social)	</option>
<option value="188 -Ativa S.A Investimentos">	188 -Ativa S.A Investimentos	</option>
<option value="134 -BGC Liquidez Dtvm Ltda">	134 -BGC Liquidez Dtvm Ltda	</option>
<option value="641 -Banco Alvorada S.A.">	641 -Banco Alvorada S.A.	</option>
<option value="29 -Banco Itaú Consignado S.A.">	29 -Banco Itaú Consignado S.A.	</option>
<option value="243 -Banco Máxima S.A.">	243 -Banco Máxima S.A.	</option>
<option value="78 -Haitong Bi Do Brasil S.A.">	78 -Haitong Bi Do Brasil S.A.	</option>
<option value="111 -Banco Oliveira Trust Dtvm S.A.">	111 -Banco Oliveira Trust Dtvm S.A.	</option>
<option value="17 -Bny Mellon Banco S.A.">	17 -Bny Mellon Banco S.A.	</option>
<option value="174 -Pernambucanas Financ S.A.">	174 -Pernambucanas Financ S.A.	</option>
<option value="495 -La Provincia Buenos Aires Banco">	495 -La Provincia Buenos Aires Banco	</option>
<option value="125 -Brasil Plural S.A Banco">	125 -Brasil Plural S.A Banco	</option>
<option value="488 -Jpmorgan Chase Bank">	488 -Jpmorgan Chase Bank	</option>
<option value="65 -Banco Andbank S.A.">	65 -Banco Andbank S.A.	</option>
<option value="492 -Ing Bank N.V.">	492 -Ing Bank N.V.	</option>
<option value="250 -Banco Bcv">	250 -Banco Bcv	</option>
<option value="145 -Levycam Ccv Ltda">	145 -Levycam Ccv Ltda	</option>
<option value="494 -Banco Rep Oriental Uruguay">	494 -Banco Rep Oriental Uruguay	</option>
<option value="253 -Bexs Cc S.A.">	253 -Bexs Cc S.A.	</option>
<option value="269 -Hsbc Banco De Investimento">	269 -Hsbc Banco De Investimento	</option>
<option value="213 -Bco Arbi S.A.">	213 -Bco Arbi S.A.	</option>
<option value="139 -Intesa Sanpaolo Brasil S.A.">	139 -Intesa Sanpaolo Brasil S.A.	</option>
<option value="18 -Banco Tricury S.A.">	18 -Banco Tricury S.A.	</option>
<option value="630 -Banco Intercap S.A.">	630 -Banco Intercap S.A.	</option>
<option value="224 -Banco Fibra S.A.">	224 -Banco Fibra S.A.	</option>
<option value="600 -Banco Luso Brasileiro S.A.">	600 -Banco Luso Brasileiro S.A.	</option>
<option value="623 -Banco Pan S.A.">	623 -Banco Pan S.A.	</option>
<option value="204 -Banco Bradesco Cartoes S.A.">	204 -Banco Bradesco Cartoes S.A.	</option>
<option value="479 -Banco ItauBank S.A.">	479 -Banco ItauBank S.A.	</option>
<option value="456 -Banco MUFG Brasil S.A.">	456 -Banco MUFG Brasil S.A.	</option>
<option value="464 -Banco Sumitomo Mitsui Brasil S.A.">	464 -Banco Sumitomo Mitsui Brasil S.A.	</option>
<option value="613 -Omni Banco S.A.">	613 -Omni Banco S.A.	</option>
<option value="652 -Itaú Unibanco Holding Bm S.A.">	652 -Itaú Unibanco Holding Bm S.A.	</option>
<option value="653 -Banco Indusval S.A.">	653 -Banco Indusval S.A.	</option>
<option value="69 -Banco Crefisa S.A.">	69 -Banco Crefisa S.A.	</option>
<option value="370 -Banco Mizuho S.A.">	370 -Banco Mizuho S.A.	</option>
<option value="249 -Banco Investcred Unibanco S.A.">	249 -Banco Investcred Unibanco S.A.	</option>
<option value="318 -Banco BMG S.A.">	318 -Banco BMG S.A.	</option>
<option value="626 -Banco Ficsa S.A.">	626 -Banco Ficsa S.A.	</option>
<option value="270 -Sagitur Cc Ltda">	270 -Sagitur Cc Ltda	</option>
<option value="366 -Banco Societe Generale Brasil">	366 -Banco Societe Generale Brasil	</option>
<option value="113 -Magliano S.A.">	113 -Magliano S.A.	</option>
<option value="131 -Tullett Prebon Brasil Cvc Ltda">	131 -Tullett Prebon Brasil Cvc Ltda	</option>
<option value="11 -C.Suisse Hedging-Griffo Cv S.A (Credit Suisse)">	11 -C.Suisse Hedging-Griffo Cv S.A (Credit Suisse)	</option>
<option value="611 -Banco Paulista">	611 -Banco Paulista	</option>
<option value="755 -Bofa Merrill Lynch Bm S.A.">	755 -Bofa Merrill Lynch Bm S.A.	</option>
<option value="89 -Ccr Reg Mogiana">	89 -Ccr Reg Mogiana	</option>
<option value="643 -Banco Pine S.A.">	643 -Banco Pine S.A.	</option>
<option value="140 -Easynvest – Título Cv S.A.">	140 -Easynvest – Título Cv S.A.	</option>
<option value="707 -Banco Daycoval S.A.">	707 -Banco Daycoval S.A.	</option>
<option value="288 -Carol Dtvm Ltda">	288 -Carol Dtvm Ltda	</option>
<option value="101 -Renascença Dtvm Ltda">	101 -Renascença Dtvm Ltda	</option>
<option value="487 -Deutsche Bank S.A (Banco Alemão)">	487 -Deutsche Bank S.A (Banco Alemão)	</option>
<option value="233 -Banco Cifra S.A.">	233 -Banco Cifra S.A.	</option>
<option value="177 -Guide Investimentos S.A. Corretora de Valores">	177 -Guide Investimentos S.A. Corretora de Valores	</option>
<option value="633 -Banco Rendimento S.A.">	633 -Banco Rendimento S.A.	</option>
<option value="218 -Banco Bs2 S.A.">	218 -Banco Bs2 S.A.	</option>
<option value="292 -BS2 Distribuidora De Títulos E Investimentos">	292 -BS2 Distribuidora De Títulos E Investimentos	</option>
<option value="169 -Banco Olé Bonsucesso Consignado S.A.">	169 -Banco Olé Bonsucesso Consignado S.A.	</option>
<option value="293 -Lastro Rdv Dtvm Ltda">	293 -Lastro Rdv Dtvm Ltda	</option>
<option value="285 -Frente Cc Ltda">	285 -Frente Cc Ltda	</option>
<option value="80 -B&T Cc Ltda">	80 -B&T Cc Ltda	</option>
<option value="753 -Novo Banco Continental S.A Bm">	753 -Novo Banco Continental S.A Bm	</option>
<option value="222 -Banco Crédit Agricole Br S.A.">	222 -Banco Crédit Agricole Br S.A.	</option>
<option value="754 -Banco Sistema S.A.">	754 -Banco Sistema S.A.	</option>
<option value="98 -Credialiança Ccr">	98 -Credialiança Ccr	</option>
<option value="610 -Banco VR S.A.">	610 -Banco VR S.A.	</option>
<option value="712 -Banco Ourinvest S.A.">	712 -Banco Ourinvest S.A.	</option>
<option value="10 -CREDICOAMO CRÉDITO RURAL COOPERATIVA">	10 -CREDICOAMO CRÉDITO RURAL COOPERATIVA	</option>
<option value="283 -RB Capital Investimentos Dtvm Ltda">	283 -RB Capital Investimentos Dtvm Ltda	</option>
<option value="217 -Banco John Deere S.A.">	217 -Banco John Deere S.A.	</option>
<option value="117 -Advanced Cc Ltda">	117 -Advanced Cc Ltda	</option>
<option value="336 -Banco C6 S.A – C6 Bank">	336 -Banco C6 S.A – C6 Bank	</option>
<option value="654 -Banco A.J. Renner S.A.">	654 -Banco A.J. Renner S.A.	</option>
<option value="n/a -Banco Central do Brasil – Selic">	n/a -Banco Central do Brasil – Selic	</option>
<option value="n/a -Banco Central do Brasil">	n/a -Banco Central do Brasil	</option>
<option value="272 -AGK Corretora de Câmbio S.A.">	272 -AGK Corretora de Câmbio S.A.	</option>
<option value="n/a -Secretaria do Tesouro Nacional – STN">	n/a -Secretaria do Tesouro Nacional – STN	</option>
<option value="330 -Banco Bari de Investimentos e Financiamentos S.A.">	330 -Banco Bari de Investimentos e Financiamentos S.A.	</option>
<option value="362 -CIELO S.A.">	362 -CIELO S.A.	</option>
<option value="322 -Cooperativa de Crédito Rural de Abelardo Luz – Sulcredi/Crediluz">	322 -Cooperativa de Crédito Rural de Abelardo Luz – Sulcredi/Crediluz	</option>
<option value="350 -Cooperativa De Crédito Rural De Pequenos Agricultores E Da Reforma Agrária Do Ce">	350 -Cooperativa De Crédito Rural De Pequenos Agricultores E Da Reforma Agrária Do Ce	</option>
<option value="91 -Central De Cooperativas De Economia E Crédito Mútuo Do Estado Do Rio Grande Do S">	91 -Central De Cooperativas De Economia E Crédito Mútuo Do Estado Do Rio Grande Do S	</option>
<option value="379 -COOPERFORTE – Cooperativa De Economia E Crédito Mútuo Dos Funcionários De Instit">	379 -COOPERFORTE – Cooperativa De Economia E Crédito Mútuo Dos Funcionários De Instit	</option>
<option value="378 -BBC LEASING S.A. – Arrendamento Mercantil">	378 -BBC LEASING S.A. – Arrendamento Mercantil	</option>
<option value="360 -TRINUS Capital Distribuidora De Títulos E Valores Mobiliários S.A.">	360 -TRINUS Capital Distribuidora De Títulos E Valores Mobiliários S.A.	</option>
<option value="84 -UNIPRIME NORTE DO PARANÁ – COOPERATIVA DE CRÉDITO LTDA">	84 -UNIPRIME NORTE DO PARANÁ – COOPERATIVA DE CRÉDITO LTDA	</option>
<option value="n/a -Câmara Interbancária de Pagamentos – CIP – LDL">	n/a -Câmara Interbancária de Pagamentos – CIP – LDL	</option>
<option value="387 -Banco Toyota do Brasil S.A.">	387 -Banco Toyota do Brasil S.A.	</option>
<option value="326 -PARATI – CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.">	326 -PARATI – CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.	</option>
<option value="315 -PI Distribuidora de Títulos e Valores Mobiliários S.A.">	315 -PI Distribuidora de Títulos e Valores Mobiliários S.A.	</option>
<option value="307 -Terra Investimentos Distribuidora de Títulos e Valores Mobiliários Ltda.">	307 -Terra Investimentos Distribuidora de Títulos e Valores Mobiliários Ltda.	</option>
<option value="296 -VISION S.A. CORRETORA DE CAMBIO">	296 -VISION S.A. CORRETORA DE CAMBIO	</option>
<option value="382 -FIDÚCIA SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE L">	382 -FIDÚCIA SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE L	</option>
<option value="97 -Credisis – Central de Cooperativas de Crédito Ltda.">	97 -Credisis – Central de Cooperativas de Crédito Ltda.	</option>
<option value="16 -COOPERATIVA DE CRÉDITO MÚTUO DOS DESPACHANTES DE TRÂNSITO DE SANTA CATARINA E RI">	16 -COOPERATIVA DE CRÉDITO MÚTUO DOS DESPACHANTES DE TRÂNSITO DE SANTA CATARINA E RI	</option>
<option value="299 -SOROCRED CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.">	299 -SOROCRED CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.	</option>
<option value="359 -ZEMA CRÉDITO, FINANCIAMENTO E INVESTIMENTO S/A">	359 -ZEMA CRÉDITO, FINANCIAMENTO E INVESTIMENTO S/A	</option>
<option value="391 -COOPERATIVA DE CRÉDITO RURAL DE IBIAM – SULCREDI/IBIAM">	391 -COOPERATIVA DE CRÉDITO RURAL DE IBIAM – SULCREDI/IBIAM	</option>
<option value="368 -Banco CSF S.A.">	368 -Banco CSF S.A.	</option>
<option value="259 -MONEYCORP BANCO DE CÂMBIO S.A.">	259 -MONEYCORP BANCO DE CÂMBIO S.A.	</option>
<option value="364 -GERENCIANET S.A.">	364 -GERENCIANET S.A.	</option>
<option value="14 -STATE STREET BRASIL S.A. – BANCO COMERCIAL">	14 -STATE STREET BRASIL S.A. – BANCO COMERCIAL	</option>
<option value="81 -Banco Seguro S.A.">	81 -Banco Seguro S.A.	</option>
<option value="384 -GLOBAL FINANÇAS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO">	384 -GLOBAL FINANÇAS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO	</option>
<option value="88 -BANCO RANDON S.A.">	88 -BANCO RANDON S.A.	</option>
<option value="319 -OM DISTRIBUIDORA DE TÍTULOS E VALORES MOBILIÁRIOS LTDA">	319 -OM DISTRIBUIDORA DE TÍTULOS E VALORES MOBILIÁRIOS LTDA	</option>
<option value="274 -MONEY PLUS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E A EMPRESA DE PEQUENO PORT">	274 -MONEY PLUS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E A EMPRESA DE PEQUENO PORT	</option>
<option value="95 -Travelex Banco de Câmbio S.A.">	95 -Travelex Banco de Câmbio S.A.	</option>
<option value="332 -Acesso Soluções de Pagamento S.A.">	332 -Acesso Soluções de Pagamento S.A.	</option>
<option value="325 -Órama Distribuidora de Títulos e Valores Mobiliários S.A.">	325 -Órama Distribuidora de Títulos e Valores Mobiliários S.A.	</option>
<option value="331 -Fram Capital Distribuidora de Títulos e Valores Mobiliários S.A.">	331 -Fram Capital Distribuidora de Títulos e Valores Mobiliários S.A.	</option>
<option value="396 -HUB PAGAMENTOS S.A.">	396 -HUB PAGAMENTOS S.A.	</option>
<option value="309 -CAMBIONET CORRETORA DE CÂMBIO LTDA.">	309 -CAMBIONET CORRETORA DE CÂMBIO LTDA.	</option>
<option value="313 -AMAZÔNIA CORRETORA DE CÂMBIO LTDA.">	313 -AMAZÔNIA CORRETORA DE CÂMBIO LTDA.	</option>
<option value="377 -MS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE LTDA">	377 -MS SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE LTDA	</option>
<option value="321 -CREFAZ SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E A EMPRESA DE PEQUENO PORTE LT">	321 -CREFAZ SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E A EMPRESA DE PEQUENO PORTE LT	</option>
<option value="383 -BOLETOBANCÁRIO.COM TECNOLOGIA DE PAGAMENTOS LTDA.">	383 -BOLETOBANCÁRIO.COM TECNOLOGIA DE PAGAMENTOS LTDA.	</option>
<option value="324 -CARTOS SOCIEDADE DE CRÉDITO DIRETO S.A.">	324 -CARTOS SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="380 -PICPAY SERVICOS S.A.">	380 -PICPAY SERVICOS S.A.	</option>
<option value="343 -FFA SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE LTDA.">	343 -FFA SOCIEDADE DE CRÉDITO AO MICROEMPREENDEDOR E À EMPRESA DE PEQUENO PORTE LTDA.	</option>
<option value="349 -AL5 S.A. CRÉDITO, FINANCIAMENTO E INVESTIMENTO">	349 -AL5 S.A. CRÉDITO, FINANCIAMENTO E INVESTIMENTO	</option>
<option value="374 -REALIZE CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.">	374 -REALIZE CRÉDITO, FINANCIAMENTO E INVESTIMENTO S.A.	</option>
<option value="n/a -B3 SA – Brasil, Bolsa, Balcão – Segmento Cetip UTVM">	n/a -B3 SA – Brasil, Bolsa, Balcão – Segmento Cetip UTVM	</option>
<option value="n/a -Câmara Interbancária de Pagamentos – CIP C3">	n/a -Câmara Interbancária de Pagamentos – CIP C3	</option>
<option value="352 -TORO CORRETORA DE TÍTULOS E VALORES MOBILIÁRIOS LTDA">	352 -TORO CORRETORA DE TÍTULOS E VALORES MOBILIÁRIOS LTDA	</option>
<option value="329 -QI Sociedade de Crédito Direto S.A.">	329 -QI Sociedade de Crédito Direto S.A.	</option>
<option value="342 -Creditas Sociedade de Crédito Direto S.A.">	342 -Creditas Sociedade de Crédito Direto S.A.	</option>
<option value="397 -LISTO SOCIEDADE DE CRÉDITO DIRETO S.A.">	397 -LISTO SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="355 -ÓTIMO SOCIEDADE DE CRÉDITO DIRETO S.A.">	355 -ÓTIMO SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="367 -VITREO DISTRIBUIDORA DE TÍTULOS E VALORES MOBILIÁRIOS S.A.">	367 -VITREO DISTRIBUIDORA DE TÍTULOS E VALORES MOBILIÁRIOS S.A.	</option>
<option value="373 -UP.P SOCIEDADE DE EMPRÉSTIMO ENTRE PESSOAS S.A.">	373 -UP.P SOCIEDADE DE EMPRÉSTIMO ENTRE PESSOAS S.A.	</option>
<option value="408 -BÔNUSCRED SOCIEDADE DE CRÉDITO DIRETO S.A.">	408 -BÔNUSCRED SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="404 -SUMUP SOCIEDADE DE CRÉDITO DIRETO S.A.">	404 -SUMUP SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="403 -CORA SOCIEDADE DE CRÉDITO DIRETO S.A.">	403 -CORA SOCIEDADE DE CRÉDITO DIRETO S.A.	</option>
<option value="306 -PORTOPAR DISTRIBUIDORA DE TITULOS E VALORES MOBILIARIOS LTDA.">	306 -PORTOPAR DISTRIBUIDORA DE TITULOS E VALORES MOBILIARIOS LTDA.	</option>
<option value="174 -PEFISA S.A. – CRÉDITO, FINANCIAMENTO E INVESTIMENTO">	174 -PEFISA S.A. – CRÉDITO, FINANCIAMENTO E INVESTIMENTO	</option>
<option value="354 -NECTON INVESTIMENTOS S.A. CORRETORA DE VALORES MOBILIÁRIOS E COMMODITIES">	354 -NECTON INVESTIMENTOS S.A. CORRETORA DE VALORES MOBILIÁRIOS E COMMODITIES	</option>
<option value="n/a -BMF Bovespa S.A. – Bolsa de Valores, Mercadorias e Futuros – Camara BMFBOVESPA">	n/a -BMF Bovespa S.A. – Bolsa de Valores, Mercadorias e Futuros – Camara BMFBOVESPA	</option>
<option value="630 -Banco Smartbank S.A.">	630 -Banco Smartbank S.A.	</option>
<option value="393 -Banco Volkswagen S.A.">	393 -Banco Volkswagen S.A.	</option>
<option value="390 -BANCO GM S.A.">	390 -BANCO GM S.A.	</option>
<option value="381 -BANCO MERCEDES-BENZ DO BRASIL S.A.">	381 -BANCO MERCEDES-BENZ DO BRASIL S.A.	</option>
<option value="626 -BANCO C6 CONSIGNADO S.A.">	626 -BANCO C6 CONSIGNADO S.A.	</option>
<option value="755 -Bank of America Merrill Lynch Banco Múltiplo S.A.">	755 -Bank of America Merrill Lynch Banco Múltiplo S.A.	</option>
<option value="89 -CREDISAN COOPERATIVA DE CRÉDITO">	89 -CREDISAN COOPERATIVA DE CRÉDITO	</option>
<option value="363 -SOCOPA SOCIEDADE CORRETORA PAULISTA S.A.">	363 -SOCOPA SOCIEDADE CORRETORA PAULISTA S.A.	</option>
<option value="365 -SOLIDUS S.A. CORRETORA DE CAMBIO E VALORES MOBILIARIOS">	365 -SOLIDUS S.A. CORRETORA DE CAMBIO E VALORES MOBILIARIOS	</option>
<option value="281 -Cooperativa de Crédito Rural Coopavel">	281 -Cooperativa de Crédito Rural Coopavel	</option>
<option value="654 -BANCO DIGIMAIS S.A.">	654 -BANCO DIGIMAIS S.A.	</option>
<option value="371 -WARREN CORRETORA DE VALORES MOBILIÁRIOS E CÂMBIO LTDA.">	371 -WARREN CORRETORA DE VALORES MOBILIÁRIOS E CÂMBIO LTDA.	</option>
<option value="289 -DECYSEO CORRETORA DE CAMBIO LTDA.">	289 -DECYSEO CORRETORA DE CAMBIO LTDA.	</option>
    </select>
    <br />
    
       <label>Agência</label>
     <input type="text"  id="agencia" name="agencia" placeholder="Digite sua Agência sem pontos." maxlength="4" class="form-control" />

     <br />
    
       <label>Conta Bancaria</label>
     <input type="text"  id="conta" name="conta" maxlength="6" placeholder="Digite sua Conta sem pontos." class="form-control" />
     <br />  
    
    <label>PIX - CPF | E-mail | Telefône</label>
    <input type="text" id="cpf_conta" name="cpf_conta" maxlength="22" placeholder="Digite seu CPF sem os pontos." class="form-control" />
     <br />
     <div id="success"></div>
     <div class="modal-footer">
     <center>  <input name="SendCadCont"  type="submit" class="btn btn-success btn-lg btn-cadastrar" value="Cadastrar o Cliente">
     </center>  
</div>
  
    
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center></center></h4>
   </div>
   <div class="modal-body" id="employee_table">
   
   
    
   </div>
   <div class="modal-footer">
   </div>
  </div>
 </div>
</div>

<script>  

 $(document).on('click', '.employee_detail', function(){
  //$('#dataModal').modal();
  var nome = $(this).attr("nome");
  $.ajax({
   url:"select_conta.php",
   method:"POST",
   data:{nome:nome},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
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