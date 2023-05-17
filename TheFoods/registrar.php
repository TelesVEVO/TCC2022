<!DOCTYPE html>
<html lang="pt-br">
<head>  
	<title>Registrar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssLogin.css" media="screen" />
</head>
<body class="bg-dark">
    <?php
        include('conexao.php');     
        $conexao = new PDO($dsn, $usuario, $senha);
    ?>


    <div class="col-md-4 offset-md-4 text-center pt-5">    
        <form method="post">        
            <div class="mb-3 px-5 ">
                <label for="" class="form-label text-white w-50">Digite seu Nome</label>
                <input type="text" class="form-control encontre nome" name="nome" id="nome" placeholder="Ex: João Fontana" required>
            </div>
            
            <div class="mb-3 px-5 ">
                <label for="" class="form-label text-white w-50">Digite seu Email</label>
                <input type="text" class="form-control encontre email" name="email" id="email" placeholder="Ex: SeuEmail@email.com" required>
            </div>
            
            <div class="mb-3 px-5 ">
                <label for="" class="form-label text-white w-50">Digite sua Senha</label>
                <input type="password" class="form-control encontre senha" name="senha" id="senha" placeholder="" required>
            </div>
            
            <div class="mb-3 px-5 ">
                <label for="" class="form-label text-white w-50">Digite novamente</label>
                <input type="password" class="form-control encontre senha2" name="senha2" id="senha2" placeholder="" required>
            </div>
            <br>
        </div>
        <div class="mb-3 px-5"><input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar" class="botao espaco"></div>                            
    </form>
        
    

    <?php
    try
    {
        $query = 'select * from cadastro';
        $stm = $conexao->query($query);

        if(isset($_POST['cadastrar']))
        {
            $s1 = $_POST['senha'];
            $s2 = $_POST['senha2'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            while($linha = $stm->fetch(PDO::FETCH_OBJ))
            {
                $e = $linha->email;
                if($email == $e)
                {
                    echo "<div class='col-md-4 offset-md-4 text-center pb-3' >
                    <p class='text-danger'><strong> Email já cadastrado.</strong></p>
                    </div>";
                }
            }

            if($s1 == $s2)
            {
                $senha = $s1;
                $query = "insert into cadastro (nome, email, senha) values (?, ?, ?)";
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(1,$nome);
                $stmt->bindParam(2,$email);
                $stmt->bindParam(3,$senha);
                $stmt->execute();
            }
           
            else
            {
                echo "<div class='col-md-4 offset-md-4 text-center pb-3' >
                    <p class='text-danger'><strong> As Senhas não batem.</strong></p>
                </div>";
            }
            
            }
        }

    catch (PDOException $e)
    {
        echo 'Message: ' . $e->getMessage();
        echo '<br> Code: ' . $e->getCode();
    }


     if(isset($_POST['Voltar'])){
         header('Location: login.php');
     }
    ?>
    <form method="post">
        <div class="mb-3 px-5"><input type="submit" value="Voltar" name="Voltar" id="Voltar" class="botao espaco"></div>                            
    </form>
        
        <div class="base col-md-4 offset-md-4 text-center"><img src="imagem/logofood.jpg"></div>
</body>
<html>
