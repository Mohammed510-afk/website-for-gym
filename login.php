<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="text-bg-dark p-3">>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<nav class="navbar bg-body-tertiary fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="#">مركز عالم القوة والرشاقة</a>
</div>
</nav>
<br><br><br><br><br><br><br><br>
<center>

<form method ="POST">
<input type="text" placeholder="UserName"Name="id" required>
<br></br>
<input type="password" placeholder="Password" name="pass" required>
<br></br>
<button type="submit" name="run" class="btn">Login</button>
</form>
</center>

<?php


$class="passf";
$pass1="123";
$id1="aa";
if(isset($_POST['run']))
{

$id=$_POST['id'];
$pass=$_POST['pass'];

if(($id)==($id1)&&($pass)==($pass1))
{
if(isset($_SESSION['id']))
{

    header("location:test.php");


}

else
echo("<div>passowrd faild</div>");



}


}
?>


</body>
</html>