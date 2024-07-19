<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da soma</title>
</head>
<body>
    <?php
    $num1 = $_POST['cpNum1'];
    $num2 = $_POST['cpNum2'];

    $resultado = $num1 +$num2;

    if($resultado >20){
        $resultado1 = $resultado+8;
        echo"o resultado da soma é: $resultado1";
    }
    else{

        echo"o resultado da soma é: ".($resultado-8).".";
    }
    ?>
</body>
</html>