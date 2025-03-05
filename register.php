<?php
$conn = new mysqli('localhost', 'root', '', 'register');

if ($conn->connect_error) {
    die('Kapcsolódási hiba: ' . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = trim($_POST['nev']);
    $jelszo = trim($_POST['password']);

    $result = $conn->query("SELECT * FROM adatok WHERE Név = '$name'");
    if (!$result) {
        die('SQL hiba: '. $conn->error);
    } else{
        if ($result->num_rows > 0) {
            echo 'A felhasználónév már foglalt!';
            exit();
        } else {
            if ($conn->query("INSERT INTO adatok (Név, Jelszó) VALUES ('$name', '$jelszo')")) {
                echo 'Sikeres regisztráció!';
            } else {
                echo 'SQL hiba: ' . '<br>'. $conn->error;
            }
        }
    }
    header('Location: szia.php');
}
$conn->close();
?>