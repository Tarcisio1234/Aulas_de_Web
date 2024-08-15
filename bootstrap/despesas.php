<?php
    $despesas = ["Despesa com Funcionário" =>["Salario","Vale Transporte","Vale Alimentação"],
    "Dispesas com carros"=> ["Oficina","Gasolina","Lavagem", "Seguro"],
    "Dispesas Fixas"=>["Luz","Agua","Aluguel"],"Dispesas Eventuais"=> ["Alguem pegou fogo no carro"]];

    $tipoSelecionado =$_POST["tipo"]??'';
    $descricoes = $tipoSelecionado? $despesas[$tipoSelecionado]:[];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Cadastrar Veículo - Autoescola</title>
    
       
</head>
<body>
<div class="container">
    <h1>Controle de Despesas</h1>
    <form action="" method="post">
        <label for="tipo">Tipo de Despesa:</label>
        
        <select id="tipo" name="tipo" required onchange="this.form.submit()">
            <option value="">Escolha a dispesa</option>
            <?php 
            foreach($despesas as $tipo =>$desc):
            ?>
            <option value="<?php echo $tipo;?>"<?php echo $tipo === $tipoSelecionado?'selected':'';?>><?php echo $tipo; ?></option>
            <?php endforeach ?>
            </select>

        <label for="descricao">Descrição:</label>
        <select name="descricao" id="descricao" required>
            <?php 
                if($descricoes):?>
                <?php foreach($descricoes as $descricao):?>
                <option value="<?php echo $descricao;?>">
                <?php echo $descricao; ?>
                </option>
                <?php endforeach;?>
                <?php endif;?>
                </select>
        </select>
        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" step="0.01" required>

        <?php
        $min = new DateTime();
        $min->modify("-30 days");
        $max = new DateTime();
        ?>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" <?php date('Y-m-d');?> min=<?=$min->format("Y-m-d")?> max=<?=$max->format("Y-m-d")?>  required>

        <button class="button" type="submit">Cadastrar</button>
    </form>

    <h2>Lista de Despesas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <!-- Adicione as linhas de despesas aqui -->
        </tbody>
    </table>

    <h3>Total:<!-- <?php echo number_format($total, 2, ',', '.'); ?>--></h3>
</div>
</body>
</html>