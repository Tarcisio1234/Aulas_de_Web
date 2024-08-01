<?php
 include 'conexaoBanco.php';
 $sql = "SELECT* FROM aula";
 $results = '';

 if(isset($_POST['instrutor'])||isset($_POS['nome_aluno'])){
    $instrutor = $_POST['instrutor'];
    $aluno = $_POST['nome_aluno'];

    $sql .=" where 1=1";
    if (!empty($instrutor)){
      $sql .=" AND instrutor like '%$instrutor$'";
    }
    if(!empty($aluno)){
      $sql .=" AND aluno like '$aluno'";
    }
 }
    $resultado = $conexao->query($sql);
    if($resultado-> num_rows>0){
         while($linha =$resultado->fetch_assoc()){

            $results .="
            <tr>
               <td>{$linha['data']} </td>
               <td>{$linha['hora']} </td>
               <td>{$linha['instrutor']} </td>
               <td>{$linha['aluno']} </td>
               <td>{$linha['veiculo']} </td>
            <tr/>
            ";
         }
      }
      else{
         $results ="
         <tr>
            <td coluspan ='5'.Nenhuma aula encontrada</td>
         </tr>";
      }
      $conexao->close();
      header("Location:../tabelaAula.php?results=".urlencode($results)); //garante o envio de infoemações para a url
      exit();
    
?>