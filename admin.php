<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $pNumber = mysqli_real_escape_string($conn, $_POST['number']);
   $speciality = mysqli_real_escape_string($conn, $_POST['speciality']);
   
   
   $count = "SELECT * FROM teacher";
   $select2 = "SELECT * FROM teacher WHERE phoneNb = 'number' ";
   $result2 = mysqli_query($conn, $select2);
   $re = mysqli_query($conn, $count);
   $i = mysqli_num_rows($re);

   if(mysqli_num_rows($result2) > 0 ){
      $error[] = 'teacher already exists';
   }else{
         
         $i++;
         $insert2= "INSERT INTO teacher VALUES ('$i','$fname','$lname','$address','$pNumber','$speciality')";
         mysqli_query($conn, $insert2);
         header('location:homepage.php');
      
   }

}else{
    if(isset($_POST['submit2'])){
        $memberID = mysqli_real_escape_string($conn, $_POST['cID']);
        $rewardID = mysqli_real_escape_string($conn, $_POST['rID']);
        $reward = mysqli_real_escape_string($conn, $_POST['reward']);
        $competitionID = mysqli_real_escape_string($conn, $_POST['cID']);
        
        $select2 = "SELECT * FROM reward WHERE rewardID = '$rewardID' ";
        $result2 = mysqli_query($conn, $select2);

        if(mysqli_num_rows($result2) > 0 ){
            $error[] = 'reward already given';
         }else{
            $memID = intval($memberID);
            $rewID = intval($rewardID);
            $compID = intval($competitionID);
            
            $insert2= "INSERT INTO reward VALUES ('$rewID','$reward','$compID','$memID')";
            mysqli_query($conn, $insert2);
            header('location:homepage.php');
            
         }

    }

}

?>

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="adminstyle.css">

</head>

<body>


    <div class="hero">
        <div class="title1">Admin</div>
        <div class="form-box">
            <form action="" method="post">
                <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
            <div class="title">Teachers</div>
            <div class="input-group">
                <input type="text" class="input-field" placeholder="First Name" name = "fname"required>
                <input type="text" class="input-field" placeholder="Last Name" name ="lname" required>
                <input type="text" class="input-field" placeholder="Address" name = "address" required>
                <input type="text" class="input-field" placeholder="Phone Number" name ="number" required>
                <input type="text" class="input-field" placeholder="Specialty" name = "speciality"required>

            </div>
            
            <br><br><br>


            <button type="submit" class="submit-btn" name = "submit">Register teacher</button>
            </form>
        </div>
        <div class="form-box2">
            <form action="" method="post">
                <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
            
            <div class="title">Rewards</div>
            <div class="input-group">
                <input type="text" class="input-field" placeholder="MemberID" name ="mID" >
                <input type="text" class="input-field" placeholder="RewardID" name ="rID" >
                <input type="text" class="input-field" placeholder="Reward type" name ="reward">
                <input type="text" class="input-field" placeholder="CompetitionID" name ="cID">

            </div>
            

            <br><br>


            <button type="submit" class="submit-btn" name="submit2">Allocate Reward</button>
            </form>
        </div>
</body>