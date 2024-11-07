<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTech - Pesquisar Propriedades</title>
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
    <div class="container">
        <h2>Pesquisar Propriedades</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Propriedade:</label>
                <input type="text" name="propriedade" placeholder="Digite a propriedade">
            </div>
            
            <div class="form-group">
                <label>Proprietário:</label>
                <input type="text" name="proprietario" placeholder="Digite o proprietário">
            </div>
            
            <div class="form-group">
                <label>Área:</label>
                <input type="text" name="area" placeholder="Digite a área">
            </div>
            
            <div class="form-group">
                <label>Cultura:</label>
                <input type="text" name="cultura" placeholder="Digite a cultura">
            </div>

            <input type="submit" name="botao" value="Pesquisar">
        </form>

        <?php
            if(isset($_POST["botao"])) {
                include_once('conecta.php');
                
                $propriedade = $_POST['propriedade'];
                $proprietario = $_POST['proprietario'];
                $area = $_POST['area'];
                $cultura = $_POST['cultura'];
                
                $sql = "SELECT * FROM propriedade WHERE 
                        propriedade LIKE '%$propriedade%' OR 
                        proprietario LIKE '%$proprietario%' OR 
                        area LIKE '%$area%' OR 
                        cultura LIKE '%$cultura%'";
                
                $result = $mysqli->query($sql);

                if($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>ID</th>
                                <th>Propriedade</th>
                                <th>Proprietário</th>
                                <th>Área</th>
                                <th>Cultura</th>
                            </tr>";
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['idprop']."</td>
                                <td>".$row['propriedade']."</td>
                                <td>".$row['proprietario']."</td>
                                <td>".$row['area']."</td>
                                <td>".$row['cultura']."</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='text-align: center; margin-top: 20px; color: #666;'>Nenhum resultado encontrado.</p>";
                }
            }
        ?>
        
        <a href="index2.php" class="btn-voltar">Voltar</a>
    </div>
</body>
</html>