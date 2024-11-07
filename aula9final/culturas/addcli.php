<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cultura</title>
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
    <div class="form-container">
        <h2>Cadastro de Cultura</h2>
        <form method="POST" action="addcli.php">
            <div class="form-group">
                <label for="cultura">CULTURA:</label>
                <input type="text" id="cultura" name="cultura" maxlength="20" placeholder="Digite a cultura">
            </div>

            <div class="form-group">
                <label for="variedade">VARIEDADE:</label>
                <input type="text" id="variedade" name="variedade" maxlength="20" placeholder="Digite a variedade">
            </div>

            <div class="form-group">
                <label for="ciclo">CICLO:</label>
                <input type="text" id="ciclo" name="ciclo" maxlength="20" placeholder="Digite o ciclo">
            </div>

            <div class="form-group">
                <label for="colheita">COLHEITA:</label>
                <input type="text" id="colheita" name="colheita" maxlength="20" placeholder="Digite a colheita">
            </div>

            <button type="submit" name="botao" class="btn-submit">Salvar</button>
        </form>

        <?php
        if(isset($_POST["botao"])){
            require("coneccli.php");

            $cultura = htmlentities($_POST["cultura"]);
            $variedade = htmlentities($_POST["variedade"]);
            $ciclo = htmlentities($_POST["ciclo"]);
            $colheita = htmlentities($_POST["colheita"]);

            $mysqli->query("insert into culturas values('', '$cultura', '$variedade', '$ciclo', '$colheita')");
            
            if($mysqli->error == ""){
                echo "<div class='mensagem sucesso'>
                        Inserido com sucesso<br/>
                        <a href='index4.php' class='voltar'>Voltar</a>
                      </div>";
            } else {
                echo "<div class='mensagem erro'>" . $mysqli->error . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
 

