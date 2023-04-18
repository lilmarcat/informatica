<?php
session_start();
session_destroy();

if (isset($_GET["msg"]))
    echo $_GET["msg"];
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="sceltaSito.css">

</head>


<body>

    <div class="wrapper">
        

        <div class="text-center mt-4 name">
            Scegli il sito:
        </div>

        
            <input type="button" class="btn mt-3" onclick="location.href='data/index.php'" value="cinema" />

            <input type="button" class="btn mt-3" onclick="location.href='social/index.php'" value="social" />

            <input type="button" class="btn mt-3" onclick="location.href='socialNetwork/index.php'" value="social2" />

            <input type="button" class="btn mt-3" onclick="location.href='Bilion/index.php'" value="Bilion." />
        
    </div>
</body>

</html>