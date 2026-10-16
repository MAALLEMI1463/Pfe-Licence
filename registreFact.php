<?php

include('ConnectDB.php');
if(isset($_GET['btnFact'])){
    $ID_used = $_POST['id_us'];
    $ordre_query = mysqli_query($con, "SELECT id_o, SUM(price * quantité) FROM consommateur INNER JOIN ordre ON consommateur.id_c=$ID_used AND ordre.consommateur_id=$ID_used");
    
        $row = mysqli_fetch_assoc($ordre_query);
            $insert = "INSERT INTO facture (id_order , ttc) VALUES ('$row[id_o]','$row[SUM(price * quantité)]')";
            mysqli_query($con, $insert);
        
           // header('location: facture.php');
    
    
}
//<!-- <from action="registreFact.php" method="post">
//<input type="text" name="id_us" value="<?php echo $USER_id; ?>
//<!-- <button type="submit" name="btnFact"  style="text-decoration:none;background:red;font-size: 15px;font-weight: bolder;border-radius: 6px;color:white;padding: 10px 20px;position:absolute;margin:50px;position:relative;margin-left:0px;margin-top:50px;">Facture</button>
// </from>  -->
?>