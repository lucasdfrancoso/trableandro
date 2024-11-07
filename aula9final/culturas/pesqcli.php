<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Culturas</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #white;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        max-width: 500px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 8px; 
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #f8f9fa; 
    }

    .btn-submit {
        background-color: #333; 
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #555; 
    }

    .mensagem {
        margin-top: 15px;
        padding: 10px;
        border-radius: 4px;
    }

    .sucesso {
        background-color: #white;
        color: #white;
    }

    .voltar {
        display: inline-block;
        margin-top: 15px;
        color: #333;
        text-decoration: none;
    }

    .voltar:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesquisar Culturas</h2>
        
        <form method="POST" action="pesqcli.php">
            <div class="form-group">
                <label>CULTURA:</label>
                <input type="text" name="cultura" maxlength="20" placeholder="Digite a cultura">
            </div>

            <div class="form-group">
                <label>VARIEDADE:</label>
                <input type="text" name="variedade" maxlength="20" placeholder="Digite a variedade">
            </div>

            <div class="form-group">
                <label>CICLO:</label>
                <input type="text" name="ciclo" maxlength="20" placeholder="Digite o ciclo">
            </div>

            <div class="form-group">
                <label>COLHEITA:</label>
                <input type="text" name="colheita" maxlength="20" placeholder="Digite a colheita">
            </div>

            <input type="submit" value="Pesquisar" name="botao">
        </form>

        <?php 
        if(isset($_POST["botao"])){
            require("coneccli.php");
            $cultura = htmlentities($_POST["cultura"]);
            $variedade = htmlentities($_POST["variedade"]);
            $ciclo = htmlentities($_POST["ciclo"]);
            $colheita = htmlentities($_POST["colheita"]);

            $query = $mysqli->query("select * from culturas where cultura like '%$cultura%'");
            $query = $mysqli->query("select * from culturas where variedade like '%$variedade%'");
            $query = $mysqli->query("select * from culturas where ciclo like '%$ciclo%'");
            $query = $mysqli->query("select * from culturas where cultura like '%$colheita%'");

            echo $mysqli->error;

            if($query->num_rows > 0) {
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CULTURA</th>
                            <th>VARIEDADE</th>
                            <th>CICLO</th>
                            <th>COLHEITA</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                
                while ($tabela = $query->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . ($tabela['idcultura'] ?? '') . "</td>
                        <td>" . ($tabela['cultura'] ?? '') . "</td>
                        <td>" . ($tabela['variedade'] ?? '') . "</td>
                        <td>" . ($tabela['ciclo'] ?? '') . "</td>
                        <td>" . ($tabela['colheita'] ?? '') . "</td>
                    </tr>
                    ";
                }
                
                echo "</tbody></table>";
            } else {
                echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
            }
        }
        ?>
        
        <a href='index4.php' class="btn-voltar">Voltar</a>
    </div>
</body>
</html>