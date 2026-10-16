<?php

include('ConnectDB.php');

if(isset($_POST['update_statut'])){
    $ID = $_POST['id_o'];
    $S2 = "SELECT status FROM ordre WHERE id_o='$ID'";
    $select2 = mysqli_query($con, $S2);
    $row1 = mysqli_fetch_assoc($select2);
    if($row1['status'] == 'Non Dilévred'){
    $update = "UPDATE ordre SET status='Délivred'  WHERE id_o=$ID";
    mysqli_query($con, $update);
    $select = "SELECT SUM(price * quantité) FROM ordre INNER JOIN consommateur ON ordre.consommateur_id=consommateur.id_c WHERE id_o=$ID";
    $select1 = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($select1);
    $ttc = $row['SUM(price * quantité)'];
    $insert = "INSERT INTO facture (ttc , id_order) VALUES ('$ttc','$ID')";
    mysqli_query($con, $insert);}
    header('location: dash.php');



}

?>