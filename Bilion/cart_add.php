<?php
    session_start();
    require 'DatabaseClassSingleton.php';
    $con = DatabaseClassSingleton::getInstance()->getConnection();

    $item_id=$_GET['id'];
    
    $user_id = $_SESSION['id'];
    
    $cart_id=rand(1,999999);
    $_SESSION['carrelloid']=$cart_id;
    
    
    
    $query = "SELECT * FROM billion_carrelli WHERE idUtente = ".$user_id;
    $result = DatabaseClassSingleton::getInstance()->Select($query);
    
    if(count($result) > 0) {
      // L'utente ha già un carrello nel database
      $idcarrellooo = $result[0]['id'];
      
      $add_to_cart_query="insert into billion_contiene(idCarrello,idArticolo) values (".$idcarrellooo.",".$item_id.")";
      $invia1 = mysqli_query($con, $add_to_cart_query) or die(mysqli_error($con));
    } else {
      // L'utente non ha ancora un carrello nel database
      $crea_carrello="insert into billion_carrelli(id,idUtente) values (".$cart_id.",".$user_id.")";
      $invia2 = mysqli_query($con, $crea_carrello) or die(mysqli_error($con));

      $add_to_cart_query="insert into billion_contiene(idCarrello,idArticolo) values (".$cart_id.",".$item_id.")";
      $invia3 = mysqli_query($con, $add_to_cart_query) or die(mysqli_error($con));
    }

    header('location: cart.php');
?>