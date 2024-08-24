
<!DOCTYPE html>
<html lang="en">
<head>
<title>استعلام عن مشترك</title>
    <?php
    require_once "test.php";
    ?>
    
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
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

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                     
                     
                        
                        
                    </div>

 
                    <?php
                     
                    $classG="green";
                    $classR="red";
                    $date=date("Y-m-d");
                    // Include config file
                    require_once "database.php";
                    
                    // Attempt select query execution               
                                                                          
                                          if(isset($_POST['send']))
                                             {
                                               $id=$_POST['id'];
                                               $date=date("Y-m-d");
                                               $classG="green";
                                               $classR="red";

                                              if(!empty($id))
                                             {
                                                 $sql="select * from ssuubb where id='$id'";

                                               $res=mysqli_query($dbcon,$sql);
                                                if(mysqli_num_rows($res)>0)
                                               {
                                                   
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
                                                        echo "<th>حالة الاشتراك</th>";
                                                        echo "<th></th>";
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody align = 'center'>";

                                        while ($row = mysqli_fetch_array($res)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['game'] . "</td>";
                                        echo "<td>" . $row['num'] . "</td>";
                                        echo "<td>" . $row['moun'] . "</td>";
                                        echo "<td>" . $row['end_moun'] . "</td>";
                                        echo "<td>".$row['inv']. "</td>";
                                        if($row['end_moun']< $date)

                                        echo "<td style='background-color: red; color: white;'>"."منتهي"."</td>";
                                        
                                         else
                                        echo "<td style='background-color: green; color: white;' >"."ساري"."</td>";
                                       
                                        echo'  <td> <a href="newsub.php?id='. $row['id'] .'"  title="Delete Record" data-toggle="tooltip"> <button type="button"  class="btn btn-success">تجديد</button></a></td>';

                                        echo "<td>";
                                       
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($res);
                    } else{
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                                 
                       
            }
        
                    // Close connection
                    
                    ?>
                </div>
            </div>        
        </div>
    </div>
<br><br>

</body>

</head>
</html>














