<?php

//inclure la page de connexion
include('ConnectDB.php');
//verifier si une session existe
if(!isset($_SESSION)){
   //si non demarer la session
    session_start();
}
//creer la session
if(!isset($_SESSION['panier'])){
   //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facture</title>
    <link rel="stylesheet" href="css_factur.css">
</head>
<body>
    <table class="body-wrap">
        <tbody><tr>
            
            <td class="container" width="600">
                <div class="content">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td class="content-wrap aligncenter">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td class="content-block">
                                            <h2>Thank you for your purchase</h2>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="content-block">
                                            <table class="invoice">
                                                <tbody><tr>
                                                <?php
                                                //hna posible nzid date b inner join m3a facture
                                                    $ID = $_SESSION['user_id'];
                                                    $cart_query = mysqli_query($con, "SELECT * FROM consommateur INNER JOIN ordre ON consommateur.id_c=$ID AND ordre.consommateur_id=$ID") or die('query failed');
                                                    $fetch_cart = mysqli_fetch_assoc($cart_query);
                                                ?>
                                                    <td><?php echo $fetch_cart['username']; ?> <?php echo $fetch_cart['prenom']; ?><br>Invoice #<?php echo $fetch_cart['id_o']; ?><br><?php echo $fetch_cart['created_at']; ?></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>
                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
        $USER_id = $_SESSION['user_id'];
         $cart_query = mysqli_query($con, "SELECT * FROM consommateur INNER JOIN ordre ON consommateur.id_c=$USER_id AND ordre.consommateur_id=$USER_id") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
        ?>
                                                                <tr>
                                                                    <td><?php echo $fetch_cart['name']; ?></td>
                                                                    <td class="alignright"><?php echo $fetch_cart['price']; ?> DZD</td>
                                                                    <td style="padding-left: 20px;"><?php echo $fetch_cart['quantité']; ?></td>
                                                                    <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantité']); ?> DZD</td>
                                                                </tr>
                                                                <?php
                                                                    $grand_total += $sub_total;
                                                                }
                                                                }else{
                                                                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">Le facture est Vide</td></tr>';
                                                                }
                                                                ?>
                                                                <tr class="total">
                                                                  <th>Total : <?php echo $grand_total; ?> DZD</th>
                                                                </tr>
                                                            </tbody>
                                                          </table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                                          
                                    <tr>
                                        <td class="content-block">
                                            www.Farmy.com  ,Blida, Algérie
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button style="background:green;color:#fff;width:75px;height:25px;border-radius:5px;">Print</button></td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                    </tbody></table>
                  </div>
            </td>
            <!-- ndir td fiha paie-->
        </tr>
    </tbody></table>
    
</body>
</html>