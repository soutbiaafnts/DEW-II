<h1>Quem Somos</h1>

<?php
/*

dd($alunos);
echo "<br/>";
d($notas);

echo "<pre>";
var_dump($alunos);
echo "</pre>";

*/

echo "<ul>";
foreach ($alunos as $a) {
    echo "<li>" . $a . "</li>";
}
echo "</ul>";

echo "<br/>";

echo ul($alunos);

echo "<br/>";

echo "Data e Hora: " . date('d/m/Y H:i:s');

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Aluno</th><th>Nota</th></tr>";
foreach ($notas as $n) {
    echo "<tr>";
    echo "<td>" . $n['aluno'] . "</td>";
    echo "<td>" . $n['nota'] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>