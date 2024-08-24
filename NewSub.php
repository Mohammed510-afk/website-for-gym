
<!DOCTYPE html>
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
<h2 class="mt-5">تجديد الاشتراك</h2>

<br><br>
<div class="form-group">
<div class="row mb-4">
<div data-mdb-input-init class="form-outline mb-4">
  <label class="form-label" for="date_start" >تاريخ بداية الاشتراك</label>
    <input type="date"  name="date_start" class="form-control" style=" width: 50% ;" required/>
    
  </div>
  
  <!-- Password input -->
 
  <div class="col-12" >
  <label class="form-label" for="date_start">تاريخ نهاية الاشتراك</label>
    <select data-mdb-select-init name="date_end" class="form-control"  style=" width:50% ;" required >
      <option value="mon">شهر</option>
      <option value="2mon">شهرين</option>
      <option value="3mon">3 شهور</option>
      <option value="6mon">6 شهور</option>
      <option value="year">سنه</option>
      </select>
      <br>
      <br>
      <div class="row mb-4">
      <div data-mdb-input-init class="form-outline">
        <input type="text" id="note" name="note" class="form-control" placeholder ="ملاحظات"/>
        <br><br>
      </div>
      
    </div>


    
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <a href="all.php" class="btn btn-secondary ml-2">الغاء</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="تحديث">
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
    $date_day=strtotime("Y-m-d");
    $id=$_POST["id"];
    $note=$_POST["note"];
    $date1=$_POST['date_start'];
    $date_start=date("Y-m-d",strtotime($date1));
    



    $date2=$_POST['date_end'];
    if($date2=="mon")
    $date2=date("Y-m-d",strtotime("+1 month ",strtotime($date_start)));
    
    if($date2=="2mon")
    $date2=date("Y-m-d",strtotime("+2 month ",strtotime($date_start)));
    
    if($date2=="3mon")
    $date2=date("Y-m-d",strtotime("+3 month ",strtotime($date_start)));
    
    if($date2=="6mon")
    $date2=date("Y-m-d",strtotime("+6 month ",strtotime($date_start)));
    
    if($date2=="year")
    $date2=date("Y-m-d",strtotime("+1 year ",strtotime($date_start)));
    
    
    $date_end=date("Y-m-d",strtotime($date2));
  











   if(!empty($date_start) && !empty($date_end))
      {

      $sql="UPDATE ssuubb SET moun='$date_start', end_moun = '$date_end' , note='$note' WHERE id=$id";

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








