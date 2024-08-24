
<html lang="en">
<head>
<title>تجديد الاشتراك</title>
<meta charset="UTF-8">
<?php
    require_once "database.php";

 if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Get URL parameter
    $id =  trim($_GET["id"]);
    
    }
    ?> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    


                    <center>
<form method="POST" 
style="width:30% ;" >
<br><br>
<h2 class="mt-5">تعليق الاشتراك</h2>
<p>سيتم زيادة مدة التعليق على تاريخ نهاية الاشتراك</p>

<br><br>

 
      
      <div class="col-12" >
  <label class="form-label" id="off" for="off">تعليق الاشتراك</label>
    <select data-mdb-select-init name="off" class="form-control"  style=" width:50% ;" >
    <option value="week">اسبوع</option>
    <option value="week2">اسبوعين</option>
    <option value="week3">3 اسابيع</option>
    </select>
    
    <br><br>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <a href="all.php" class="btn btn-secondary ml-2">الغاء</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="تعليق">
                        </div>
</form>
</body>
</html>
<?php
// Include config file


?>

  <?php  
    
      if(isset($_POST['submit']))
{
    
    $id=$_POST["id"];
    $sql="Select end_moun from ssuubb where id=$id";
    $end=(mysqli_query($dbcon,$sql));

  



    $off=$_POST['off'];

    if($off=="week")
    $off=date("+1 week ",strtotime($end));
    
    if($off=="week2")
    $off=date("Y-m-d",strtotime("+2 week ",strtotime($end)));
    
    if($off=="week3")
    $off=date("Y-m-d",strtotime("+3 week ",strtotime($end)));







   if(!empty($off))
      {

      $sql="UPDATE ssuubb SET  end_moun = '$end' WHERE id=$id";

      $req=mysqli_query($dbcon,$sql);
      if(!$req)
      {
      echo"error";
      }
      else
      header("location:all.php");
    
  
}

      }


  ?>








