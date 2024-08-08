<?php
include 'conexaoBanco.php';

    $id = filter_input(INPUT_POST, 'idEditar', FILTER_SANITIZE_NUMBER_INT);
    $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    $pago = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
    $veiculo = filter_input(INPUT_POST, 'veiculo', FILTER_SANITIZE_STRING);

if(isset($_POST['Agendar'])){
// caso não possua ID na url ira agendar uma nova aula
        $salvar = $conexao->prepare("INSERT INTO `aula`(`data`,`hora`,`instrutor`,`aluno`,`veiculo`,`pago`,`cpf`)VALUES(?,?,?,?,?,?,?)");
        $salvar->bind_param("ssssssi", $data, $hora, $instrutor, $aluno, $veiculo, $pago, $cpf);
        $salvar->execute();
        
        if ($salvar->execute()){
            echo"<script>
            alert('Aula cadastrada com sucesso')
            window.location.href = '../cadastrarAula.php'
            </script>";
        }
        else{
            echo "Erro ao cadastrar aluno:" .$salvar->erro;
        }
        $salvar->close();
        $conexao->close();
}

if(isset($_POST['Editar'])){
//caso tenha uma id na url as imformações presentes na pagina serão editadas
    $queryBD = "UPDATE `aula`SET `data` = ?,`hora` =? , `instrutor` =? ,`aluno` =?  ,`veiculo` =? ,`pago` =?  ,`cpf` =?  WHERE `idaula` =  ?";
    $editarInf = $conexao->prepare($queryBD);
    $editarInf->bind_param("sssssssi", $data, $hora, $instrutor, $aluno, $veiculo, $pago, $cpf, $id);
    $editarInf->execute();
    if ($editarInf->execute()){
        echo"<script>
        alert('Aula editada com sucesso')
        window.location.href = '../cadastrarAula.php'
        </script>"; 
    }
    else{
        echo "Erro ao editar os dados aluno:" .$salvar->erro; 
    }
    $salvar->close();
    $conexao->close();
}
?>