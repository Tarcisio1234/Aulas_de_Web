<?php
session_start();
if(isset($_SESSION['nome'])){
    $nomeUsuario = $_SESSION['nome'];
}
else{
    header("location: login.html");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" >
    <title>Página Inicial - Autoescola</title>
   
</head>
<body>
    <?php
    include_once"navegador.php";
    ?>

    <div class="container">
        <h1>Olá, <?php echo htmlspecialchars($nomeUsuario) ?></h1>
        <p>Hoje é dia <span id="dataAtual"></span>.</p>
        <p>Clique no menu e escolha o que deseja fazer:</p>
        <div class="menu">
            <a href="cadAluno.php">Cadastrar Aluno</a>
            <a href="#">Cadastrar Carro</a>
            <a href="cadastrarAula.php">Agendar Aula</a>
        </div>
    </div>
    <script>
         function formatData(data){
            // formatar a aparencia da data
            const opcao = {weekday:'long', year:'numeric', month:'numeric', day:'numeric'}
            return data.toLocaleDateString('pt-BR',opcao)
         }
         // Alterar o que já existe no html (sobreescreve informação)
         document.getElementById('dataAtual').innerText = formatData(new Date())
    </script>
    
</body>
</html>
