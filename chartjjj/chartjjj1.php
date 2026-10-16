<?php
require_once "db.php"
?>
<?php
$query = "SELECT p.nom AS product_name, MONTHNAME(o.created_at) AS order_month, SUM(o.quantité) AS total_quantity
    FROM ordre o
    JOIN produit p ON o.produit_id = p.id
    WHERE EXTRACT(MONTH FROM o.created_at) = EXTRACT(MONTH FROM CURRENT_DATE)
    GROUP BY product_name, order_month;";
$result = mysqli_query($conn, $query);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],

            <?php
            while ($chart = mysqli_fetch_assoc($result)) {
                echo " ['" . $chart['product_name'] . "'," . $chart['total_quantity'] . "],";
            }
            ?>
        ]);

        var options = {
            title: 'sels of the mounth'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>


<div id="piechart" style="width: 900px; height: 500px;"></div>