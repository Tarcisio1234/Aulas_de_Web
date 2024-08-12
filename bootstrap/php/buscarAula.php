<?php
 session_start();
 include 'conexaoBanco.php';

 // deletando as aulas do banco
 if(isset($_POST['delete_id'])){
   $id = $_POST['delete_id'];
   $declaracao = "DELETE FROM `aula` WHERE idaula = ?";
   $declaracao = $conexao->prepare($declaracao);
   $declaracao->bind_param("i",$id);
   if($declaracao->execute()){
      $_SESSION['msg'] = "Aula deletada com sucesso";
   }else{
      $_SESSION['msg'] = "Aula não deletada";
   }
   $declaracao->close();
   $conexao->close();
   header("Location:../tabelaAula.php");
   exit();
 }

 //Editando as aulas do banco
 
if(isset($_POST['editar_id'])){
   $id=$_POST['editar_id'];
   echo"
   <script>
   if(confirm('Você deseja editar essa aula?')){
      window.location.href ='../cadastrarAula.php?id=$id'
   }else{
      window.location.href ='../tabelaAula.php'
   }
   </script>";
   exit();
}

  $sql = "SELECT* FROM aula";
  $results = '';

 if(isset($_POST['instrutor'])||isset($_POST['nome_aluno'])){
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
               <td>
                  <form action='php/buscarAula.php' method='post' style ='display:inline'>
                     <input type ='hidden' name ='delete_id' value='{$linha['idaula']}' >
                     <button type ='submit' name ='delete'>Deletar</button>
                  </form>
                  <form action='php/buscarAula.php' method='post' style ='display:inline'>
                     <input type='hidden' name='editar_id' value='{$linha['idaula']}' >
                     <button type ='submit' name ='editar'>Editar</button>
                  </form>
               </td>
            </tr>
            ";
         }
      }
      else{
         $results ="
         <tr>
            <td colspan ='6'>Nenhuma aula encontrada</td>
         </tr>";
      }
      $_SESSION['results'] = $results;
      $conexao->close();
      header("Location:../tabelaAula.php") ;//garante o envio de informações para a url
      exit();
    
?>
