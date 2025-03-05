<?php
session_start();
if (!isset($_SESSION['nev'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üdvözöljük</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(202, 145, 145, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Üdvözöljük, <?php echo htmlspecialchars($_SESSION['nev']); ?>!</h1>
        <p>Sikeres bejelentkezés.</p>
        <a href="logout.php">Kijelentkezés</a>
    </div>
</body>
</html>