<?php
require 'DatabaseClassSingleton.php';
session_start();
// Verifica se l'id del prodotto è stato ricevuto tramite GET
if (isset($_GET['id'])) {
  // Recupera l'id del prodotto dalla query string
  $id_prodotto = $_GET['id'];

  // Esegue la query per recuperare il nome del prodotto

$result = DatabaseClassSingleton::getInstance()->Select("SELECT * FROM billion_articoli WHERE codice = ".$_GET['id']);

// Recupera il nome del prodotto dal risultato della query
if(count($result) > 0) {
  // Stampa il nome del prodotto
  $n=$result[0]['nome'];
  $i=$result[0]['immagine'];
  $p=$result[0]['prezzo'];
  $txt=$result[0]['testo'];
  $q=$result[0]['quantita'];

  //echo $n;
    }
}
?>

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

        <div class="container">

                <h1><?php echo $n; ?> </h1>
                <img src="immagini/<?php echo $i; ?>" alt="' . <?php echo $i; ?> . '"width="500" height="312"><br>
                <b>Price:$<?php echo $p; ?></b>
                <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                  Quantità rimasta: <?php echo $q; ?></p>
                
                <br>
                <br>
                <p><?php echo $txt; ?></p>
                <?php if($q>0){
                  echo '<button type="button" name="button" id="button" onclick="location.href=\'cart_add.php?id='.$id_prodotto.'\'">Aggiungi al carrello</button>';
                } ?>
                





        </div>
        
        <br><br><br><br><br><br><br><br>
        <!-- <footer class="footer">
            <div class="container">
                
            <center> <p>This website is developed by lilmarcat</p></center> 
            
            </div>
           </footer> -->
    </div>
</body>

</html>
