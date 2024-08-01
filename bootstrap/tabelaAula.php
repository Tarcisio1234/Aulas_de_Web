<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Aulas Agendadas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 80%;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            width: 48%;
            padding: 10px;
            font-size: 16px;
        }
        .search-form button {
            padding: 10px 20px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .all-classes-button {
            display: flex;
            justify-content: flex-end;
        }
        .all-classes-button button {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buscar Aulas Agendadas</h1>
        <form class="search-form" method="POST" action="php/buscarAula.php">
            <input type="text" name="instrutor" placeholder="Nome do Instrutor">
            <input type="text" name="nome_aluno" placeholder="Nome do Aluno">
            <button type="submit">Buscar</button>
        </form>
        <table id="classes-table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Instrutor</th>
                    <th>Aluno</th>
                    <th>Veículo</th>
                </tr>
            </thead>
            <tbody>
                <!-- As aulas serão inseridas aqui -->
                <?php
                    if (isset($_GET['results'])) {
                        echo $_GET['results'];
                    }
                ?>
            </tbody>
        </table>
        <div class="all-classes-button">
            <form method="POST" action="php/buscaAula.php">
                <button type="submit" name="all_classes">Todas as Aulas</button>
            </form>
        </div>
    </div>
</body>
</html>
