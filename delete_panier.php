<?php

include('ConnectDB.php');
    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        
        $sel1 = mysqli_query($con, "SELECT * FROM ordre INNER JOIN produit ON ordre.produit_id=produit.id WHERE id_o=$remove_id");
        while($row = mysqli_fetch_assoc($sel1)){
            $row['stock'] = $row['stock'] + $row['quantité'];
            mysqli_query($con, "UPDATE produit SET stock='$row[stock]' WHERE id='$row[id]'") or die('query failed');

        }
        mysqli_query($con, "DELETE FROM `contain` WHERE ordre_id = '$remove_id'") or die('query failed');
        mysqli_query($con, "DELETE FROM `facture` WHERE id_order = '$remove_id'") or die('query failed');
        mysqli_query($con, "DELETE FROM `ordre` WHERE id_o = '$remove_id'") or die('query failed');
        header('location:panier.php');
    }


?>