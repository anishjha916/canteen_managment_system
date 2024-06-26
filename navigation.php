<?php
session_start();

?>
<?php


if ($_SESSION["user_name"] == '' && $_SESSION["login_type"] == '') {
    header('location:../login-Signup/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <link href="../css_folders/navigaitonTest.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="d-flex">
        <ul class="nav flex-column nav-pills nav-justified" id="ul_id">
            <li class="nav-item active">
                <a class="nav-link " aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Master"><img class="img" src="../../College_mess_files/rungta.png">
                </a>

            </li>

            <!-- <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Home"><i class="fas fa-home"></i>
            </a> -->
            <li class="nav-item btn-group dropend">
                <button type="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-home"></i>
                </button>
                <ul class="dropdown-menu" id="opt_id">
                    <li><a class="dropdown-item" href="../pages/master.php"><i class="fas fa-user me-2"></i>Master</a></li>
                    <li><a class="dropdown-item" href="../pages/master_product.php"><i class="fas fa-cookie-bite me-2"></i>Product Table</a></li>
                    <li><a class="dropdown-item" href="../pages/master_category.php"><i class="fas fa-solid fa-burger me-2"></i>Category Table</a></li>
                    <li><a class="dropdown-item" href="../pages/master_unit.php"><i class="fas fa-light fa-scale-unbalanced-flip me-2"></i>Unit Table</a></li>
                    <li><a class="dropdown-item" href="../pages/master_price.php"><i class="fas fa-solid fa-sack-dollar me-2"></i>Price Table</a></li>
                </ul>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Admin"><i
                        class="fas fa-user"></i>
                </a>


            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="product"><i class="fas fa-cookie-bite"></i>
                </a>
            </li>

            <li class="nav-item">

                <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Tooltip on right">
                    <i class="fas fa-light fa-scale-unbalanced-flip"></i>
                </a>
            </li>
           
            <li class="nav-item btn-group dropend">
                <button type="button" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-solid fa-sack-dollar"></i>
                </button>
                <ul class="dropdown-menu" id="opt_id">
                    <li><a class="dropdown-item" href="../billing/index (1).php"><i class="fas fa-solid fa-basket-shopping me-2"></i>Sale</a></li>
                    <li><a class="dropdown-item" href="../billing/summury_table.php"><i class="fas fa-solid fa-table me-2"></i>Sale report</a></li>
                    <li><a class="dropdown-item" href="../billing/stock.php"><i class="fas fa-solid fa-table me-2"></i>Stock report</a></li>
                    <li><a class="dropdown-item" href="Todaystock.php"><i class="fas fa-solid fa-table me-2"></i>Today Sale</a></li>
                </ul>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login-Signup/logout.php" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Log out">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>



        </ul>
        <!-- Default dropend button -->


    </div>
</body>
<script>
    // Add active class to the current button (highlight it)
    var ul_id = document.getElementById("ul_id");
    var li = ul_id.getElementsByTagName("a");
    for (var i = 0; i < li.length; i++) {
        li[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
         
            current[0].className = current[0].className.replace("active", "");
            this.className += " active";
            console.log(this.className);
//             console.log($("li").has(".active"));
//             $("li").has(".nav-link active").css({"background":"#eee",
//   /* border: 2px solid black; */
//   "color": "rgb(255, 218, 7)",
//   "text-decoration": "none",
//   "font-size": "23px",
//   "border-radius": "20px",
//   "margin-right": "2px"});
          
        });

    }

    // var opt_id = document.getElementById("opt_id");
    // var opt_li = opt_id.getElementsByTagName("a");
    // for (var i = 0; i < opt_li.length; i++) {
    //     li[i].addEventListener("click", function () {
    //         var current = document.getElementsByClassName("active");
    //         console.log(current);
    //         // current[0].className = current[0].className.replace("active", "");
    //         // this.className += "active";
    //     });

    // }

    // $('.fas').hover(function(){ 
    // $('.nav-link', this).trigger('click'); 
    // //  $(this).toggleClass('fa-spin')
    // });
    // const add = document.getElementById('add');
    // if (add.childNodes[3].style.fontSize = "x-large") {
    //     add.childNodes[3].style.fontSize = "medium";
    // }
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // js to hover
    //    over icons and show a dropdown
    $("ul.nav > li.nav-item").on("mouseenter", function (event) {
        //console.log(event.currentTarget.children[0])
        let $target = $(event.currentTarget.children[0]);
        $target.trigger('click');

    })

    $("ul.nav > li.nav-item").on("mouseleave", function () {
        let $target = $(event.currentTarget.children[0]);
        $target.trigger('click');
        // $target.attr("aria-describedby", "");
    })

    
   

</script>

</html>