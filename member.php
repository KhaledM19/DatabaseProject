<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, $_POST['pass']);

    $select = " SELECT customerID FROM customer WHERE email = '$email' ";
    $select2 = " SELECT email FROM member WHERE email = '$email' ";
    $result = mysqli_query($conn, $select);
    $result2 = mysqli_query($conn, $select2);
    
    $count = "SELECT * FROM member";
    $re = mysqli_query($conn, $count);
    $i = mysqli_num_rows($re);
    if (mysqli_num_rows($result2) > 0) {
        $error[] = 'already a member please press the click here button';

    }else{
        if (mysqli_num_rows($result) > 0) {
            $i++;
            $row = mysqli_fetch_row($result);
            $row = intval($row[0]);
            $ins = " INSERT INTO member VALUES ('$i','$email', '$pass' ,'$row') ";
            mysqli_query($conn, $ins);
        } else {
            $error[] = 'not a customer';

        }
    
    }

    header('location:becomeamember.php'); 
    
}else{
    if(isset($_POST['submitmember'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass  = mysqli_real_escape_string($conn, $_POST['pass']);


        $select2 = " SELECT email FROM member WHERE email = '$email' ";
        $result2 = mysqli_query($conn, $select2);
        
        $count = "SELECT * FROM member";
        $re = mysqli_query($conn, $count);
        if (mysqli_num_rows($result2) > 0) {
            header('location:becomeamember.php'); 
    
        }else{
            $error[] = 'please press sign up button';
        }
    
        
        
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Webpage Design</title>
    <link rel="stylesheet" href="stylemember.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">MouKhane</h2>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
            ?>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="homepage.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="service.php">SERVICE</a></li>
                    <li><a href="member.php" class="active">MEMBERSHIP</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>

            

        </div> 
        <div class="content">
            <h1><span>MouKhane's</span> <br>Become A Member! feature:</h1>
            <p class="par">Our Become A Member! program gives our members accesses to exclusive features like:
                <br><br>       -Participating in competitions where rewards will be handed to the winner 
                <br>        -Registering in Courses taught by professional electronics engineers</p>

                

                <div class="form">
                    <form action="" method="post">
                    <h2>Become a Member!</h2>
                    <input type="email" name="email" placeholder="Enter email Here" required> 
                    <input type="password" name="pass" placeholder="Enter Password Here" required>
                    
                    <button class="btnn" name = "submit"><a href="#">Sign Up</a></button>

                    <button class="btnn" name = "submitmember"><a href="#">already a member?</a></button>
                    
                    

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
