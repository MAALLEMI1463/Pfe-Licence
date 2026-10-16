<?php

include('ConnectDB.php');
$ID = $_GET['id'];
mysqli_query($con, "DELETE FROM contain WHERE produit_id=$ID");
mysqli_query($con, "DELETE FROM produit WHERE id=$ID");
header('location: AdminAfichagProd.php');

?>
