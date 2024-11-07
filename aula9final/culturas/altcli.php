<?php
    require("coneccli.php");
    $idcultura = "";
    $cultura = "";
    $variedade = "";
    $ciclo = "";
    $colheita = "";
    
    if(isset($_GET["alterar"])){
        $idcultura = htmlentities($_GET["alterar"]);
        $query = $mysqli->query("select * from culturas where idcultura = '$idcultura'");
        if($tabela = $query->fetch_assoc()) {
            $cultura = isset($tabela["cultura"]) ? $tabela["cultura"] : "";      
            $variedade = isset($tabela["variedade"]) ? $tabela["variedade"] : "";
            $ciclo = isset($tabela["ciclo"]) ? $tabela["ciclo"] : "";  
            $colheita = isset($tabela["colheita"]) ? $tabela["colheita"] : "";    
        }
    }
?>
 
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
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
        <h2>Alterar Cultura</h2>
        <form method="POST" action="altcli.php">
            <input type="hidden" name="idcultura" value="<?php echo $idcultura ?>">
            
            <div class="form-group">
                <label>CULTURA:</label>
                <input type="text" name="cultura" value="<?php echo $cultura ?>">
            </div>

            <div class="form-group">
                <label>VARIEDADE:</label>
                <input type="text" name="variedade" value="<?php echo $variedade ?>">
            </div>

            <div class="form-group">
                <label>CICLO:</label>
                <input type="text" name="ciclo" value="<?php echo $ciclo ?>">
            </div>

            <div class="form-group">
                <label>COLHEITA:</label>
                <input type="text" name="colheita" value="<?php echo $colheita ?>">
            </div>

            <input type="submit" value="Salvar" name="botao" class="btn-submit">
        </form>

        <?php
            if(isset($_POST["botao"])){
                $idcultura = htmlentities($_POST["idcultura"]);
                $cultura = htmlentities($_POST["cultura"]);
                $variedade = htmlentities($_POST["variedade"]);
                $ciclo = htmlentities($_POST["ciclo"]);
                $colheita = htmlentities($_POST["colheita"]);
         
                $mysqli->query("update culturas set 
                    cultura = '$cultura', 
                    variedade = '$variedade', 
                    ciclo = '$ciclo', 
                    colheita = '$colheita' 
                    where idcultura = '$idcultura'");
                
                if ($mysqli->error == "") {
                    echo "<div class='mensagem sucesso'>Alterado com sucesso</div>";
                } else {
                    echo $mysqli->error;
                }
            }
        ?>
        <a href="index4.php" class="voltar">Voltar</a>
    </div>
</body>
</html>