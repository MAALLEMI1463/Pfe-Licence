<?php

include('ConnectDB.php');


?>

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
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>

                        </span>
                        <span class="title">ADMIN</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="user22.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="AffOrdAdm.php">
                        <span class="icon">
                            <ion-icon name="bag-outline"></ion-icon>
                        </span>
                        <span class="title">Order</span>
                    </a>
                </li>

                <li>
                    <a href="categorie.php">
                        <span class="icon">
                            <ion-icon name="grid-outline"></ion-icon>
                        </span>
                        <span class="title">Categorie</span>
                    </a>
                </li>
                <li>
                    <a href="stat.php">
                        <span class="icon">
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        </span>
                        <span class="title">Statistique</span>
                    </a>
                </li>

                <li>
                    <a href="AdminAfichagProd.php">
                        <span class="icon">
                            <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        </span>
                        <span class="title">produit</span>
                    </a>
                </li>

                <li>
                <?php
                    session_start();
                    $id3 = $_SESSION['admin_id'];
                     $result3 = mysqli_query($con, "SELECT * FROM admin WHERE id_a = '$id3'");
                    $row3 = mysqli_fetch_array($result3);
                    echo"
                    <a href='UpCountAdm.php? id=$row3[id_a]'>
                        <span class='icon'>
                            <ion-icon name='lock-closed-outline'></ion-icon>
                        </span>
                        <span class='title'>Password</span>
                    </a>";?>
                </li>

                <li>
                    <a href="SignOut.php?logout=<?php echo $id3; ?>" onclick="return confirm('Are You Sure to Quit Dashboard ?');">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>

                        <ion-icon name=""></ion-icon>
                    </label>
                </div>

                <div class="user">

                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php $sel = "SELECT COUNT(id_c) FROM consommateur"; 
                           $res2 = mysqli_query($con, $sel); $row2 = mysqli_fetch_array($res2); echo$row2['COUNT(id_c)']; ?></div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php $sel1 = "SELECT COUNT(id_o) FROM ordre"; 
                           $res1 = mysqli_query($con, $sel1); $row1 = mysqli_fetch_array($res1); echo$row1['COUNT(id_o)']; ?></div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php $sel2 = "SELECT COUNT(id_co) FROM comentair"; 
                           $res4 = mysqli_query($con, $sel2); $row4 = mysqli_fetch_array($res4); echo$row4['COUNT(id_co)']; ?></div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$<?php $sel4 = "SELECT SUM(price * quantité) FROM ordre"; 
                           $res5 = mysqli_query($con, $sel4); $row5 = mysqli_fetch_array($res5); echo$row5['SUM(price * quantité)']; ?></div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

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
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM ordre");
                            while($row = mysqli_fetch_array($result)){
                            echo"
                            <tr>
                                <td>$row[name]</td>
                                <td>$row[price]</td>
                                <td>$row[quantité]</td>
                                <td><span><form action='ValidOrder.php' method='post'>
                                <input type='hidden' name='id_o' value=$row[id_o]>
                                <button id='bb' type='submit' name='update_statut' style='width: 85px;height: 25px;background: #8de02c;color: white;border:none;border-radius: 4px;font-size: 13px;font-weight: 100;'>$row[status]</button>
                            </form></span></td>
                            </tr>
                            ";}
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                    <?php
                            $result = mysqli_query($con, "SELECT * FROM consommateur");
                            while($row = mysqli_fetch_array($result)){
                            echo"
                        <tr>
                            <td width=60px'>
                                <div class='imgBx'><img src='img/customers/pngwing.com.png'></div>
                            </td>
                            <td>
                                <h4>$row[username] $row[prenom] <br> <span>$row[adress]</span> </h4>
                            </td>
                        </tr>
                        ";}
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>