<!doctype html>
<html lang="pt-br">
  <head>
    <title>The Foods Inserir</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssSite.css" media="screen" />
  <style>
  body{
    
    text-shadow: 5px 5px 8px black;
    
  }
    </style>
  </head>
  <body class="bg-dark">
      
  
  <?php
        session_start();
        include('conexao.php');
    ?>
<div class="col-md-8 offset-md-2 text-center">
  <h1 class="text-center text-white">Insira sua receita</h1>
	<form method="post" enctype="multipart/form-data">

    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Nome</label>
      <input type="text" class="form-control encontre" name="nome" id="nome" aria-describedby="helpId" placeholder="EX: Bolo de Cenoura, Torta de Abacaxi..." required>          
    </div>
        
    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Tipo</label>
      <input type="text" class="form-control encontre" name="tipo" id="tipo" aria-describedby="helpId" placeholder="EX: Salgado, Doce, Doce Amargo..." required>
    
    </div>
        
    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Carboidrato</label>
      <input type="number" class="form-control encontre" name="carboidrato" id="carboidrato" aria-describedby="helpId" placeholder="ex:20" required>
    </div>

    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Proteinas</label>
      <input type="number" class="form-control encontre" name="proteinas" id="proteinas" aria-describedby="helpId" placeholder="ex:10" required>
    </div>

    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Gorduras</label>
      <input type="number" class="form-control encontre" name="gorduras" id="gorduras" aria-describedby="helpId" placeholder="ex:8" requi red>
    </div>

    <div class="mb-3 px-5 ">
      <label for="" class="form-label text-white">Calorias</label>
      <input type="number" class="form-control encontre" name="calorias" id="calorias" aria-describedby="helpId" placeholder="220" re8quired>
    </div>

    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Imagem</label>
      <input type="file" class="form-control encontre" name="pic" accept="image/*" id="imagem" aria-describedby="helpId">
    </div>

    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Modo de preparo</label>
      <textarea class="form-control encontre" name="modo_preparo" id="modo_preparo" rows="3" placeholder="Bata no liquidificador os ovos, açúcar, margarina e depois adicione a farinha aos poucos. Por último o fermento, bata bem até ficar uma massa lisa sem bolinhas. 2 Na fôrma de bolo coloque o açúcar direto na fôrma e derreta até virar um caramelo. Espere esfriar, coloque o abacaxi que cortou e acrescente toda a massa e coloque para assar. No forno a 200°C asse por 50 minutos."></textarea required>
    </div>
    <div class="mb-3 px-5">
      <label for="" class="form-label text-white">Ingredientes</label>
      <textarea class="form-control encontre" name="ingredientes" id="ingredientes" rows="3" placeholder="2 xícaras de açúcar, 3 ovos inteiros, 2 colheres de (sopa) de margarina, 1 e 1/2 xícaras de farinha de trigo, 200 ml de leite ou 1 copo pequeno, 1 colher (sopa) de fermento para bolo."></textarea required>
    </div>
    <br>
</div>  
    <div class="mb-3 px-5"><input type="submit" value="gravar" name="gravar" id="gravar" class=" botao"></div>     
</form>
<div class="">
    <form method="post">
        <input type="submit" value="Voltar" name="boto" id="boto" class="botao">
    </form>
</div>
    <?php 
      if (isset($_POST["boto"])){
          header('Location:receitas.php');    
      } 
      try
      {
        $conexao = new PDO($dsn, $usuario, $senha);      
        if(isset($_POST["gravar"]))
        {
          if(isset($_FILES['pic']))
          {
            $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './imagem/'; //Diretório para uploads 
            move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            echo("Imagem enviada com sucesso!");
          }

          $query = "insert into receitas (nome, tipo, ingredientes, modo_preparo, carboidrato, proteinas, gorduras, calorias, imagem) values (:nome, :tipo, :ingredientes, :modo_preparo, :carboidrato, :proteinas, :gorduras, :calorias, :imagem)";
                     
          $stmt = $conexao->prepare($query);
          $stmt->bindValue(':nome', $_POST['nome']);
          $stmt->bindValue(':tipo', $_POST['tipo']);
          $stmt->bindValue(':ingredientes', $_POST['ingredientes']);
          $stmt->bindValue(':modo_preparo', $_POST['modo_preparo']);
          $stmt->bindValue(':carboidrato', $_POST['carboidrato']);
          $stmt->bindValue(':proteinas', $_POST['proteinas']);
          $stmt->bindValue(':gorduras', $_POST['gorduras']);
          $stmt->bindValue(':calorias', $_POST['calorias']);
          $stmt->bindValue(':imagem', $new_name);
          
          $stmt->execute();

          $_lista = $stmt->fetch();
          header('Location: index.php'); 
          exit;
        }
         
      }
      catch(PDOException $e)
      {
        echo 'message' . $e->getMessage();
        echo '<br> Code: ' . $e->getCode();
      }
	  ?>
  
  <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>