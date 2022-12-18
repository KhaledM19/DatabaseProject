<?php
@include 'config.php';

session_start();

if(isset($_POST['buy'])){
    
$price =  mysqli_real_escape_string($conn, $_POST['totalprice']);
$price = intval($price);
$insert2= "INSERT INTO purchase VALUES ('1','1','$price')";
mysqli_query($conn, $insert2);
header('location:homepage.php');

}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Now - Shopping Cart</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="css/purchasestyle.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- Header -->
    <header>
    <form action="" method="post">  
        <!-- Nav -->
        <div class="nav container">
            <a href="#" class="logo">MouKhane</a>
            <!-- Cart-Icon -->
            <i class='bx bx-shopping-bag' id="cart-icon"></i>
            <!-- Cart -->
            <div class="cart">
                <h2 class="cart-title">Your Cart</h2>
                <!-- Content -->
                <div class="cart-content">
                    
                </div>
                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price" name = "totalprice" >$0</div>
                </div>
                <!-- Buy Button -->
                <button type="submit" class="btn-buy" name = "buy" >Buy Now</button>
                <!-- Cart Close-->
                <i class='bx bx-x' id="close-cart"></i>
            </div>
        
        </div>
    </header>
    <!-- Shop -->
    <section class="shop container">
        <h2 class="section-title">Purchase Products</h2>
        <!-- Content -->
        <div class="shop-content">
            <!-- Box 1 -->
            <div class="product-box">
                <img src="img/wires.jpg" alt="" class="product-img">
                <h2 class="product-title">ELECTRIC WIRES</h2>
                <span class="price">$2</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 2 -->
            <div class="product-box">
                <img src="img/LED.jpg" alt="" class="product-img">
                <h2 class="product-title">LED LIGHTS</h2>
                <span class="price">$5</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 3 -->
            <div class="product-box">
                <img src="img/resistor.jpg" alt="" class="product-img">
                <h2 class="product-title">1K RESISTOR</h2>
                <span class="price">$3</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 4 -->
            <div class="product-box">
                <img src="img/AND.jpg" alt="" class="product-img">
                <h2 class="product-title">AND GATE IC</h2>
                <span class="price">$1</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 5 -->
            <div class="product-box">
                <img src="img/OR.jpg" alt="" class="product-img">
                <h2 class="product-title">OR GATE IC</h2>
                <span class="price">$1</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 6 -->
            <div class="product-box">
                <img src="img/NOT.jpg" alt="" class="product-img">
                <h2 class="product-title">NOT GATE IC</h2>
                <span class="price">$1</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 7 -->
            <div class="product-box">
                <img src="img/soldering.jpg" alt="" class="product-img">
                <h2 class="product-title">SOLDERING KIT</h2>
                <span class="price">$20</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
            <!-- Box 8 -->
            <div class="product-box">
                <img src="img/DIP.jpg" alt="" class="product-img">
                <h2 class="product-title">DIP SWITCHES</h2>
                <span class="price">$2</span>
                <i class='bx bx-shopping-bag add-cart'></i>
            </div>
        </div>
    </section>
    <!-- Link TO JS -->
    <script src="js/mainpurchase.js"></script>
</body>
</html>