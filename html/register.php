<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanhe Sapne: Register</title>
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>
    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "nanhesapne";
    $conn = new mysqli($host, $username, $password, $database);

    $alreadyExists = false;


    if (!$conn) {
        die("Connection Failed " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["signup"])) {
            if (!empty(trim($_POST["fname"])) && !empty(trim($_POST["lname"]))) {
                $fname = trim($_POST["fname"]);
                $lname = trim($_POST["lname"]);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $userPassword = $_POST["password"];

                $sql = "SELECT email FROM userinfo WHERE email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $alreadyExists = true;
                } else {
                    $sql = "INSERT INTO userinfo(firstname, lastname, email, password) VALUES (?,?,?,?);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssss", $fname, $lname, $email, $userPassword);

                    if ($stmt->execute()) {
                        // $_SESSION['username'] = strstr($email, '@', true);   
                        // $_SESSION['userinfo'] = 'true';
                        // $_SESSION['userPassword'] = $userPassword;
                        header("Location: index.php");
                    } else {
                        echo "<h5> Register Failed </h5>";
                    }
                    $stmt->close();
                }
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        }
    }
    $conn->close();

    ?>
    <div class="container">
        <h1>SIGN UP</h1>
        <form name="loginForm" method="POST">
            <div class="signup-item" id="name">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>
            </div>
            <div class="signup-item" id="email-div">
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="signup-item" id="pass-div">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div id="button-div">
                <button type="submit" name="signup">SIGN UP</button>
            </div>
        </form>
        <div id="register">
            <p>Already have an account? <a href="login.php">LOGIN</a></p>
        </div>
        <div>
            <?php
            if ($alreadyExists == true) {
                echo "<h2 class=\"alreadyExists\">EMAIL ALREADY REGISTERED. <br />PLEASE LOGIN</h2>";
            }
            ?>
        </div>
    </div>
</body>

</html>