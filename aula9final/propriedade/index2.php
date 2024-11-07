<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Propriedade</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #FFFFFF;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto;
            padding: 25px;
            background-color: white;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2em;
            font-weight: 600;
        }

        .btn-group {
            margin-bottom: 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        button {
            padding: 12px 25px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        button:hover {
            background-color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background-color: white;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #333;
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9em;
        }

        tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Propriedade</h2>
        <div class="btn-group">
            <a href="adicionar.php"><button>Adicionar</button></a>
            <a href="pesquisar.php"><button>Pesquisar</button></a>
            <a href="../index1.php"><button>Voltar</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PROPRIEDADE</th>
                    <th>PROPRIETÁRIO</th>
                    <th>ÁREA</th>
                    <th>CULTURA</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require("conecta.php");
                    $query = $mysqli->query("SELECT * FROM propriedade");
                    echo $mysqli->error;

                    while ($tabela = $query->fetch_assoc()){
                        echo "
                        <tr>
                            <td>{$tabela['idprop']}</td>
                            <td>{$tabela['propriedade']}</td>
                            <td>{$tabela['proprietario']}</td>
                            <td>{$tabela['area']}</td>
                            <td>{$tabela['cultura']}</td>
                            <td class='actions'>
                                <a href='excluir.php?excluir={$tabela['idprop']}'>[Excluir]</a>
                                <a href='alterar.php?alterar={$tabela['idprop']}'>[Alterar]</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
