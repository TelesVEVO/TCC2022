<!doctype html>
<html lang="pt-br">
<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssLogin.css" media="screen" />
</head>
<body class="bg-dark">
  <?php
     if(!isset($_SESSION)) {
      session_start();
  }
    include('conexao.php');     
  
  ?>
  

  <?php
    if (isset($_POST["boto"]))
    {    
      $email = $_POST['login'];
      $senha = $_POST['senha'];
      
      $query = "SELECT email FROM cadastro WHERE email = '$email' AND senha = '$senha'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_num_rows($result);
      if($row == 1) 
      {
        $_SESSION['usuario'] = $email;
        header('Location: receitas.php');
        exit();
      } 
    }      
    ?>
    <div class="col-md-4 offset-md-4 text-center pt-5 "> 
      <form method="post">
        <div class="mb-3 px-5 ">
          <label for="" class="form-label text-white w-25">Login</label>
          <input type="text" class="form-control encontre" name="login" id="login" placeholder="Ex: SeuEmail@email.com" required>
        </div>
        <div class="mb-3 px-5 ">
          <label for="" class="form-label text-white w-25">Senha</label>
          <input type="password" class="form-control encontre" name="senha" id="senha"placeholder="" required>
        </div>
      <?php
      if (isset($_POST["boto"])){
        if($row != 1){
       $_SESSION['nao_autenticado'] = true;
        echo "<div>
          <p class='text-danger'><strong>Falha no Login, Verifique se o login ou a senha estão corretos.</strong></p>
        </div>";
        }
      }
      ?>
      </div>
            <br>
            <input type="submit" value="Login" name="boto" id="boto" class="botao">
      <div class="col-md-4 offset-md-4 text-center">
        <div class="mb-3 px-5"> <a class="nav-item nav-link active text-white" href="registrar.php">Registrar</a></div>
        </form> 
        <img class="base" src="imagem/logofood.jpg">
      </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>