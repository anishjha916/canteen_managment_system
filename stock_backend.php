<?php


$con = mysqli_connect('localhost', 'root', '', 'hamid_db');

if(isset($_POST['save_student']))

{
    // echo $_POST['product'];
    $name = mysqli_real_escape_string($con, $_POST['product_id']);
    $email = mysqli_real_escape_string($con, $_POST['quantity']);
   
// echo $name;
    if($name == NULL || $email == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

   



    $query = "INSERT INTO stock_table (product_id,quantity,added_on) VALUES ('$name','$email',NOW())";

    $query_run = mysqli_query($con, $query);



    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => ' Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => ' Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

// if (isset($_POST['save_student'])) {
// $name="SELECT master_table.id, product_table.product_name FROM master_table INNER JOIN product_table ON product_table.id = master_table.product_id ORDER BY master_table.id desc";
// $result =mysqli_query($con, $name);
// $arr=array();

// while($res = mysqli_fetch_array($result)){
    
//     array_push($arr, $res);
//    }

//    echo json_encode($arr);
// }

// $stock="UPDATE master_table set quantity = (SELECT quantity from stock where product = product)";

// $result = mysqli_query($con, $stock);
// echo $result;



if(isset($_POST['update_student']))
{

    // echo $student_id;
    
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    // $name = mysqli_real_escape_string($con, $_POST['product']);
    // $name = mysqli_real_escape_string($con, $_POST['product']);
    $email = mysqli_real_escape_string($con, $_POST['quantity']);
  

    $neha_ki_query = "SELECT product_id from stock_table where id =  '$student_id'";
    $neha_result = mysqli_query($con, $neha_ki_query);
     $neha_res = mysqli_fetch_row($neha_result);
     

    if( $email == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
$anish = "SELECT `quantity` From `stock_table` WHERE `product_id` = '$neha_res[0]'";
    $result =mysqli_query($con, $anish);
    $res1=mysqli_fetch_array($result);
   
   
    $sum = (int)$email+(int)$res1[0];
    $query = "UPDATE stock_table SET  `quantity`='$sum' WHERE `product_id` ='$neha_res[0]'";
    $query_run = mysqli_query($con, $query);
//    $q = "UPDATE `master_table` SET  `quantity`='$sum' WHERE `product_id` ='$neha_res[0]'";
//     $que = mysqli_query($con, $q);
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => ' Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Updated'
        ];
        echo json_encode($res);
        return;
    }
    
}

if (isset($_POST['readrecord'])) {

    $query =  "SELECT product_table.id,product_table.product_name FROM stock_table INNER JOIN product_table ON product_table.id = stock_table.product_id";
    $result = mysqli_query($conn, $query);
    $arr =array(); 
    while($res = mysqli_fetch_array($result)){
     
     array_push($arr, $res);
    }
 
    echo json_encode($arr);
 }
 // PRODUCT SHOW 
if (isset($_POST['display0'])) {
    $sql = "select `product_name` from product_table";
    $result = mysqli_query($con, $sql);
    $result_arr = array();
    while ($row = mysqli_fetch_array($result)) {
        $result_arr[] = $row;
    }
    echo json_encode($result_arr);
}

if(isset($_GET['student_id']))
{
    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM stock_table WHERE id='$student_id'";
    
 
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {  
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => ' Fetch Successfully by id',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => ' Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}



?>
