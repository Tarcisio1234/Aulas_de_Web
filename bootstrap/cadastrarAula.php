<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Agendar Aula - Autoescola</title>
   
</head>
<body>
    <div class="container">
        <h1>Agendar Aula</h1>
        <?php
        // Conexão com o banco
        include 'php/conexaoBanco.php';
        
        // Inicializa as variáveis
        /*
        if(isset($_POST['Agendar'])){
        $instrutor = filter_input(INPUT_POST, 'instrutor', FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
        $aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
        $paga = filter_input(INPUT_POST, 'paga', FILTER_SANITIZE_STRING);
        $carro = filter_input(INPUT_POST, 'carro', FILTER_SANITIZE_STRING);
        
        }*/
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Busca os dados da aula pelo ID
            $sql = "SELECT * FROM aula WHERE idaula = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Preenche os campos do formulário com os dados da aula
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $instrutor = $linha['instrutor'];
                $cpf = $linha['cpf'];
                $aluno = $linha['aluno'];
                $data = date('Y-m-d', strtotime($linha['data']));
                $hora = $linha['hora'];
                $paga = $linha['paga'];
                $carro = $linha['veiculo'];
            }
            
            $stmt->close();
        }
        
        $conexao->close();
        ?>
        <form action="php/editarSalvarAulas.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="instrutor">Nome do Instrutor:</label>
            <input type="text" id="instrutor" name="instrutor" require>

            <label for="aluno">CPF do Aluno:</label>
            <input type="text" id="cpf" name="cpf" require>

            <button type="submit" class="button">Buscar</button>

            <label for="aluno">Nome do Aluno:</label>
            <input type="text" id="aluno" name="aluno" required>
            
            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required>
            
            <label for="hora">Hora:</label>
            <input type="time" id="hora" name="hora" required>
            
            <label for="paga">Aula Paga?</label>
            <select id="paga" name="paga">
                <option value="sim" >Sim</option>
                <option value="nao">Não</option>
            </select>
            
            <label for="carro">Marca do Carro:</label>
            <input type="text" id="carro" name="carro" required>
            
            <button type="submit" name="Agendar" class="button">Agendar</button>
        </form>
    </div>
</body>
</html>
