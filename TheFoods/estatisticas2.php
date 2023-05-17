<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatisticas</title>
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cssSite.css" media="screen" />
    
    <style>
        .borda{
            
            border: 1px solid black;
            box-shadow: 3px 5px #888888;
        }
    </style>

    <?php
        if(!isset($_SESSION)) {
        session_start();
        }
        include('conexao.php');
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartTotal);
    google.chart.setOnLoadCallback(drawChartMedia);

    function drawChartTotal() {

    // Create the data table.
      var data = google.visualization.arrayToDataTable([
        ['MacroNutriente', 'Total', { role: 'style' } ],
        <?php
        if (isset($_COOKIE['Historico'])) 
        {
                $tcarb = 0;
                $tprot = 0;
                $tgod = 0;
                $tcal = 0;
                $i = 0;
        }
            foreach ($_COOKIE['Historico'] as $name => $value) 
            {
                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                //echo "$name : $value <br />\n";
                $sql = mysqli_query($conn, "SELECT carboidrato, proteinas, gorduras, calorias FROM receitas WHERE idreceitas = $value");
                
                $linha = mysqli_fetch_array($sql);
                $carb = $linha['carboidrato'];
                $prot = $linha['proteinas'];
                $god = $linha['gorduras'];
                $cal = $linha['calorias'];  

                $tcarb = $tcarb + $carb;
                $tprot = $tprot + $prot;
                $tgod = $tgod + $god;
                $tcal = $tcal + $cal;
                $i++;

                
            ?> 
        
        <?php }
            $mcarb = $tcarb/$i;
            $mprot = $tprot/$i;
            $mgod = $tgod/$i;
            $mcal = $tcal/$i;
        ?>
        ['Carboidratos',<?php echo $mcarb ?>, 'color: #FFA07A'],
        ['Proteinas',<?php echo $mprot ?>, 'color: #FA8072'],
        ['Gorduras',<?php echo $mgod ?>, 'color: #DC143C'],
        ['Calorias',<?php echo $mcal ?>, 'color: #8B0000'],
         
      ]);
      

// Set chart options
var options = {'title':'MEDIA DE MACRONUTRIENTES INGERIDOS NO MES',
               'width':1180,
               'height':600};

// Instantiate and draw our chart, passing in some options.
var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);
}

</script>


</head>
<body class="bg-dark">
<div class="mt-5">
    <form method="post">
        <input type="submit" value="Voltar" name="boto" id="boto" class="botao">
    </form>
</div>
    
    <?php
        if (isset($_POST["boto"])){
                header('Location:estatisticas.php');    
        } 

    ?>
    <div class="container">
    <div class="col-md-6">
        <div id="chart_div" class="mx-5"></div>
    </div>
</div>
        <br><br>
</body>
</html>