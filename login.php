<?php
session_start();
$link=mysqli_connect('localhost','root','');
if(!$link)
{
    die('Connnection failed:');
}
$dbname="fest_management";
$db=mysqli_select_db($link,$dbname);
if(!$db)
{
    die('Selected database unavailable:'.mysqli_error($link));
}
$email=$_POST['email'];
$password=$_POST['password'];

if(!$_POST['email']|!$_POST['password'])
{
    echo("<script language='javascript'>
    window.alert('You did not completed all the required fields')
    window.location.href='login.html'
    </script>");
    exit();
}
$sql = "SELECT * FROM registration WHERE email='$email' AND passwords='$password'";
$result=mysqli_query($link,$sql);
if(mysqli_num_rows($result)>0)
{
    $_SESSION['log']="yes";
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    echo("<script language='javascript'>
    window.alert('logged in successfully')
    window.location.href='index.php'
    </script>");
    exit();
}
else{
    echo("<script language='javascript'>
    window.alert('Wrong email or password')
    window.location.href='login.html'
    </script>");
    exit();
}

?>