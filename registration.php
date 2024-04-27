<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="registration.css">
    <style> 
     input{
    padding:6px;
    border-radius: 0px;
                background-color: black;
                 border:none;
                 color: aliceblue;
               border-bottom: 1px solid rgb(0, 187, 255);
               width:100%;
     }
     </style>
    
</head>
<body>
        <div class="login-container">
            <h2 style="text-align:center;"> Registration Form
                 </h2><br>
            <form id="login-form" method="POST" action=""><!--form-->

<div class ="input-field">

        <label for="name" >Full Name:</label><br>
        <input type="text" name="name"id="name" required> <br> <br>  
</div>
<div class ="input-field">
        <label for="email" >Email:</label><br>
        <input type="email" name="email" id="email"required> <br> <br>  
</div>
<div class ="input-field">
        <label for="phonenumber" >Phone number:</label><br>
        <input type="tel" name="phonenumber" id="phonenumber" maxlength="10" pattern="[0-9]+"required> <br> <br>  
</div>
<div class ="input-field">
        <label for="collegename" >College Name:</label><br>
        <input type="text" name="collegename" id="collegename" required> <br> <br>  
</div>
<div class ="input-field">
        <label for="password" >Create Password:</label><br>
        <input type="password" name="password" id="password" required> <br>  <br>
</div> 
<div class ="input-field">
        <label for="password" >Confirm Password:</label><br>
        <input type="password" name="cpassword" id="password"required> <br> <br>  
</div>
<button type = "submit" class="login-btn" name="update">Register</button>
</div>

    </form>



<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$database="fest_management";
$conn=new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
{
    die("connection failed:".$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $fullname=$_POST['name'];
    $email=$_POST['email'];
    $phoneno=$_POST['phonenumber'];
    $collegename=$_POST['collegename'];
    $passwords=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($passwords==$cpassword)
    {
    $sql="INSERT INTO registration(fullname,email,phoneno,collegename,passwords,confirm_pass) VALUES ('$fullname','$email','$phoneno','$collegename','$passwords','$cpassword')";
    if($conn->query($sql)===TRUE)
    {
        echo "<script>
    alert('Registration Successfull');
    window.location.href='login.html';
    </script>";
    }
    else
    {
        echo "<script>
    alert('Invalid credentials');
    window.location.href='registration.php';
    </script>";
    }
    }
    else
    {
        echo "<script>
        alert('Password does not match');
        window.location.href='registration.php';
        </script>";
    }


}
?>
</body>
</html>