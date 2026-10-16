<?php

include('ConnectDB.php');
session_start();
$ID = $_SESSION['admin_id'];

if(isset($_GET['logout'])){
    unset($ID);
    session_destroy();
    header('location:logADMIN.php');
 };

?>
