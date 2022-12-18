<?php

@include 'config.php';

session_start();

if (isset($_POST['submit1'])) {
  
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    if (isset($_POST['solder'])) {
        $comp = "SELECT customerID FROM customer WHERE email = '$email'";
        $resultc = mysqli_query($conn, $comp);
        $selection = "SELECT * FROM staff s WHERE s.staffID <= ALL(SELECT s.staffId FROM staff s WHERE s.staffID NOT IN (SELECT s.staffID from staff s,acquires_service a,service se WHERE se.type = 'Soldering' AND s.staffID = a.staffID AND se.serviceID = a.serviceID AND s.position = 'Helper' AND a.dateOfService = '$date'))";
        $result = mysqli_query($conn, $selection);
        if (mysqli_num_rows($result) == 0) {
            $error[] = 'please choose a different date or time';
        } else {
            $row = mysqli_fetch_row($result);
            $row = intval($row[0]);
            $row2 = mysqli_fetch_row($resultc);
            $row2 = intval($row2[0]);
            $insertion = "INSERT INTO acquires_service VALUES('$row','$row2','1', '$date')"; //service id must be 1 since its soldering
            mysqli_query($conn, $insertion);
            header('location:homepage.php');
        }

    } else {
        if (isset($_POST['guide'])) {
            $comp = "SELECT customerID FROM customer WHERE email = '$email'";
            $resultc = mysqli_query($conn, $comp);
            $selection = "SELECT * FROM staff s WHERE s.staffID <= ALL(SELECT s.staffId FROM staff s WHERE s.staffID NOT IN (SELECT s.staffID from staff s,acquires_service a,service se WHERE se.type = 'Soldering' AND s.staffID = a.staffID AND se.serviceID = a.serviceID AND s.position = 'Helper' AND a.dateOfService = '$date'))";
            $result = mysqli_query($conn, $selection);
            if (mysqli_num_rows($result) == 0) {
                $error[] = 'please choose a different date or time';
            } else {
                $row = mysqli_fetch_row($result);
                $row = intval($row[0]);
                $row2 = mysqli_fetch_row($resultc);
                $row2 = intval($row2[0]);
                $insertion = "INSERT INTO acquires_service VALUES('$row','$row2','2', '$date')"; //service id must be 2 since its guiding
                mysqli_query($conn, $insertion);
                header('location:homepage.php');
            }
        }
    }


}



?>




<html>

<head>

    <link rel="stylesheet" href="styleservicestyle.css">

</head>

<body>
    <div class="hero">
        <div class="form-box">
            <form action="" method="post">   

            <div class="title">Acquire Our Services</div>
            
            <div class="input-group">
                <input type="text" name = "email" class="input-field" placeholder="Email " required>
                <input type="text" name = "date" class="input-field" placeholder="Date: YYYY-MM-DD " required>
                
            </div>
            <div class="select">
                What service do you want to use?
                <br>

                <input id="soldering" type="checkbox" name='solder' value='soldering'><label for="soldering">Soldering
                    items (20$)
                
                </label>
                
                <br>

                <input id="guide" type="checkbox" name='guide' value="guide"><label for="guide">Guidance in projects
                    (5$)
                </label>

            </div>

            <br><br>


            <!-- <button type="submit" class="submit-btn" name="submit"value="register now" </button> -->
            <input type="submit" value="submit" class="submit-btn" name="submit1">
            </form>
            
        </div>
</body>
