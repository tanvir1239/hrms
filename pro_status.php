<?php
//including the database connection file
include("db.php");

//getting id of the data from url
$id = $_GET['id'];
$result=mysqli_query($conn,"update project set status='Done' where id='$id'");
//deleting the row from table

header("Location:projects.php");
?>