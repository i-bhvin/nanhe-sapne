<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nanhe Sapne</title>
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>

    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "nanhesapne";
    $conn = new mysqli($host, $username, $password, $database);

    // variables

    $donationSuccess = false;
    $failure = false;
    $contactFormSubmission = false;


    if (!$conn) {
        die("Connection Failed " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['moneyForm'])) {
            // Process Money Donation Form
            if (!empty(trim($_POST['name'])) && !empty(trim($_POST['upiId'])) && !empty(trim($_POST['amount']))) {
                $name = $_POST['name'];
                $upiId = $_POST['upiId'];
                $amount = $_POST['amount'];

                $sql = "INSERT INTO money(`name`, `upiId`, `amount`) VALUES (?, ?, ?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $name, $upiId, $amount);
                if ($stmt->execute()) {
                    $donationSuccess = true;
                } else {
                    $failure = true;
                }
                $stmt->close();
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        } elseif (isset($_POST['foodForm'])) {
            // Process Food Donation Form
            if (!empty(trim($_POST['name'])) && !empty(trim($_POST['address']))) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $foodType = implode(", ", $_POST['foodType']);
                $quantity = $_POST['quantity'];

                $sql = "INSERT INTO food(`name`, `address`, `foodType`, `quantity`) VALUES (?,?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssd", $name, $address, $foodType, $quantity);
                if ($stmt->execute()) {
                    $donationSuccess = true;
                } else {
                    $failure = true;
                }
                $stmt->close();
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        } elseif (isset($_POST['clothesForm'])) {
            // Process Clothes Donation Form
            if (!empty(trim($_POST['name']))) {
                $name = $_POST['name'];
                $clothesType = implode(", ", $_POST['clothesType']);

                $sql = "INSERT INTO clothes(`name`, `clothesType`) VALUES (?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $name, $clothesType);
                if ($stmt->execute()) {
                    $donationSuccess = true;
                } else {
                    $failure = true;
                }
                $stmt->close();
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        } elseif (isset($_POST['othersForm'])) {
            // Process Others Donation Form
            if (!empty(trim($_POST['name'])) && !empty(trim($_POST['itemType'])) && !empty(trim($_POST['itemDescription']))) {
                $name = $_POST['name'];
                $itemType = $_POST['itemType'];
                $itemDescription = $_POST['itemDescription'];

                $sql = "INSERT INTO otheritems(`name`, `itemType`, `itemDescription`) VALUES (?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $name, $itemType, $itemDescription);
                if ($stmt->execute()) {
                    $donationSuccess = true;
                } else {
                    $failure = true;
                }
                $stmt->close();
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        } elseif (isset($_POST['contactForm'])) {
            if (!empty(trim($_POST['fullname'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['message']))) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $sql = "INSERT INTO contact(`fullname`, `email`, `message`) VALUES (?,?,?);";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $fullname, $email, $message);
                if ($stmt->execute()) {
                    $contactFormSubmission = true;
                } else $contactFormSubmission = false;
                $stmt->close();
            } else {
                die("<h1> Invalid Enteris </h1>");
            }
        }
    }

    ?>


    <header>
        <nav>

            <div class="navbar">
                <div class="logo">
                    <img src="../images/ns_logo.png">
                </div>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#donation">Donation</a></li>
                    <li><a href="#adoption">Adoption</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
                <?php
                // $isLoggedIn = ($_SESSION['userinfo'] === 'true');
                // if ($isLoggedIn === true) {
                //     echo "<div class=\"userimg\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiAY_GUgx2TF2_XUlRuGGefgo39motb-Zefh5CLRWF_3a-_BmI5PWulBOKXcFWfosKjEA&usqp=CAU\" alt=\"\"></div>";
                // }
                ?>


            </div>
        </nav>
    </header>

    <section id="home">
        <div class="hero">
            <h1>नन्हे सपने</h1>
            <!-- नन्हे सपने -->
            <h2>- The greatest gift you can give someone is your time, <br> your attention, your love, and your concern.
            </h2>
            <div class="login-btn">
                <a href="register.php"><button id="login-btn">Join Us</button></a>
            </div>
            <!-- <button id="donation">
                Donate Smiles
                <img src="../images/smile.png" alt="Donate Smiles">
            </button> -->
        </div>
    </section>


    <section id="about">
        <h1>About Us</h1>
        <div class="about-container">
            <img src="../images/orphanage.jpg" alt="Orphanage image">

            <p>Welcome to our orphanage! We are a non-profit organization dedicated to providing a safe and loving home
                for children who have lost their parents or have been abandoned. Our mission is to create a nurturing
                environment that encourages growth, development, and happiness for all of our children.
                <br>
                At our orphanage, we believe that every child deserves a bright and promising future, regardless of
                their background or circumstances. Our dedicated team of caregivers works tirelessly to ensure that each
                child receives the love, attention, and support they need to thrive.
                <br>
                We offer a wide range of services to our children, including education, healthcare, and recreational
                activities. Our goal is to create a well-rounded environment that fosters academic and social success.
                <br>
                Our orphanage is also committed to finding permanent, loving homes for our children through adoption or
                fostering. We work closely with families to ensure that each child is placed in a safe and caring home.
                <br>
                We are proud to be a part of the community and are grateful for the support of our donors and
                volunteers.
            </p>
        </div>

    </section>


    <section id="donation">
        <h1>Donations</h1>
        <h2 class="secondary-heading"><em>"We make a living by what we get, but we make a life by what we give."</em>
        </h2>
        <div class="donation-container">
            <div id="money" class="donation-item">
                <img src="../images/money" alt="">
                <h2>Money</h2>
            </div>
            <div id="food" class="donation-item">
                <img src="../images/food" alt="">
                <h2>Food</h2>
            </div>
            <div id="clothes" class="donation-item">
                <img src="../images/clothes" alt="">
                <h2>Clothes</h2>
            </div>
            <div id="other-items" class="donation-item">
                <img src="../images/other_items" alt="">
                <h2>Other Items</h2>
            </div>
        </div>
        <div id="donation-form">

        </div>
        <?php
        if ($donationSuccess == true) {
            echo "<h2 class=\"donationMessage\"> Thanks for donating. We appreciate your generous contribution. Your support through donations holds great significance for us. </h2>";
        } elseif ($failure == true) {
            echo "<h2 class=\"donationMessage\"> Donation Failed. </h2>";
        }
        ?>
    </section>


    <section id="adoption">
        <h1>Adoption</h1>
        <h2 class="secondary-heading"><em>"The world may not change if you adopt a child,<br> but for that child their
                world will change"</em>
        </h2>
        <div class="adoption-container">
            <div id="male" class="adopt-kid">
                <img src="../images/boy.png" alt="">
                <h2>Male</h2>
            </div>
            <div id="female" class="adopt-kid">
                <img src="../images/girl.png" alt="">
                <h2>Female</h2>
            </div>
        </div>
        <div id="adoption-form">

        </div>
        <!-- <table border='1' frame='void' rules='all' class='childrenTable'>
            <tr>
                <th>Name</th>
                <th>Child Description</th>
            </tr>
            <tr>
                <td>Rohan</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae necessitatibus voluptas porro tempore, nobis nesciunt sapiente animi atque sit adipisci esse officiis autem reprehenderit alias eveniet voluptatem vitae consequuntur accusamus!</td>
            </tr>
            <tr>
                <td>Mohan</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate corporis odit iusto sit sint exercitationem, blanditiis est, deleniti qui fugit, quo aspernatur error vitae? Quae magni labore velit totam!</td>
            </tr>
            <tr>
                <td>Tina</td>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate corporis odit iusto sit sint exercitationem, blanditiis est, deleniti qui fugit, quo aspernatur error vitae? Quae magni labore velit totam!</td>
            </tr>
        </table> -->
        <div id="childinfo">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['maleChildrenForm'])) {
                    $age = $_POST['age'];
                    $sql = "SELECT name, childDescription FROM children WHERE gender='male' AND ageGroup='$age' AND adoptionStatus=0;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1' frame='void' rules='all' class='childrenTable'>
                            <tr>
                                <th>Name</th>
                                <th>Child Description</th>
                            </tr>";
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $description = $row['childDescription'];
                            echo "<tr>
                                <td>{$name}</td>
                                <td>{$description}</td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2> No child found in this age Group </h2>";
                    }
                }
                if (isset($_POST['femaleChildrenForm'])) {
                    $age = $_POST['age'];
                    $sql = "SELECT name, childDescription FROM children WHERE gender='female' AND ageGroup='$age' AND adoptionStatus=0;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border='1' frame='void' rules='all' class='childrenTable'>
                            <tr>
                                <th>Name</th>
                                <th>Child Description</th>
                            </tr>";
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $description = $row['childDescription'];
                            echo "<tr>
                                <td>{$name}</td>
                                <td>{$description}</td>
                            </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2> No child found in this age Group </h2>";
                    }
                }
            }
            ?>
        </div>
    </section>

    <div class="footer">
        <section id="footer">
            <div id="left-content">
                <div class="contact-headings">
                    <h1>Contact Us</h1>
                    <p>Send us a message</p>
                </div>
                <form action="index.php#footer" method="post">
                    <input type="text" name="fullname" placeholder="Full name">
                    <input type="email" name="email" placeholder="Your email">
                    <textarea id="contactUs-message" name="message" cols="30" rows="8" placeholder="Your message"></textarea>
                    <button type="submit" name="contactForm">Submit</button>
                </form>
            </div>
            <div id="right-content">
                <div class="logo-div">
                    <img class="logo-img" src="../images/ns_logo.png" alt="">
                </div>
                <div class="call-us">
                    <img src="../images/call.png" alt="">
                    <p>1908-5236-562</p>
                </div>
                <div class="email-us">
                    <img src="../images/email.png" alt="">
                    <p>nanhesapne92@gmail.com</p>
                </div>
                <div class="address">
                    <img src="../images/address.png" alt="">
                    <p>5th block, Sam street Sitapura, Jaipur</p>
                </div>

            </div>
        </section>
        <div>
            <?php
            if (isset($_POST["contactForm"])) {
                if ($contactFormSubmission === true) {
                    echo "<h2 class=\"donationMessage\">Thankyou for your response. We will try to contact you in 1-2 business days.</h2>";
                } else {
                    echo "<h2 class=\"donationMessage\">There was an error sending your response. Please try again.</h2>";
                }
            }

            ?>
        </div>
    </div>

    <section id="copyright">
        <p> &copy; Copyright 2023 All Rights Reserved Nanhe Sapne</p>
    </section>

    <?php
    $conn->close();
    ?>
    <script src="../js/index.js"></script>
</body>

</html>