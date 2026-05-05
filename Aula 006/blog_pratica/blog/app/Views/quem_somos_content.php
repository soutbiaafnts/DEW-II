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

?>