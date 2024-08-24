<html>
<head>

<body>


<?php
session_start();
$user=$_SESSION['id'];
if (!isset($_SESSION["status"]))
{
    header('Location:form.php');
}
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$name = $num = $game  ="";
$name_err = $num_err = $game_err  = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "ادخل اسم المشترك";
    } else{
        $name = $input_name;
    }
    
    // Validate address address
    $input_num = trim($_POST["num"]);
    if(empty($input_num)){
        $num_err = "ادخل رقم الجوال";     
    } else{
        $num = $input_num;
    }
    
    // Validate salary
    $input_game = trim($_POST["game"]);
    if(empty($input_game)){
        $game_err = "ادخل اللعبة";     
    } else{
        $game = $input_game;
    }



    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($num_err) && empty($game_err)){
        // Prepare an update statement
        $sql = "UPDATE ssuubb SET name=?, num=?, game=? WHERE id=?";
         
        if($stmt = mysqli_prepare($dbcon, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_num, $param_game, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_num = $num;
            $param_game = $game;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: all.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($dbcon);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM ssuubb WHERE id = ?";
        if($stmt = mysqli_prepare($dbcon, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $num = $row["num"];
                    $game = $row["game"];
                    
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($dbcon);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">تحديث بيانات المشترك</h2>
                    <br>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>رقم الجوال</label>
                            <input type="text" name="num" class="form-control <?php echo (!empty($num_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $num; ?>" >
                            <span class="invalid-feedback"><?php echo $num_err;?></span>
                        </div>
                
                        <div class="form-group">
                        <label class="form-label" for="date_start">اختر اللعبة</label>
                          <select data-mdb-select-init name="game" class="form-control <?php echo (!empty($game_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $game; ?>">
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
                            <span class="invalid-feedback"><?php echo $game_err;?></span>
                        </div>
                    
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="تحديث">
                        <a href="all.php" class="btn btn-secondary ml-2">الغاء</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>



</body>
</head>
</html>