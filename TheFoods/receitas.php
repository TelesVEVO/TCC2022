<!doctype html>
<html lang="pt-BR">
  <head>
    <title>The Food's</title>

<?php
  session_start();   
  include('conexao.php'); 
?>


<?php
  if(isset($_REQUEST["idAlt"]))
  {
    $idAlt = $_REQUEST["idAlt"];

    setcookie("Historico[$idAlt]", $idAlt, time()+60*60*24*30);
  }
?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <style>
        .fizreceita{
          background: rgb(189, 189, 189);
          border: #444;
          border-radius: 2px;
          text-transform: uppercase;
          padding: 5px 5px;
          text-decoration: none;
          color:#444;
        }
        
        .icone{
          height: 25px;
          width: 25px;
        }
        .icones{
          height: 18px;
          width: 18px; 
        }
        img{
          border-radius: 7px;
          height: 300px;
          width: 300px;
        }
        .cordefundo{
          background:rgb(86, 0, 18);
        }
        .fundo{
          background: #444;
        }
        
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssReceitas.css" media="screen" />
    
  </head>
  <body class="bg-dark text-white">
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<header>
<nav class="navbar navbar-expand-lg navbar-light cordefundo">
      <div class="container">
      <a class="navbar-brand text-white" href="index.php">
        <img src="imagem/iconehome.png" class="icone mb-2"></img>HOME
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item">
          <?php
            if(!isset($_SESSION['usuario'])){
              echo "<a class='nav-link active text-white' href='login.php' aria-current='page'>
               <img src='imagem/iconelogin.png' class='icone mb-2'></img>LOGIN<span class='visually-hidden'>(current)</span>
              </a>";
            }
          ?>
          </li>
          <li>
          <?php
          if(!isset($_SESSION['usuario'])){
              echo "<a class='nav-link active text-white' href='registrar.php' aria-current='page'>
               <img src='imagem/registrar.png' class='icone mb-2'></img>REGISTRAR<span class='visually-hidden'>(current)</span>
              </a>";
            }
          ?>
          </li>
        </ul>
        
    <?php
      if(isset($_SESSION['usuario'])){
        echo"
        <form class='d-flex my-2 my-lg-0'>
      
        <div class='btn-group dir'>
            <button class='btn btn-secondary dropdown-toggle' type='button' id='triggerId' data-bs-toggle='dropdown' aria-haspopup='true'
                aria-expanded='false'>
                MENU
            </button>
            <div class='dropdown-menu dropdown-menu-start' aria-labelledby='triggerId'>
            
            ";if (isset($_COOKIE['Historico'])) 
            {
              echo"<a class='dropdown-item' href='estatisticas.php'><img src=imagem/estatisticas11.png class='icones'> Estatisticas</img></a>";
            };
            echo"  
            
            <a class='dropdown-item' href='inserir.php'><img src=imagem/maotsetung.png class='icones'> Inserir Receita</img></a>
                     
          <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='sair.php'><img src=imagem/sair.png class='icones'> Sair</img></a>
          </div>

        </form>";
      }
    ?>
      </div>
    </div>
  </nav>
    
  </div>
</header>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class='container text-center fundo rounded-2 mt-4 text-capitalize'>
<h5> Pesquise Novamente </h5>
  <form method="post" name="form_busca">
  <input type="text" class="form-control encontre " name="busca" id="busca" placeholder="EX: BATATA QUEIJO FARINHA...">
  </form>
          <?php
                if(isset($_POST['busca']))
                {
                  $busca = $_POST["busca"]; 
                  $trimmed = rtrim($busca);
                  $_SESSION['busca'] = $trimmed;
                    {
                        header('Location:receitas.php');
                    }          
                }
?>
<br>
</div>
<?php   

  if(isset($_SESSION['busca']))
  {
    $limite = 30;
    $busca = $_SESSION["busca"];
    $busca_divida = explode(' ',$busca);
    $quant = count($busca_divida);

    for($i=0; $i<$quant; $i++)
    {
      $cont = $busca_divida[$i];
      $sql = mysqli_query($conn, "SELECT * FROM receitas WHERE ingredientes LIKE '%$cont%' LIMIT $limite");
    }             
    while($linha = mysqli_fetch_array($sql))
    {
      $id = $linha['idreceitas'];
      echo "<div class='container text-center fundo rounded-2 mt-4 text-capitalize'>
            <div class='row'>
              <div class='col-sm foto mt-2'>
               <img src=imagem/".$linha['imagem']."></img>
             </div>
                <div class='col-sm dados text-center mt-1'>
                  <h4>".$linha['nome']."</h4>
                  <p>&nbsp;<strong>TIPO:</strong> ".$linha['tipo']."</p>
                  <p>&nbsp;<strong> CALORIAS:</strong> ".$linha['calorias']."</p>
                  <p>&nbsp;<strong> CARBOIDRATOS:</strong> ".$linha['carboidrato']."</p>
                  <p>&nbsp;<strong> PROTEINAS:</strong> ".$linha['proteinas']."</p>
                  <p>&nbsp;<strong> GORDURAS:</strong> ".$linha['gorduras']."</p>
                  <p>&nbsp;<strong> INGREDIENTES:</strong> ".$linha['ingredientes']."</p>
                  &nbsp;<a class='fizreceita' href='receitas.php?idAlt=".$id."' onClick='window.location.reload()'>Ja fiz esta receita!</a>
                </div>
                  <div class='col-sm preparo text-center mt-1'>
                  <h4>Modo de preparo </h4>
                  
                  <p>".$linha['modo_preparo']."</p>
                </div>
                  </div>
              </div>";
      //echo "<a href='receitas.php?idAlt=".$id."'>Ja fiz esta receita</a>";
    }
    echo "<br><br><div class='text-danger text-center'><strong><p>Agora não há receitas :/</p></strong></div>";             
  }        
?> 
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
