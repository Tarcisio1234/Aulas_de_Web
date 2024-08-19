<?php 
include 'conexaoBanco.php';
session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $valor = str_replace(',','.',$valor);
    $valor = floatval($valor);

    $declaracao = $conexao->prepare("INSERT INTO `despesas`(`tipo`,`descricao`,`valor`,`data`)VALUES(?,?,?,?)");
    $declaracao->bind_param("ssds",$tipo, $descricao, $valor, $data);
    
                if($declaracao->execute()){
                    $declaracao =$conexao->prepare("SELECT tipo, descricao,valor,data from despesas order by valor desc;");
                    $declaracao->execute();
                    $resultado = $declaracao->get_result();
                    $contas ='';
                    while($linha = $resultado->fetch_assoc()){
                        $valorFormatado = number_format($linha['valor'],2,',','.');
                        $dataFormatada  = date('d/m/Y', strtotime($linha['data']));
                        $contas.="
                        <tr>
                            <td>{$linha['tipo']}</td>                    
                            <td>{$linha['descricao']}</td>
                            <td>R$ {$valorFormatado}</td>
                            <td>{$dataFormatada}</td>
                        </tr>";
                    }
                    $_SESSION['contas']=$contas;
                    
               
                $declaracao->close();

}
$declaracao = $conexao->prepare("SELECT SUM(valor) AS total FROM DESPESAS");
$declaracao->execute();
$resultado = $declaracao->get_result();
$row = $resultado->fetch_assoc();
$total = $row['total']?? 0;
$_SESSION['totalFormatado']= number_format($total,2,',','.');
// Formatação do valor total para exbição
$totalFormatado = number_format($total, 2, ',', '.');
echo "<script> alert('Cadastado com sucesso');
                    window.location.href = '../despesas.php'</script>";
                }
                else{
                    echo"<script> alert('Erro ao cadastrar as dispesas')
                    window.location.href = '../despesas.php'</script>";
                }
?>