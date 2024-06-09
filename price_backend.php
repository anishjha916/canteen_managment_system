<?php
session_start();
include('conn.php');


//INSERT CODE
if (isset($_POST['addString'])) {
    
    $taxname = $_POST['taxname'];
    // echo $taxname ;
    $date = date("d-m-y");
    $check = "SELECT * FROM `price_table` WHERE `Price`= '$taxname'";
   mysqli_query($conn, $check);
    
    if(mysqli_affected_rows($conn) != 0){
        echo(1);
    }
    else{
    $query = "INSERT INTO `price_table`(`Price`, `added_by`, `added_on`, `status`) VALUES ('$taxname', '$_SESSION[user_name]', '$date','0')";
    mysqli_query($conn, $query);
    }
}

//READ CODE
if (isset($_POST['readrecord'])){
   
    $data = '<table id="table" class="table table-bordered table-striped bg-light ml-5 mr-5">
    <tr>
    <th>S.NO.</th>
    <th>Price</th>
    <th>ADDED BY</th>
    <th>ADDED ON</th>
    <th>UPDATED BY</th>
    <th>UPDATED ON</th>
    <th>Edit Action </th>
    <th>Delete Action</th>
    </tr>';

    $query = "SELECT * FROM `price_table` order by `id` desc";
    $result = mysqli_query($conn, $query);
  
  if(mysqli_num_rows($result)>0){
    $num =1;
    while($res = mysqli_fetch_array($result)){
        $data .= '<tr><td>'.$num. '</td>
        <td>'. $res['Price'].'</td>
        <td>'. $res['added_by'].' </td>
        <td>'. $res['added_on'].' </td>
        <td>'. $res['updated_by'].' </td>
        <td>'. $res['updated_on'].' </td>
        <td><button onclick="getTaxDetails('.$res['id'].')" class="btn btn-warning">Edit</button> </td>
        <td><button onclick="deleteTax('.$res['id'].')" class="btn btn-danger">Delete</button>  </td></tr>';
        $num++;
    
    } 
  } 
  $data .= '</table>';
  echo $data;

}

//DELETE CODE
if(isset($_POST['deleteid'])){
    $id = $_POST['deleteid'];
    $query = "DELETE FROM `tax_table` WHERE id = '$id'";
    mysqli_query($conn, $query);
}

//GET RECORD CODE

if(isset($_POST['get_string'])){

    $user_id = $_POST['id'];
    $query = "SELECT * FROM `price_table` WHERE `id` = '$user_id' ";
    // if(!$result = mysqli_query($conn,$query)){
    //     exit(mysqli_error());
    // }
$result = mysqli_query($conn, $query);
    $response = array(); 
    if(mysqli_num_rows($result)>0){
     
        while($res = mysqli_fetch_assoc($result)){
            $response = $res;
        }
    }
    else{
            $response['message'] = "Data not found";
    
    }
    echo json_encode($response);
   
}

// UPDATE CODE 
if(isset($_POST['update_string']) ){
   
    $id = $_POST['userid'];
  
    $date = date("d-m-y");
    $update_tax_name = $_POST['update_tax_name'];
//    echo $update_tax_name ;
   $check = "SELECT * FROM `price_table` WHERE `Price`= '$update_tax_name'";
    mysqli_query($conn, $check);
    
    if(mysqli_affected_rows($conn) != 0){
        echo(1);
    }
    else{

    $query = "UPDATE `price_table` SET `Price`='$update_tax_name', `updated_by` = '$_SESSION[user_name]', `updated_on` = '$date' WHERE `id` = '$id'";
    mysqli_query($conn, $query);
   
    }
    

}

?> 