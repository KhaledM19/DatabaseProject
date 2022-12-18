<?php

@include 'config.php';

session_start();

if(isset($_POST['compsubmit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email1']);
    $select = "SELECT memberID FROM member WHERE email = '$email'";
            $result = mysqli_query($conn, $select);
            $row = mysqli_fetch_row($result);
            $row = intval($row[0]);
            
    
    if (isset($_POST['competition1'])) {
        
        $insert = "INSERT INTO participates VALUES('$row','1')";
        mysqli_query($conn, $insert);

    }else{
        if (isset($_POST['competition2'])) {
            
            $insert = "INSERT INTO participates VALUES('$row','2')";
            mysqli_query($conn, $insert);

            
        }
    }
    header('location:homepage.php'); 
    
}else{
    if(isset($_POST['courseSubmit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email2']);
        $select = "SELECT memberId FROM member WHERE email = '$email'";
            $result = mysqli_query($conn, $select);
            $row = mysqli_fetch_row($result);
            $row = intval($row[0]);

        if (isset($_POST['course1'])) {
            
            $insert = "INSERT INTO enrolled VALUES('$row','1')";
            mysqli_query($conn, $insert);

            
           
    
        }else{
            if (isset($_POST['course2'])) {
                
                $insert = "INSERT INTO enrolled VALUES('$row','2')";
                mysqli_query($conn, $insert);

                
            }
        }
        header('location:homepage.php'); 
        
    }
}



?>





<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="becomeamemberstyle.css">

</head>

<body>


    <div class="hero">
        <div class="title1">BECOME A MEMBER!</div>
        <div class="form-box">
            
            <div class="title">Competitions</div>
            <form action="" method="post">
            <div class="input-group">
                <input type="email" class="input-field" placeholder="Email" name="email1" >

            </div>
            <div class="select">
                What competition do you want to enter?
                <br>

                <input  id ="soldercomp" type="checkbox" name="competition1" value = "solderComp"><label for="IQcomp">Soldering
                    competition. This competition tests your ability to solder items efficiently (in terms of product and time). The winner gets 50$.
                </label>

                <br><br>

                <input  id ="IQcomp" type="checkbox" name="competition2" value="IQcomp"><label for="IQcomp">IQ competition. Ths competition tests your knowledge
                    on electronics. The winner gets 30$.
                    
                </label>
                
            

            </div>

            <br><br><br>


            <button type="submit" class="submit-btn" name ="compsubmit">Register for competition</button>
            </form>

        </div>
        <div class="form-box2">
            <div class="title">Courses</div>
            <form action="" method="post">
            <div class="input-group">
                <input type="email" class="input-field" placeholder="Email" name="email2">

            </div>
            <div class="select">
                What course(s) do you want to enter?
                <br>

                <input id="solderingcourse" type="checkbox" name="course1" value="solderingcourse"><label for="solderingcourse">Soldering
                    course. This course, taught by Dr. Rima El Hassan, aims to teach students how to solder items. 
                </label>

                <br><br>

                <input id="micro" type="checkbox" name="course2" value="micro"><label for="micro">Microelectronics course. This course, taught
                    by Dr. Ahmad Daou, aims to teach students how Microelectronics work and their properties and applications.
                    
                </label>

            </div>

            <br><br>


            <button type="submit" class="submit-btn" name="courseSubmit">Register for course</button>
            </form>
        </div>
</body>