<?php
include 'conexaoBanco.php';
//Para salvar os dados da aula no banco de dados
if(isset($_POST['Agendar'])){
    $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    $paga = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
    $carro = filter_input(INPUT_POST, 'carro', FILTER_SANITIZE_STRING);

   // if(strlen($_POST['instrutor']) || strlen($_POST['cpf']) || strlen($_POST['aluno']) || strlen($_POST['data']) || strlen($_POST['hora']) || strlen($_POST['paga']) || strlen($_POST['carro']) ===0){
   //     echo"<script> alert('Um dos campos esta vazio')</script>";
   // }else{
        $salvar = $conexao->prepare("INSERT INTO `aula`(`data`,`hora`,`instrutor`,`aluno`,`veiculo`,`pago`,`cpf`)VALUES(?,?,?,?,?,?,?)");
        $salvar->bind_param("??????", $data, $hora, $instrutor, $aluno, $veiculo, $pago, $cpf);

  //  }
}
?>