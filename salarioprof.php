<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Calculo salário professor</title>
</head>

<body>

    <form method="POST">

        
        <p> Valor por hora: <input name="valhrs" type="number" /> </p>
        <p> Horas mensais trabalhadas: <input name="mentrab" type="number" /> </p>

        <input type="submit" value="Calcular" name="btncalc" />

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<?php
if (isset($_POST['btncalc'])) {
   
    $INSS = 0;
    $novsal = 0;
    $salbru = 0;
    $valhrs = $_POST['valhrs'];
    $mentrab = $_POST['mentrab'];
    $calcular = $_POST['btncalc'];
   
    $salbru = $valhrs * $mentrab; 
    

    if ($salbru <= 1212){ //Desconto INSS
        $novsal = $salbru - ($salbru * 0.075);
    }else if ($salbru >= 1212.01 && $salbru <= 2427.35){
        $novsal = $salbru - ($salbru * 0.09);
    }else if ($salbru >= 2427.36 && $salbru <= 3641.03){
        $novsal = $salbru - ($salbru * 0.012);
    }else if ( $salbru > 3641.04){
        $novsal = $salbru - ($salbru * 0.014);
    }
    
    echo"<h4> Salário líquido de: ".number_format($novsal,2)." R$"."</h4>";
    

} 
   

?>
</html>