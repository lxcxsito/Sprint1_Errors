<?php
//Validar Formulario
session_start();
$valid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = validateUsername($_POST['username']);
    $valid = validatePassword($_POST['psswd']);
    if ($valid) {
        showSuccessMessage();
    }
}


function validateUsername($user): bool
{
    if (strlen($user) < 5 || strlen($user) > 15)
        throw new Exception("El nom d'usuari ha de tenir entre 5 i 15 caràcters.");
    else if (!preg_match('/^[a-zA-Z]+$/', $user)) {
        throw new Exception("El nom d'usuari només pot contenir lletres");
    }
    return true;
}


function validatePassword($psswd): bool
{
    if (strlen($psswd) < 8) {
        throw new Exception("La contrasenya ha de tenir almenys 8 caràcters.");
    } else if (!preg_match('/[A-Z]/', $psswd)) {
        throw new Exception("La contrasenya ha de contenir almenys una lletra majúscula.");
    } else if (!preg_match('/[a-z]/', $psswd)) {
        throw new Exception("La contrasenya ha de contenir almenys una lletra minúscula.");
    } else if (!preg_match('/[0-9]/', $psswd)) {
        throw new Exception("La contrasenya ha de contenir almenys un número.");
    }
    return true;
}

function showSuccessMessage()
{
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['psswd'] = $_POST['psswd'];
    $_SESSION['sexe'] = $_POST['sexe'];
    echo "Formulari correcte.";
    echo "<br>";
    echo "Username: " . $_POST['username'] . "<br>";
    echo "Contrasenya: " . $_POST['psswd'] . "<br>";
    echo "Sexe: " . $_POST['sexe'] . "<br>";
}


?>