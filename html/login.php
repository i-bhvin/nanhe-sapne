<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanhe Sapne: Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "nanhesapne";
    $conn = new mysqli($host, $username, $password, $database);


    // variables
    $incorrect = false;

    if (!$conn) {
        die("Connection Failed " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["login"])) {
            $email = $_POST['email'];
            $userPassword = $_POST['password'];

            $sql = "SELECT email, password FROM userinfo WHERE email='$email' AND password='$userPassword';";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                header("Location: index.php");
                $result->close();
            } else {
                $incorrect = true;
            }
        }
    }

    $conn->close();

    ?>
    <div class="container">
        <h1>LOGIN</h1>
        <form method="post">
            <div class="login-item" id="email-div">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="login-item" id="pass-div">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div id="button-div">
                <button type="submit" name="login">SIGN-IN</button>
            </div>
        </form>
        <div id="register">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
        <?php
        if ($incorrect === true) {
            echo "<h3 class=\"incorrect\"> INCORRECT EMAIL/PASSWORD </h3>";
        }
        ?>
    </div>

</body>

</html>