<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    
    <?php
        if (session()->getFlashdata('success')) {
            echo "<p>" . session()->getFlashdata('success') . "</p>";
        } else {
            echo "<p>" . session()->getFlashdata('error') . "</p>";
        }
    ?>

    <form action="<?= base_url('cadastrar-aluno') ?>" method="post">
                <!-- se tem "name" envia pro servidor -->
        Nome:
        <input type="text" name="nome_alu" required><br>

        Nota:
        <input type="number" name="nota_alu" required><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>