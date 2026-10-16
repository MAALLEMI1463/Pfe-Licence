<?php

include('ConnectDB.php');
session_start();
$ID = $_SESSION['user_id'];

if(isset($_GET['logout'])){
    unset($ID);
    session_destroy();
    header('location:index2.php');
 };

?>