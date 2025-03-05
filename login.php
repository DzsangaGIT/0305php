<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'register');

if ($conn->connect_error) {
    die("Kapcsolat hiba: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nev = trim($_POST['nev']);
    $password = trim($_POST['password']);

    $result = $conn->query("SELECT * FROM adatok WHERE Név = '$nev' AND Jelszó = '$password'");

    if ($result->num_rows == 0) {
        echo json_encode(['success' => false, 'message' => 'Sikertelen bejelentkezés']);
    } else {
        $_SESSION['nev'] = $nev;
        echo json_encode(['success' => true, 'nev' => $nev]);
    }
}
$conn->close();
?>