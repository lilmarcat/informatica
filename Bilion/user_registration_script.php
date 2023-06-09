<?php
session_start();
require 'DatabaseClassSingleton.php';
$con = DatabaseClassSingleton::getInstance()->getConnection();


$nome = $_POST['nome'];
$email = $_POST['email'];
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (!preg_match($regex_email, $email)) {
    echo "Incorrect email. Redirecting you back to registration page...";
?>  
    <meta http-equiv="refresh" content="2;url=signup.php" />
<?php
}
$password = md5(md5($_POST['password']));
if (strlen($password) < 6) {
    echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
<?php
}

$duplicate_user_query = "select id from billion_utenti where email='".$email."'";
$duplicate_user_result = mysqli_query($con, $duplicate_user_query) or die(mysqli_error($con));
$rows_fetched = mysqli_num_rows($duplicate_user_result);
if ($rows_fetched > 0) {
    //duplicate registration
    //header('location: signup.php');
?>
    <script>
        window.alert("Email already exists in our database!");
    </script>
    <meta http-equiv="refresh" content="1;url=signup.php" />
<?php
} else {
    $user_registration_query = "insert into billion_utenti(ID,nome,email,password) values ('0','$nome','$email','$password')";
    //die($user_registration_query);
    $user_registration_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    //echo "User successfully registered";
    $_SESSION['email'] = $email;
    //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
    $_SESSION['id'] = mysqli_insert_id($con);
    //header('location: products.php');  //for redirecting
?>
    <meta http-equiv="refresh" content="3;url=index.php" />
<?php
}
header('location: index.php');
?>