<?php
include 'conexaoBanco.php';
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

$salvar = "INSERT INTO `mesagem`(`nome`,`assunto`,`mensagem`,`email`)VALUES('$nome', '$assunto','$mensagem','$email')";

$resultado = mysqli_query($conexao,$salvar);

if($resultado){
    echo"<script>
    window.location.href = '../Contato.html?status=success';
    </script>";
}else{
    echo"<script>
    window.location.href = '../Contato.html?status=error';
    </script>";
}
?>