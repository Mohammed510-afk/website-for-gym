<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>طباعة</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1000px;
            margin: 0 auto;
            
        }
        table tr td:last-child{
            width: 150px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<br><br><br><br><br><br>
<br><br>


<?php


require_once "database.php";
$date=date("Y-m-d");
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
                    echo "<td>".$row['note']. "</td>";
                    if($row['end_moun']< $date)

                    echo "<td style='background-color: red; color: white;'>"."منتهي"."</td>";
                     else
                    echo "<td style='background-color: green; color: white;'>"."ساري"."</td>";
                echo "</tr>";
            }
            echo "</tbody>";                            
        echo "</table>";
        // Free result set
        
    }


}








?>
    <script>print()</script>
</body>
</html>