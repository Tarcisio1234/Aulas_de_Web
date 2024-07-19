<?php
$altura = $_GET['cpAltura'];
$sexo = $_GET['cpSexo'];
if($sexo =="Masculino"){
    $resultado= (72.7*$altura)-58;
    $formatado = number_format($resultado, 2);
    echo "
    <script>
    if(confirm('o peso ideal é: $formatado. deseja fazer uma nova tentativa ?')){
        location.reload();
    }
    else{
        window.location.href = '../index.html';
    }
    </script>";
}
else{
    $resultado= (62.1*$altura)-44.7;
    $formatado= number_format($resultado, 2);
    echo "
    <script>
    if(confirm('O peso ideal é: $formatado. Deseja fazer uma nova tentativa?')){
        location.reload();
    }
    else{
        window.location.href = '../index.html';
    }
    </script>";
}
?>