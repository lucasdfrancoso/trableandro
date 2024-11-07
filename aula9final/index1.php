<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Agronomia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            line-height: 1.2;
        }

        main {
            padding: 0 20px;
        }

        section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
        }

        h3 {
            margin-top: 0;
        }

        p {
            margin: 0 0 15px;
            line-height: 1.6;
        }

        #product-list table {
            width: 100%;
            border-collapse: normal;
        }

        #product-list td {
            padding: 10px;
            text-align: center;
        }

        #product-list img {
            max-width: 100%;
            height: auto;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bem-vindo à Nossa Loja de Agronomia</h1>
    </header>
    <main>
        <section id="intro">
            <h3>Agricultura Sustentável</h3>
            <p>Na nossa loja de agronomia, você encontrará uma ampla gama de produtos e soluções para melhorar sua produção agrícola. Desde sementes de alta qualidade até fertilizantes orgânicos, estamos aqui para apoiar sua jornada rumo a uma agricultura mais sustentável e produtiva.</p>
        </section>
        <section id="product-list">
            <h2>Produtos em Destaque</h2>
            <table>
                <tr>
                    <td><img src="imagem/agro1.png" alt="Produto 1"></td>
                    <td><img src="imagem/agro2.png" alt="Produto 2"></td>
                    <td><img src="imagem/agro3.png" alt="Produto 3"></td>
                </tr>
            </table>
        </section>
        <section id="outro">
            <p>Se você é um profissional do agronegócio ou um entusiasta da agricultura, este é o lugar certo! Navegue por nossas dicas, novidades e eventos que promovem o conhecimento e a troca de experiências entre agricultores e especialistas.</p>
            <p>Junte-se a nós em nossa missão de transformar a agricultura. Seja você um agricultor experiente ou alguém que está começando, temos o conhecimento e os produtos para ajudá-lo a alcançar seus objetivos.</p>
        </section>
    </main>
    <footer>
        <p align="center">
            <a href="CULTURA/index4.php">CADASTRO DE NOVAS CULTURAS</a> <br><br>
            <a href="EQUIPAMENTOS/index3.php">CADASTRO DE EQUIPAMENTOS AGRÍCOLAS</a>  <br><br>
            <a href="PROPRIEDADE/index2.php">CADASTRO DE PROPRIEDADES RURAIS</a>
        </p>
    </footer>
</body>
</html>
