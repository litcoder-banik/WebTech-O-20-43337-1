<?php 
    $ezl = new mysqli("localhost", "root", "", "ezlearning");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM news";
    $qry = $ezl->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Home.css">
    <title>Home</title>
</head>

<body style="font-family: Verdana">

    
        <span><b>Ez Learning Center</b></span>
        <div style="padding: 5px; text-align:right;">

            <a href="/ProjectEZ/View/Login.php">
                <button class="button button1">
                    Login
                </button>
            </a>

            <a href="/ProjectEZ/View/Registration.php">
                <button class="button button2">
                    Sign Up
                </button>
            </a>
        </div>

    <div style="padding: 5px; text-align:center">
        <?php include '../ProjectEZ/View/Header.php'; ?>
    </div>

    <br><br><br><br>

    <?php include '../ProjectEZ/View/Footer.php' ?>


</body>

</html>