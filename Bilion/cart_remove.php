<?php
    session_start();
    require 'DatabaseClassSingleton.php';
    $con = DatabaseClassSingleton::getInstance()->getConnection();

    $item_id=$_GET['id'];
    $cart=$_SESSION['carrelloid'];

    //echo $item_id;
    //echo $cart;

    $delete_query="delete from billion_contiene where idCarrello=".$cart." and idArticolo=".$item_id;
    //echo '<br>'.$delete_query.'<br>';
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));

    header('location: cart.php');
?>