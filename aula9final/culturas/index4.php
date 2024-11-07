<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culturas</title>
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
        <h2>Cadastro de Culturas</h2>
        
        <div class="btn-group">
            <a href="addcli.php"><button>Adicionar</button></a>
            <a href="pesqcli.php"><button>Pesquisar</button></a>
            <a href="../index1.php"><button>Voltar</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CULTURA</th>
                    <th>VARIEDADE</th>
                    <th>CICLO</th>
                    <th>COLHEITA</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("coneccli.php");
                
                $query = $mysqli->query("SELECT * FROM culturas");
                echo $mysqli->error;

                while ($tabela = $query->fetch_assoc()){
                    echo "
                    <tr>
                        <td>{$tabela['idcultura']}</td>
                        <td>{$tabela['cultura']}</td>
                        <td>" . ($tabela['variedade'] ?? '') . "</td>
                        <td>{$tabela['ciclo']}</td>
                        <td>{$tabela['colheita']}</td>
                        <td class='actions'>
                            <a href='exccli.php?excluir={$tabela['idcultura']}'>[Excluir]</a>
                            <a href='altcli.php?alterar={$tabela['idcultura']}'>[Alterar]</a>
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
