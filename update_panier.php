
<?php

include('ConnectDB.php');

if(isset($_POST['update_cart'])){
        $update_quantity = $_POST['cart_quantity'];
        $update_id = $_POST['cart_id'];
        
        $stock = mysqli_query($con, "SELECT stock , id , quantité FROM ordre INNER JOIN produit ON ordre.produit_id=produit.id WHERE id_o = '$update_id'");
        if(mysqli_num_rows($stock) > 0){
            while($row = mysqli_fetch_assoc($stock)){
                if($row['stock'] > $update_quantity){

                        if($row['quantité'] >= $update_quantity){
                                $NvQua = $row['quantité'] - $update_quantity;
                                $row['stock'] += $NvQua;
                        }elseif($row['quantité'] < $update_quantity){
                                $NvQua = $row['quantité'] - $update_quantity;
                                $row['stock'] += $NvQua;
                        }
                        mysqli_query($con, "UPDATE `produit` SET stock = '$row[stock]' WHERE id = '$row[id]'");
                        mysqli_query($con, "UPDATE `ordre` SET quantité = '$update_quantity' WHERE id_o = '$update_id'") or die('query failed');
                        header('location:panier.php');
                }else{
                        //header('location:panier.php');
                        ?>
                        <script>
                                alert("The Quantity Is More Than Stock!");
                        </script>
                        <?php
                }
            }
        }
        
}
?>