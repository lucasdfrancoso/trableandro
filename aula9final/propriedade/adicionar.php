<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
        <form method="POST" action="adicionar.php">
            <div class="form-group">
                <label>PROPRIEDADE:</label>
                <input type="text" name="propriedade" maxlength="20" placeholder="digite a propriedade">
            </div>

            <div class="form-group">
                <label>PROPRIETARIO:</label>
                <input type="text" name="proprietario" maxlength="20" placeholder="digite o proprietario">
            </div>

            <div class="form-group">
                <label>AREA:</label>
                <input type="text" name="area" maxlength="20" placeholder="digite a area">
            </div>

            <div class="form-group">
                <label>CULTURA:</label>
                <input type="text" name="cultura" maxlength="20" placeholder="digite a cultura">
            </div>

            <input type="submit" value="Salvar" name="botao" class="btn-submit">
        </form>

        <?php
        if(isset($_POST["botao"])){
            require("conecta.php");

            $propriedade=htmlentities($_POST["propriedade"]);
            $proprietario=htmlentities($_POST["proprietario"]);
            $area=htmlentities($_POST["area"]);
            $cultura=htmlentities($_POST["cultura"]);

            $mysqli->query("insert into propriedade values('', '$propriedade', '$proprietario', '$area', '$cultura')");
            echo $mysqli->error;

            if($mysqli->error == ""){
                echo "<div class='mensagem sucesso'>Inserido com sucesso</div>";
                echo "<a href='index2.php' class='voltar'>Voltar</a>";
            }
        }
        ?>
    </div>
</body>
</html>
 

