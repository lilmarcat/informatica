<?php
session_start();
require 'DatabaseClassSingleton.php';
$con = DatabaseClassSingleton::getInstance()->getConnection();


if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];

$query = "SELECT * FROM billion_carrelli WHERE idUtente = " . $user_id;
$result = DatabaseClassSingleton::getInstance()->Select($query);
$idcarrellooo = $result[0]['id'];

$user_products_query = "select * from billion_contiene ut inner join billion_articoli it on it.codice=ut.idArticolo where ut.idCarrello=".$idcarrellooo;
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;



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
        <br>
        <div class="container">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Item Number</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    <?php
                    $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
                    $no_of_user_products = mysqli_num_rows($user_products_result);
                    $counter = 1;
                    while ($row = mysqli_fetch_array($user_products_result)) {

                    ?>
                        <tr>
                            <th><?php echo $counter ?></th>
                            <th><?php echo $row['nome'] ?></th>
                            <th><?php echo $row['prezzo'] ?></th>
                            <th><a href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                        </tr>
                    <?php $counter = $counter + 1;
                    } ?>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th>Rs <?php echo $sum; ?>/-</th>
                        <th><a href="success.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm Order</a></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <!-- <footer class="footer">
            <div class="container">
                
            <center> <p>This website is developed by lilmarcat</p></center> 
            
            </div>
           </footer> -->
    </div>
</body>

</html>