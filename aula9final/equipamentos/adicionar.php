<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <<style>
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
                <label>EQUIPAMENTO:</label>
                <input type="text" name="equipamento" maxlength="20" placeholder="digite o equipamento">
            </div>

            <div class="form-group">
                <label>LOCALIZACAO:</label>
                <input type="text" name="localizacao" maxlength="20" placeholder="digite a localizacao">
            </div>

            <div class="form-group">
                <label>CUSTO:</label>
                <input type="text" name="custo" maxlength="20" placeholder="digite o custo">
            </div>

            <div class="form-group">
                <label>MARCAMODELO:</label>
                <input type="text" name="marcamodelo" maxlength="20" placeholder="digite a marcamodelo">
            </div>

            <input type="submit" value="Salvar" name="botao" class="btn-submit">
        </form>

        <?php
        if(isset($_POST["botao"])){
            require("conecta.php");

            $equipamento=htmlentities($_POST["equipamento"]);
            $localizacao=htmlentities($_POST["localizacao"]);
            $custo=htmlentities($_POST["custo"]);
            $marcamodelo=htmlentities($_POST["marcamodelo"]);

            $mysqli->query("insert into equipamentos values('', '$equipamento', '$localizacao', '$custo', '$marcamodelo')");
            echo $mysqli->error;

            if($mysqli->error == ""){
                echo "<div class='mensagem sucesso'>Inserido com sucesso</div>";
                echo "<a href='index3.php' class='voltar'>Voltar</a>";
            }
        }
        ?>
    </div>
</body>
</html>
 

