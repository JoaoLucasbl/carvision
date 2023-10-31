<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Motorista</title>
</head>
<body>
    <?php
    if (isset($_POST['modelo']) && isset($_POST['ano']) && isset($_POST['placa']) && isset($_POST['cor'])) {
        $modelo = $_POST['modelo'];
        $ano = $_POST['ano'];
        $placa = $_POST['placa'];
        $cor = $_POST['cor'];
    ?>
    <h1>Informações Recebidas</h1>
    <p><strong>modelo:</strong> <?php echo $modelo; ?></p>
    <p><strong>Data de Validade:</strong> <?php echo $mes; ?>/<?php echo $ano; ?></p>

    <h2></h2>
    <form action="processar_formulario.php" method="post">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" placeholder="Modelo"><br><br>

        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" placeholder="Ano"><br><br>

        <label for="placa">Placa</label>
        <input type="text" id="placa" name="placa" placeholder="Placa"><br><br>

        <label for="cor">Cor</label>
        <input type="text" id="cor" name="cor" placeholder="Cor"><br><br>


        <button type="submit">Enviar</button>
    </form>
    <?php
    } else {
        echo "<p>Nenhum dado foi enviado ainda.</p>";
    }
    ?>
</body>
</html>