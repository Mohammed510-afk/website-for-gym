<!DOCTYPE html>
<html lang="en">
<head>
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
<h2 class="mt-5">ملاحظات</h2>

<br><br>
<div class="form-group">
<div class="row mb-4">

      <div class="row mb-4">
      <div data-mdb-input-init class="form-outline">
        <input type="text" id="note" name="note" class="form-control" placeholder ="ملاحظات"/>
        <br><br>
     
      
    


    
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <a href="all.php" class="btn btn-secondary ml-2">الغاء</a>
                        <input type = "submit" value="حذف"  name = "delete" class="btn btn-danger"></input>
                        <input type="submit" name="submit" class="btn btn-primary" value="تحديث">
                        
</form>
</body>
</html>
<?php
// Include config file


?>

  <?php  
    
      if(isset($_POST['submit']))
{
    
    $note=$_POST["note"];
    


   if(!empty($note))
      {

      $sql="UPDATE ssuubb SET note='$note' WHERE id=$id";

      $req=mysqli_query($dbcon,$sql);
      if(!$req)
      {
      echo"error";
      }
      else
      header("location:all.php");
    
  
}

      }

      if(isset($_POST['delete']))
      {
        
        $sql="UPDATE ssuubb SET note = null WHERE id=$id";
        $req1=mysqli_query($dbcon,$sql);
        if(!$req1)
        {
        echo"error";
        }
        else
        header("location:all.php");
      }


  ?>
