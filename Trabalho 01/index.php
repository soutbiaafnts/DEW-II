<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />

    <title>Integração</title>

    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }
    </style>

</head>

<body>
    <!-- Faz a conexão -->
    <?php
    require_once 'connection.php';

    $conn = new Connection("localhost", "exercicio", "root", "root");

    $pdoConn = $conn->getConnection();
    ?>

    <h1>Exercício de Integração (frontend, backend e banco de dados)</h1>

    <form id="f" method="post" action="insert.php">

        <label for="nome"> Nome: </label>
        <input type="text" id="nome" name="nome" size="40" maxlength="40" />

        <br />

        Tipo de Pessoa:

        <input type="radio" id="pfisica" name="tipo" value="F" />
        <label for="pfisica"> Física </label>

        <input type="radio" id="pjuridica" name="tipo" value="J" />
        <label for="pjuridica"> Jurídica </label>

        <br />

        <label for="cpf_cnpj"> CPF/CNPJ: </label>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" />

        <br />

        <input type="submit" id="enviar" value="   Enviar   " />

        <br />

        <input type="reset" id="limpar" value="   Limpar   " />

        <br />

    </form>

    <!-- NOVA TABELA -->
    <h2>Dados Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo de Pessoa</th>
                <th>CPF/CNPJ</th>
            </tr>
        </thead>
        <!-- Faz a consulta -->
        <tbody?>
            <?php
            $sql = "select * from pessoas;";

            $result = $pdoConn->query($sql);

            // verificar se há algo a exibir

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";

                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . ($row["tipo"] == "F" ? "Física" : "Jurídica") . "</td>";
                    echo "<td>" . $row["cpf_cnpj"] . "</td>";

                    echo "</tr>";
                }
            } else {
                echo "Nenhum registro encontrado.";
            }
            ?>
            </tbody>
    </table>


</body>

</html>