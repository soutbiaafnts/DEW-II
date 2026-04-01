<?php

require_once "connection.php";

$conn = new Connection("localhost", "atividade03", "root", "@rootPc");
$pdo = $conn->getConnection();

$errors = [];

// recebe os dados do vetor $_POST
$name = trim($_POST['name'] ?? "");
$type = $_POST['personType'] ?? "";
$cpf_cnpj = preg_replace('/[^0-9]/', '', $_POST['cpf_cnpj'] ?? "");

// valida o nome
if ($name === "") {
    $errors[] = "O nome é obrigatório.";
}

// valida o tipo de pessoa
if ($type !== "F" && $type !== "J") {
    $errors[] = "Tipo de pessoa inválido.";
}

// valida o CPF/CNPJ
if ($cpf_cnpj === "") {
    $errors[] = "CPF/CNPJ é obrigatório.";
} else {

    if ($type === "F" && !validateCpf($cpf_cnpj)) {
        $errors[] = "CPF inválido.";
    }

    if ($type === "J" && !validateCnpj($cpf_cnpj)) {
        $errors[] = "CNPJ inválido.";
    }
}

// se houver erros, redireciona para a página inicial com os erros
if (!empty($errors)) {

    $msg = implode("<br>", $errors);

    header("Location: index.php?error=" . urlencode($msg));
    exit;
}

// se não houver erros,insere os dados no banco de dados

$sql = "INSERT INTO people (person_name, person_type, cpf_cnpj)
        VALUES (:name, :type, :cpf_cnpj)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":name" => $name,
    ":type" => $type,
    ":cpf_cnpj" => $cpf_cnpj
]);

header("Location: index.php?success=1");
exit;


// função para validar CPF
function validateCpf($cpf)
{
    $cpf = preg_replace("/[^0-9]/", "", $cpf);

    $equalDigits = 1;

    if (strlen($cpf) < 11) return false;

    // Verifica se todos os dígitos são iguais
    for ($i = 0; $i < strlen($cpf) - 1; $i++) {
        if ($cpf[$i] != $cpf[$i + 1]) {
            $equalDigits = 0;
            break;
        }
    }

    if (!$equalDigits) {
        $numbers = substr($cpf, 0, 9);
        $digits = substr($cpf, 9, 2);

        $sum = 0;
        for ($i = 10; $i > 1; $i--) {
            $sum += $numbers[10 - $i] * $i;
        }

        $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

        if ($result != $digits[0]) return false;

        $numbers = substr($cpf, 0, 10);
        $sum = 0;

        for ($i = 11; $i > 1; $i--) {
            $sum += $numbers[11 - $i] * $i;
        }

        $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

        if ($result != $digits[1]) return false;

        return true;
    } else {
        return false;
    }
}

// função para validar CNPJ
function validateCnpj($cnpj)
{
    $cnpj = preg_replace("/[^0-9]/", "", $cnpj);

    $equalDigits = 1;

    if (strlen($cnpj) < 14) return false;

    // Verifica se todos os dígitos são iguais
    for ($i = 0; $i < strlen($cnpj) - 1; $i++) {
        if ($cnpj[$i] != $cnpj[$i + 1]) {
            $equalDigits = 0;
            break;
        }
    }

    if (!$equalDigits) {
        $size = strlen($cnpj) - 2;
        $numbers = substr($cnpj, 0, $size);
        $digits = substr($cnpj, $size, 2);

        $sum = 0;
        $position = $size - 7;

        for ($i = $size; $i >= 1; $i--) {
            $sum += $numbers[$size - $i] * $position--;
            if ($position < 2) $position = 9;
        }

        $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

        if ($result != $digits[0]) return false;

        $size = $size + 1;
        $numbers = substr($cnpj, 0, $size);

        $sum = 0;
        $position = $size - 7;

        for ($i = $size; $i >= 1; $i--) {
            $sum += $numbers[$size - $i] * $position--;
            if ($position < 2) $position = 9;
        }

        $result = $sum % 11 < 2 ? 0 : 11 - ($sum % 11);

        if ($result != $digits[1]) return false;

        return true;
    } else {
        return false;
    }
}
