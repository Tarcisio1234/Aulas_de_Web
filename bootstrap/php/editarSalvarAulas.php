<?php
include 'conexaoBanco.php';
//Para salvar os dados da aula no banco de dados
if(isset($_POST['Agendar'])){
    $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
    $veiculo = filter_input(INPUT_POST, 'veiculo', FILTER_SANITIZE_STRING);

        $salvar = $conexao->prepare("INSERT INTO `aula`(`data`,`hora`,`instrutor`,`aluno`,`veiculo`,`pago`,`cpf`)VALUES(?,?,?,?,?,?,?)");
        $salvar->bind_param("sssssss", $data, $hora, $instrutor, $aluno, $veiculo, $pago, $cpf);
        $salvar->execute();
        $salvar->close();
}
?>