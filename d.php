

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="styleDash.css">
    <style>
        #bb:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
  
        

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>quantité</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <tr>
                                <td>gffgfg</td>
                                <td>jjgjg</td>
                                <td>fkfk</td>
                                <td><span><form action='ValidOrder.php' method='post'>
                                <input type='hidden' name='id_o' value=$row[id_o]>
                                <button id='bb' type='submit' name='update_statut' style='width: 85px;height: 25px;background: #8de02c;color: white;border:none;border-radius: 4px;font-size: 13px;font-weight: 100;'>OK</button>
                            </form></span></td>
                            </tr>
                            <tr>
                                <td>gffgfg</td>
                                <td>jjgjg</td>
                                <td>fkfk</td>
                                <td><span><form action='ValidOrder.php' method='post'>
                                <input type='hidden' name='id_o' value=$row[id_o]>
                                <button id='bb' type='submit' name='update_statut' style='width: 85px;height: 25px;background: #8de02c;color: white;border:none;border-radius: 4px;font-size: 13px;font-weight: 100;'>OK</button>
                            </form></span></td>
                            </tr>
                            <tr>
                                <td>gffgfg</td>
                                <td>jjgjg</td>
                                <td>fkfk</td>
                                <td><span><form action='ValidOrder.php' method='post'>
                                <input type='hidden' name='id_o' value=$row[id_o]>
                                <button id='bb' type='submit' name='update_statut' style='width: 85px;height: 25px;background: #8de02c;color: white;border:none;border-radius: 4px;font-size: 13px;font-weight: 100;'>OK</button>
                            </form></span></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                
            </div>
        
    

    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>