<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../css_folders/master_product.css" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css_folders/summrydata.css">
      <!-- from navigation page  -->
      <link rel="stylesheet" href="../css_folders/navigation.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- the data table cdn -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>

</head>


<body>
    <div class="master-body">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <?php
        include('./navigation.php');
        include("../conn.php");
        ?>
        <?php


        if ($_SESSION["user_name"] == '' && $_SESSION["login_type"] == '') {
            header('location:../login-Signup/login.php');
        }
        ?>
        <div class="container">
            <div class="tables mt-3">
                <h2 class="title1" style="align-items: center;">Today Sale</h2>

                <div class="table-responsive m-5">

                    <table class="table" style="box-shadow:0 0 5px #a8a8a8;" border=3 id="mydata">
                        <thead>
                            <tr>
                                <th>S No.</th>

                                <th>Product Name</th>

                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Date</th>

                                <!-- <th>Operations</th> -->
                            </tr>
                        </thead>
                        <tbody id="table_body" class="Data">

                        </tbody>



                    </table>



                </div>
            </div>

        </div>




        <script>
            $(document).ready(function() {
                showitem();
            });


            function showitem() {
                var displaydata = "displaydata";

                $.ajax({
                    url: "../today_sale_backend.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        displaydata: displaydata
                    },

                    success: function(response) {
                        if (response.length > 0) {
                            var data = '';
                            var S_No = 0;


                            for (var a = 0; a < response.length; a++) {
                                S_No++;
                                var product_name = response[a].pro_name;
                                alert(product_name)
                                var quantity = response[a].quan;
                                var price = response[a].price_pro;
                                var total_price = response[a].tot_price;
                                var added_on = response[a].added_on;

                                data = data + '<tr><td>' + S_No + '</td><td>' + product_name + '</td><td>' + quantity + '</td><td>' + price + '</td><td>' + total_price + '</td><td>' + added_on + '</td></tr>';

                            }
                            $("#table_body").html(data);

                            let table = new DataTable('#mydata', {
                                responsive: true,
                                "order": [],
                                dom: 'lBfrtip',
                                buttons: ['excel', 'pdf', 'print'],
                            });






                        }
                    }
                });
            }
        </script>






        <!--center-->
    </div>
</body>


</html>