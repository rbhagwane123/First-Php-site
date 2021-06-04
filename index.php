<?php
$insert =false;
if(isset($_POST['name'])){
    // setting Connection variable
    $server ="localhost";
    $username ="root";
    $password = "";
    
    $con = mysqli_connect($server, $username, $password);
    // Checking for connection 
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    // `database_name`.`table_name`
    //data base query that is to be run.
    $sql = "INSERT INTO `trip`.`trip_data` (`name`,`age`,`gender`,`email`,`phone`,`other`,`dt`) VALUES ('$name','$age','$gender','$email','$phone','$desc', current_timestamp());";
    
    // execute the query 
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "Error : $sql <br> $con->error";

    }
    $con->close();
}
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travcel form</title>
    <link rel="stylesheet" href="styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <img src="imagebackground.jpg" alt="IIT Campus" class="bg">
    <div class="conatiner">
        <h2>
            Welcome To IIT Desi Trip Form</h2>
        <p>Confirm Your participation in your trip and Submit this form</p>
        <?php 
            if($insert == true){
                echo "<p class='msg'>Thanks for Submitting form and have a nice and properious trip adventure</p>";
            }

        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter You Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Info here"></textarea>
            <button class="btn">Submit</button>
        </form>
        <br>
    </div>
    <script src="index.js"></script>
</body>

</html>