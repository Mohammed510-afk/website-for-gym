<?php 
$dbname="user"; 
$dbconn= new mysqli("localhost","root","");
$dbcre = "create database if not exists $dbname";
/*if(!$dbconn)
echo"false";
else
echo"true";
*/
/*if(mysqli_query($dbconn,$dbcre)) 
echo"true";
else
echo"false";*/
$dbcon=new mysqli ("localhost","root","","$dbname");
/*if ($dbname == true)

echo"Done";
else
echo"false";
*/
$sql="create table if not exists ssuubb (

    id varchar (20) primary key ,
    name varchar(30),
    game varchar (30),
    num varchar (11),
    moun date,
    end_moun date
    )";
    
$rech=mysqli_query($dbcon,$sql);
/*if($rech == true)
echo"Done";
else
echo"false";*/

$sql="create table if not exists admin (

    id varchar (20) primary key ,
    password int (20)
    )";

$conn=mysqli_query($dbcon,$sql);
/*if($conn == true)
echo"Done";
else
echo"false";*/






?>