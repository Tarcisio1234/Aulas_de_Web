<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Agendar Aula - Autoescola</title>
   
</head>
<body>
    <?php
    include_once"navegador.php";
    ?>
    <div class="container">
        <?php
        // Conexão com o banco
        include 'php/conexaoBanco.php';
        
        // Inicializa as variáveis
        $instrutor = '';
        $cpf = '';
        $aluno = '';
        $data = '';
        $hora = '';
        $pago = '';
        $carro = '';
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            ?>
            <h1>Editar Aula</h1>
            <?php 
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
                $pago = $linha['pago'];
                $carro = $linha['veiculo'];
            }
            
            $stmt->close();
            $conexao->close();
        }
        
        else{
            ?>
            <h1>Agendar Aula</h1>
            <?php
        }
        ?>
        <form action="php/editarSalvarAulas.php" method="post">
            <input type="hidden" name="idEditar" value="<?php echo $id?>">

            <label for="instrutor">Nome do Instrutor:</label>
            <input type="text" id="instrutorID" name="instrutor" value="<?php echo $instrutor;?>" require>

            <label for="aluno">CPF do Aluno:</label>
            <input type="text" id="cpfID" name="cpf" value="<?php echo $cpf;?>" require>

            <button type="submit" class="button">Buscar</button>

            <label for="aluno">Nome do Aluno:</label>
            <input type="text" id="alunoID" name="aluno" value="<?php echo $aluno;?>" required>
            
            <label for="data">Data:</label>
            <input type="date" id="dataID" name="data" value="<?php echo $data;?>" required>
            
            <label for="hora">Hora:</label>
            <input type="time" id="horaID" name="hora" value="<?php echo $hora;?>" required>
            
            <label for="pago">Aula Paga?</label>
            <select id="pago" name="pago">
                <option value="sim" <?php if($pago == 'sim') echo 'selected'; ?>>Sim</option>
                <option value="não" <?php if($pago == 'não') echo 'selected'; ?>>Não</option>
            </select>
            
            <label for="carro">Marca do Carro:</label>
            <input type="text" id="veiculoID" name="veiculo" value=" <?php echo $carro; ?>" required>
            
            <?php
            if(isset($_GET['id'])){
                ?>
                <button type="submit" name="Editar" class="button">Editar</button>
                <?php
            }
            else{
                ?>
            <button type="submit" name="Agendar" class="button">Agendar</button>
            <?php
            }
            ?>
        </form>
    </div>
</body>
</html>