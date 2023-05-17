<!doctype html>
<html lang="pt-BR">
  <head>
    <title>The Food's</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssSite.css" media="screen" />
  </head>
<style>
    body {
        
        text-shadow: 5px 5px 8px black
        }

    
    #div1{
        background-image: url(imagem/fundo11.jpg);
        background-repeat: no-repeat;
        background-size: 1920px 100%!important; 
    } 
    #div3{
        background-image: url(imagem/fundo11.jpg);
        background-repeat: no-repeat;
        background-size: 1920px 100%!important; 
    }
    .icone{
        height: 25px;
        width: 25px;
    }
</style>
 <body>

    <?php 
        session_start();
        include('conexao.php');     
    ?>

    <nav class="nav justify-content-center fixed-top bg-dark">
    <?php
          if(!isset($_SESSION['usuario'])){
              echo "<div><a class='nav-link text-white barradenav position-absolute start-0' href='login.php'>Login<img src='imagem/iconelogin.png' class='icone'></a></div>&nbsp&nbsp&nbsp&nbsp";
            }
          ?>
        
        <div><a class="nav-link text-white barradenav" href="#div1">Encontre sua receita</a></div>
        <div><a class="nav-link text-white barradenav" href="#div2">Principais receitas</a></div>
        <div><a class="nav-link text-white barradenav" href="#div3">O The Food's</a></div>
    </nav>

<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div id="div1" class="text-white posicao" style="height:900px">
        <div class="child mb-3 px-5">
            <form method="post" name="form_busca">
            <label for="" class="form-label text-white texto_index">"Nos conte seus ingredientes, então encontraremos a melhor receita para você"</label>
            <br><br>
                <input type="text" class="form-control encontre" name="busca" placeholder="EX: BATATA QUEIJO FARINHA...">
                <br>
                <input type="submit" class="botao" name="boto" value="Pesquisar">
            </form>  
            <?php
                if(isset($_POST['boto']))
                {
                    $busca = $_POST["busca"]; 
                    $trimmed = rtrim($busca);
                    $_SESSION['busca'] = $trimmed;
                    if($busca != "")
                    {
                        header('Location:receitas.php');
                    }          
                }
            ?>                        
            <a class="nav-item nav-link clique" href="paginaPrincipal.php"></a>
        </div>        
    </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->    
    <div id="div2" class="bg-dark text-white h-100">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="imagem/un11.jpg" class="w-100 d-block" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imagem/dois22.jpg" class="w-100 d-block" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imagem/tres333.jpg" class="w-100 d-block" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->        
    <div id="div3" class="text-white" style="height:900px">
            <br><br><br><br><br><br><br><br><br><br>
            <h2 class="px-5 text-center"> "Nossa Historia" </h2>
            <br><br>
            <h4 class="px-5 col-md-8 offset-md-2">Este é um projeto de TCC idealizado por um grupo de 4 alunos da ETEC. O objetivo do site The Food's é ajudar e melhorar a alimentação dos seus usuários através de receitas selecionadas de acordo com os ingredientes que temos em casa, disponibilizando receitas complexas ou de fácil preparo. Algumas iniciativas do site poderão evitar o consumo exagerado de fast-foods, o disperdício de comida e incentivar a culinária como forma de hobby.
            </h4>      
    </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->    






    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>
