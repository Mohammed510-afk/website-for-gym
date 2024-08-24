
<!DOCTYPE html>
<html lang="en">
<head>
<title>تسجيل الدخول</title>
<?php  require_once "nav.php";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>

<center>
<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <h1 class="navbar-brand" >مركز عالم الرشاقة الرياضي</h1>
</nav>
</div>
<h2 class="mt-5">تسجيل دخول</h2>
<form style="width: 25rem; margin-TOP: 3%; padding: 50px;" >
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="form5Example1" class="form-control" name="id"  placeholder="اسم المستخدم" required/>
    
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="password" id="form5Example2" class="form-control" name="pass"  placeholder="كلمة المرور" required/>
    
  </div>

  
  </div>

  <!-- Submit button -->
  <input data-mdb-ripple-init type="submit" name="run" class="btn btn-primary btn-block mb-4"></input>
  <a href="https://wa.me/966507249867">تحتاج الى مساعدة؟</a>
</form>
</center>

<?php
session_start();

include("database.php");


if(isset($_REQUEST['run']))
{
    $id=$_REQUEST['id'];
    $pass=$_REQUEST['pass'];
    $_SESSION["status"]=false;

if(!empty($id)&&!empty($pass))
    {
    $sql="select id , password from admin where id='$id' and password='$pass'";
    $con=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($con)>0)
    {
        $_SESSION['id']=$id;
        
        $_SESSION["logged"]= true;
        
        
            header("location:all.php");
        
       
    }
        
    



else

echo'<div div text-align = left: ;  style=" height:10px ; width: 35%;   position: relative;
top: -325px; right: -500px ;" class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div
  style=" position: relative;
  left: -130px ;">
    خطأ في البيانات
  </div>
</div>';



    
    }

    }


?>




</body>
</html>