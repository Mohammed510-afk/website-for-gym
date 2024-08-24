


<!DOCTYPE html>
<html lang="en">
<head>
   <?php  require_once "test.php";?>
   
    <meta charset="UTF-8">
    <title>بيانات المشتركين</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1500px;
            margin: 0 auto;
            
        }
        table tr td:last-child{
            width: 100px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<br><br><br><br>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">بيانات المشتركين</h2>
                        <a href="new.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> اضافة مشترك</a>
                        <br><br><br>
                        
                        <center>
                        <a href="print_all.php" class="btn btn-secondary pull-left" style="width: 5% ;"></i>طباعة</a>
                        <br>
                        <form method="POST">
                        
                        <input type="text" placeholder="ادخل رقم الهوية" name="id" required>
                        <button type="submit" name="send" class="btn btn-secondary">بحث</button>
                        
                        </form>
                        </center>
                        
                    </div>
                    
                    <?php
                           if(isset($_POST['send']))
                           {

                              require_once "person.php";
                              

                           }
                     

                   

                    
                    $date=date("Y-m-d");
                    // Include config file
                    require_once "database.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ssuubb";
                    if($result = mysqli_query($dbcon, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead align = 'center'>";
                                    echo "<tr>";
                                        echo "<th>رقم الهوية</th>";
                                        echo "<th>الاسم</th>";
                                        echo "<th>اللعبة</th>";
                                        echo "<th>رقم الجوال</th>";
                                        echo "<th>تاريخ بداية الاشتراك</th>";
                                        echo "<th>تاريخ نهاية الاشتراك</th>";
                                        echo "<th>رقم الفاتورة</th>";
                                        echo "<th>ملاحظات</th>";
                                        echo "<th>حالة الاشتراك</th>";
    
                                        echo "<th></th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody align = 'center'>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['game'] . "</td>";
                                        echo "<td>" . $row['num'] . "</td>";
                                        echo "<td>" . $row['moun'] . "</td>";
                                        echo "<td>" . $row['end_moun'] . "</td>";
                                        echo "<td>".$row['inv']. "</td>";
                                        echo "<td>" . $row['note'] . "</td>";
                                        if($row['end_moun']< $date)

                                        echo "<td style='background-color: red; color: white;'>"."منتهي"."</td>";
                                         else
                                        echo "<td style='background-color: green; color: white;'>"."ساري"."</td>";
                                        echo'  <td> <a href="newsub.php?id='. $row['id'] .'"  title="تجديد الاشتراك" data-toggle="tooltip"> <button type="button"  class="btn btn-success">تجديد</button></a></td>';
                                        echo'  <td> <a href="note.php?id='. $row['id'] .'"  title="ملاحظات" data-toggle="tooltip"> <button type="button"  class="btn btn-success">ملاحظات</button></a></td>';
                                        echo "<td>";
                                        
                                        
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="تحديث البيانات" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="حذف المشترك" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
 
                    // Close connection
                    mysqli_close($dbcon);
                    ?>

                </div>
            </div>        
        </div>
    </div>

</body>
</head>
</html>