<?php
session_start();
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
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>


        <video muted autoplay loop class="videofullscreen">
            <source src="video/sfondo (1).mov">
        </video>
        <br><br><br>
        <center>
            <h1 style="color: white;">Billion.</h1><br>
        </center>
        <center>
            <p style="color: white;">Flat 40% OFF on all premium brands.</p><br>
        </center>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="productsA.php">
                            <img src="immagini/Ford-Mustang-Shelby-GT500.png">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Americane</p>
                                <p>I veri cavalli americani, anche elettrici.</p>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="productsI.php">
                            <img src="immagini/lamborghini-revuelto.png">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Italiane</p>
                                <p>Con il loro fascino e lo loro linee profonde.</p>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="thumbnail">
                        <a href="productsG.php">
                            <img src="immagini/gtr.png">
                        </a>
                        <center>
                            <div class="caption">
                                <p id="autoResize">Giapponesi</p>
                                <p>Our exquisite collection of shirts.</p>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <br><br> <br><br><br><br>
    </div>
    <!-- <footer class="footer">
            <div class="container">
                
            <center> <p>This website is developed by lilmarcat</p></center> 
            
            </div>
           </footer> -->
</body>

</html>