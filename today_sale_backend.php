<?php
include ("conn.php" );
$sql = "SELECT receipt_table. *, product_table.product_name AS pro_name, receipt_table.price as price_pro, sum(receipt_table.quantity) as quan , sum(receipt_table.total) as tot_price FROM receipt_table, product_table WHERE receipt_table.product_id = product_table.id AND DATE(receipt_table.added_on) = DATE(NOW()) GROUP BY receipt_table.product_id ORDER BY added_on ASC;";
$result = mysqli_query($conn ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 


