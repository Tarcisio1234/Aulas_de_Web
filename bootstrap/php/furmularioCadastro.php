<?php
include 'conexaoBanco.php';
$nome =filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$profissao =filter_input(INPUT_POST, 'profissao', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$endereco =filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$estado =filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$salvar = "INSERT INTO `cadastrocliente`(`nome`,`telefone`,`profissao`,`sexo`,`endereco`,`estado`,`cep`,`email`,`senha`)VALUES('$nome','$telefone','$profissao','$sexo','$endereco','$estado','$cep','$email','$senha')";

$resultado = mysqli_query($conexao,$salvar);

if($resultado){
    echo"<script>
    window.location.href = '../cadastroLuci.html?status=success';
    </script>";
}else{
    echo"<script>
    window.location.href = '../cadastroLuci.html?status=error';
    </script>";
}
?>