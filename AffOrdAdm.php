<?php
include('ConnectDB.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css_panier2.css">
</head>
<body>
    <div class="container">
    <div class="shopping-cart">
        <?php
         $result = mysqli_query($con, "SELECT * FROM consommateur");
         
         while($row = mysqli_fetch_array($result)){
         echo"
        <div style='padding:20px; margin-left:90px;'><h3>$row[username] $row[prenom]</h3> $row[email]<br> $row[adress]</div>";
        ?>
    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Quantité</th>
            <th>Prix Total </th>
        </thead>
        <tbody>
        
            <tr>
            <?php
                $result1 = mysqli_query($con, "SELECT * FROM consommateur INNER JOIN ordre ON consommateur.id_c=ordre.consommateur_id WHERE consommateur_id=$row[id_c]");
                $grand_total = 0;
                while($row1 = mysqli_fetch_array($result1)){
                        
                        $sub_total = ($row1['price'] * $row1['quantité']);
                        
                echo"
                <td>$row1[name]</td>
                <td>$row1[price] DA</td>
                <td>$row1[quantité]</td>
                <td>$sub_total DA</td>
            </tr>";
            $grand_total += $sub_total;}
            
        
            ?>
            <tr class="table-bottom">
                <td colspan="4">prix total : <?php echo $grand_total; ?> DZD</td>
            </tr>
            
        </tbody>
    </table>
    <?php
         }
         ?>
  
  
    </div>
  
</div>
  
</body>
</html>