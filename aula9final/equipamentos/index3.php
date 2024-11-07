<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipamentos</title>
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
        <h2>Cadastro de Equipamentos</h2>
        
        <div class="btn-group">
            <a href="adicionar.php"><button>Adicionar</button></a>
            <a href="pesquisar.php"><button>Pesquisar</button></a>
            <a href="../index1.php"><button>Voltar</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>EQUIPAMENTO</th>
                    <th>LOCALIZAÇÃO</th>
                    <th>CUSTO</th>
                    <th>MARCA/MODELO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("conecta.php");
                
                $query = $mysqli->query("select * from equipamentos");
                echo $mysqli->error;

                while ($tabela = $query->fetch_assoc()){
                    echo "
                    <tr>
                        <td>" . ($tabela['idequipe'] ?? '') . "</td>
                        <td>" . ($tabela['equipamento'] ?? '') . "</td>
                        <td>" . ($tabela['localizacao'] ?? '') . "</td>
                        <td>" . ($tabela['custo'] ?? '') . "</td>
                        <td>" . ($tabela['marcamodelo'] ?? '') . "</td>
                        <td class='actions'>
                            <a href='excluir.php?excluir=" . ($tabela['idequipe'] ?? '') . "'>[excluir]</a>
                            <a href='alterar.php?alterar=" . ($tabela['idequipe'] ?? '') . "'>[alterar]</a>
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