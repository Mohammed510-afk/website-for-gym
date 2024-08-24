

<!DOCTYPE html>
<html lang="en">
<head>
<title>الرئيسية</title>

<?php
session_start();
$user=$_SESSION['id'];
if (!isset($_SESSION["status"]))
{
    header('Location:form.php');
    
}
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg>
</head>
<body>
  <br><br><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <h1 class="navbar-brand">مركز عالم الرشاقة الرياضي</h1>

    </button>
 
  </div>
  
  
  <form method ="POST">
  <br>
<button type="submit" name="all" class="btn">المشتركين</button>
<button type="submit" name="new" class="btn">تسجيل مشترك</button>
<button type="submit" name="EndSub" class="btn">الاشتراكات المنتهية</button>
<button type="submit" name="logout" class="btn btn-danger" style="position: relative;  right: -1000px ; ">تسجيل خروج</button>
</form>




</nav>


<?php
if(isset($_POST['new']))

{
    
    header("location:new.php");



}


if(isset($_POST['all']))

{
    
    header("location:all.php");



}

if(isset($_POST['EndSub']))
{


    header("location:EndSub.php"); 

}

if(isset($_POST['logout']))
{


    header("location:logout.php"); 

}
?>
</body>
</html>


