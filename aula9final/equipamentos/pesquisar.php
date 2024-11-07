<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Pesquisar Equipamentos</title>
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
        <h2>Pesquisar Equipamentos</h2>
        
        <form method="POST" action="pesquisar.php">
            <div class="form-group">
                <label>EQUIPAMENTO:</label>
                <input type="text" name="equipamento" maxlength="20" placeholder="Digite o equipamento">
            </div>

            <div class="form-group">
                <label>LOCALIZAÇÃO:</label>
                <input type="text" name="localizacao" maxlength="20" placeholder="Digite a localização">
            </div>

            <div class="form-group">
                <label>CUSTO:</label>
                <input type="text" name="custo" maxlength="20" placeholder="Digite o custo">
            </div>

            <div class="form-group">
                <label>MARCA/MODELO:</label>
                <input type="text" name="marcamodelo" maxlength="20" placeholder="Digite a marca/modelo">
            </div>

            <input type="submit" value="Pesquisar" name="botao">
        </form>

        <?php 
        if(isset($_POST["botao"])){
            require("conecta.php");
            $equipamento = htmlentities($_POST["equipamento"]);
            $localizacao = htmlentities($_POST["localizacao"]);
            $custo = htmlentities($_POST["custo"]);
            $marcamodelo = htmlentities($_POST["marcamodelo"]);

            $query = $mysqli->query("select * from equipamentos where equipamento like '%$equipamento%'");
            $query = $mysqli->query("select * from equipamentos where localizacao like '%$localizacao%'");
            $query = $mysqli->query("select * from equipamentos where custo like '%$custo%'");
            $query = $mysqli->query("select * from equipamentos where marcamodelo like '%$marcamodelo%'");

            echo $mysqli->error;

            if($query->num_rows > 0) {
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EQUIPAMENTO</th>
                            <th>LOCALIZAÇÃO</th>
                            <th>CUSTO</th>
                            <th>MARCA/MODELO</th>
                        </tr>
                    </thead>
                    <tbody>
                ";
                
                while ($tabela = $query->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>" . ($tabela['idequipe'] ?? '') . "</td>
                        <td>" . ($tabela['equipamento'] ?? '') . "</td>
                        <td>" . ($tabela['localizacao'] ?? '') . "</td>
                        <td>" . ($tabela['custo'] ?? '') . "</td>
                        <td>" . ($tabela['marcamodelo'] ?? '') . "</td>
                    </tr>
                    ";
                }
                
                echo "</tbody></table>";
            } else {
                echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
            }
        }
        ?>
        
        <a href='index3.php' class="btn-voltar">Voltar</a>
    </div>
</body>
</html>