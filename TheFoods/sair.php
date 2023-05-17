<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sair</title>
</head>
<body>
    <?php
        if(!isset($_SESSION)) {
            session_start();
        }
        
        session_destroy();
        
        header("Location: index.php");
    ?>
</body>
</html>