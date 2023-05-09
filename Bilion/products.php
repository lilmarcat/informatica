<?php
session_start();
require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/napoli.webp" />
    <title>Blilion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
        body {
            background-image: url("img/dollari-sfondo.png");
        }
    </style>

</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>

        <div class="container">
            <div class="jumbotron">
                <h1 id="saluto"></h1>


                <script>
                    // ottieni l'ora corrente
                    var oraCorrente = new Date().getHours();

                    // verifica se è di giorno o di notte
                    if (oraCorrente >= 6 && oraCorrente < 18) {
                        document.getElementById("saluto").innerHTML = "Buongiorno!";
                    } else {
                        document.getElementById("saluto").innerHTML = "Buonasera!";
                    }
                </script>


                <p>We have the best cars for you. No need to hunt around, we have all in one place.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <?php include 'getProd.php' ?>

            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <footer class="footer">
            <div class="container">

                <center>
                    <p>This website is developed by lilmarcat</p>
                </center>

            </div>
        </footer>
    </div>
</body>

</html>