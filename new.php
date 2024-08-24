<!DOCTYPE html>
<html lang="en">
<head>
<title>تسجيل مشترك</title>
<?php  include("test.php");?>
<meta charset="UTF-8">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
  

<div class="wrapper">
        <div class="container-fluid">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        
                        <h2 class="pull-left" style="margin-left: 17% ; position: relative;
top: 10px;">تسجيل مشترك</h2>

<br><br>
    <center>
<form method="POST" 
style="width:30% ;" >
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">

  <div data-mdb-input-init class="form-outline mb-4">
    <input type="text" id="user" name="user" class="form-control" style="margin-top: 8%;" placeholder="اسم المشترك" required />
  </div>

    </div>

    <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" id="id" name="id" class="form-control" placeholder ="رقم الهوية" required/>
      </div>
    </div>

    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" id="phone" name="phone" class="form-control" placeholder="رقم الجوال" required />
        
      </div>
    </div>
    </div>



  <!-- Email input -->
  <div data-mdb-input-init class="form-outline" >
  <label class="form-label" for="date_start">تاريخ بداية الاشتراك</label>
    <input type="date" id="date_start" name="date_start" class="form-control" required />
    
  </div>
<br>
  <!-- Password input -->
  <div class="row mb-4">
  <div class="col">
  <div data-mdb-input-init class="form-outline">
  <label class="form-label" for="date_start">تاريخ نهاية الاشتراك</label>
    <select data-mdb-select-init name="date_end" class="form-control" required >
      <option value="mon">شهر</option>
      <option value="2mon">شهرين</option>
      <option value="3mon">3 شهور</option>
      <option value="6mon">6 شهور</option>
      <option value="year">سنه</option>
    </select>
    </div>
    </div>
    <div class="col">
  <label class="form-label" for="game" >اختر اللعبة</label>
    <select data-mdb-select-init id="game" name="game" class="form-control" required >
      <option value="تايكوندو">تايكوندو</option>
      <option value="سباحة">سباحة</option>
      <option value="حديد">حديد</option>
      <option value="لياقه + تايكوندو">لياقة + تايكوندو</option>
      <option value="ملاكمة">ملاكمة</option>
      <option value="تايكوندو + سباحة">تايكوندو + سباحة</option>
      <option value="ملاكمة + تايكوندو">ملاكمة + تايكوندو</option>
      <option value="حديد + لياقة">حديد + لياقة</option>
      <option value=" لياقة">لياقة</option>
     <option value="ملاكمة + تايكوندو">ملاكمة + حديد </option>
    </select>
    </div>
    </div>
    <div data-mdb-input-init class="form-outline" >

    <input type="text" id="inv" name="inv" class="form-control" style="width :35% ;" placeholder="رقم الفاتورة"/>
<br>

<div class="col">
      <div data-mdb-input-init class="form-outline">
        <input type="text" id="note" name="note" class="form-control" placeholder="ملاحظات" required />
        
      </div>
    </div>
    </div>
    <br>
  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" name="send" class="btn btn-primary btn-block mb-4"
>تسجيل المشترك</button>

  
</form>
</center>
<br>

<?php
$class="msg";
include("database.php");

if(isset($_POST['send']))
 {
  
$date_day=strtotime("Y-m-d");

$id=$_POST['id'];

$name=$_POST['user'];

$num=$_POST['phone'];
 $inv=$_POST['inv'];
$game=$_POST['game'];
$date1=$_POST['date_start'];
$note=$_POST['note'];
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


$today=date("Y-m-d");


if(!empty ($id) && !empty($name))
{

    $sql="select id from ssuubb where id = '$id'";
    $sqll=mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($sqll) > 0 )
    echo'<div div text-align = left: ;  style=" height:10px ; width: 35%;   position: relative;
    top: -550px;right: -478px ;" class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div
      style=" position: relative;
      left: -135px ;">
      المشترك موجود بالفعل
      </div>
    </div>';
else
{
$sql="insert into ssuubb (id,name,num,game,moun,end_moun,inv,note) values ('$id','$name','$num','$game','$date_start','$date_end','$inv','$note')";
$dd=mysqli_query($dbcon,$sql);
if(!$dd)
echo'<div div text-align = left: ;  style=" height:10px ; width: 35%;   position: relative;
top: -550px; right: -480px ;" class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div
  style=" position: relative;
  left: -130px ;">
    خطأ في البيانات
  </div>
</div>';
else
{

  echo' <div text-align = left: ;  style=" height:10px ; width: 35%;   position: relative;
  top: -550px; right: -470px ;" class="alert alert-success d-flex align-items-center" role="alert">
  <svg   class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div style=" position: relative;
   left: -135px ;" >
  تم تسجيل المشترك
  </div>
  </div>';

 }

} 
   }
}


?>

</div>
            </div>        
        </div>
    </div>
</body>    
</html> 