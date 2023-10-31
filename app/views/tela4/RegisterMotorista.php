<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Motorista</title>
</head>
<body>
    <?php
    if (isset($_POST['cnh']) && isset($_POST['mes-validade']) && isset($_POST['ano-validade'])) {
        $cnh = $_POST['cnh'];
        $mes = $_POST['mes-validade'];
        $ano = $_POST['ano-validade'];
    ?>
    <h1>Informações Recebidas</h1>
    <p><strong>CNH:</strong> <?php echo $cnh; ?></p>
    <p><strong>Data de Validade:</strong> <?php echo $mes; ?>/<?php echo $ano; ?></p>

    <h2></h2>
    <form action="processar_formulario.php" method="post">
        <label for="cnh">CNH:</label>
        <input type="text" id="cnh" name="cnh" placeholder="CNH"><br><br>

        <label for="mes-validade">Data Validade:</label>
        <input type="number" id="mes-validade" name="mes" placeholder="Mês"><br><br>

        <label for="ano-validade"></label>
        <input type="number" id="ano-validade" name="Ano" placeholder="Ano"><br><br>


        <button type="submit">Enviar</button>
    </form>
    <?php
    } else {
        echo "<p>Nenhum dado foi enviado ainda.</p>";
    }
    ?>
</body>
</html>
