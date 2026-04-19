<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atividade 03</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Conexão -->
  <?php
  require_once 'connection.php';
  $conn = new Connection("localhost", "atividade03", "root", "root");
  $pdoConn = $conn->getConnection();
  ?>
  <!--  -->
  <header>
    <h1>Atividade 03</h1>
    <h2>Integração entre Frontend, Backend e Banco de Dados</h2>
  </header>
  <main>
    <section>
      <?php 
      if (isset($_GET['success'])) {
        echo "<p style='color: green;'>Registro adicionado com sucesso!</p>";
      }

      if (isset($_GET["error"])) {
        echo "<p style='color: red;'>". $_GET["error"] . "</p>";
      }
      ?>
      <form id="form" method="post" action="insert.php">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" />
        <span id="error_name" class="error"></span><br /><br />

        <label for="personType">Tipo de Pessoa:</label><br />
        <input type="radio" id="pfisica" name="personType" value="F" />
        <label for="pfisica">Física</label>
        <input type="radio" id="pjuridica" name="personType" value="J" />
        <label for="pjuridica">Jurídica</label>
        <span id="error_type" class="error"></span><br /><br />

        <label for="cpf_cnpj">CPF/CNPJ:</label>
        <input type="text" id="cpf_cnpj" name="cpf_cnpj" />
        <span id="error_cpf_cnpj" class="error"></span><br /><br />

        <input class="button-send" type="submit" value="Enviar" />
        <input class="button-reset" type="reset" value="Limpar" />
      </form>
    </section>
    <section>
      <h2>Registros</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Tipo de Pessoa</th>
            <th>CPF/CNPJ</th>
          </tr>
        </thead>
        <tbody>
          <!-- Consulta -->
          <?php
          $sql = "select * from people;";
          $result = $pdoConn->query($sql);

          // verifica se tem resultados
          if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['person_name'] . "</td>";
              echo "<td>" . ($row['person_type'] == 'F' ? 'Física' : 'Jurídica') . "</td>";
              echo "<td>" . $row['cpf_cnpj'] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "Nenhum registro encontrado.";
          }

          ?>
          <!--  -->
        </tbody>
      </table>
    </section>
  </main>
  <script src="script.js"></script>
</body>

</html>