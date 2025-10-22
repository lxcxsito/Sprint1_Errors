<?php
session_start();

//Task 1
Dividir(10, 0);
function Dividir($a, $b)
{
    try {
        if ($b == 0) {
            echo throw new ErrorException("No es pot dividir per 0" . "\n");
        }
        return $a / $b;
    } catch (Exception $e) {
        echo $e . "\n";
        return $e->getMessage();
    }

}

//Task 2

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = ["alice", "bob", "charlie"];
}
$GLOBALS['users'] = $_SESSION['users'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['newUsername']) && !empty(trim($_POST['newUsername'])) && preg_match("/^[A-Za-z]+$/", $_POST['newUsername'])) {
        $newUser = trim($_POST['newUsername']);
        if (!in_array($newUser, $GLOBALS['users'])) {
            $_SESSION['users'][] = $newUser;
            $GLOBALS['users'] = $_SESSION['users'];
        }
    } else if (isset($_POST['newUsername'])) {
        echo '<p style="color: red;">Error: El nombre de usuario solo puede contener letras</p>';
    }

    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    echo 'Username: ' . htmlspecialchars($username) . '<br>';
}
// valor seleccionado persistente
$selected = isset($_POST['username']) ? $_POST['username'] : '';


?>

<!--
HTML part
-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulari</title>
</head>

<body>
    <h1>Formulari</h1>
    <form action="Level1.php" method="post">
        <label for="username">Nom d'usuari:</label>
        <input type="text" name="newUsername" id="newUsername" required>
        <button type="submit">Save User</button>
        <br><br>
        <p>Users: </p>
        <select name="username" id="username">
            <option value="">-- Registered Users --</option>
            <?php foreach ($_SESSION['users'] as $user): ?>
                <option value="<?php echo htmlspecialchars($user); ?>" <?php echo ($user === $selected) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($user); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
</body>

</html>