<?php
include("db.php");
session_start();

if(isset($_POST['submit'])){
   //First Name Validation
   if(empty($_POST['man_fname'])){
    $man_fnameerror="Manager First Name is Needed";
    $error='';
   }
    //Last Name Validation
   if(empty($_POST['man_lname'])){
    $man_lnameerror="Manger Last Name is Needed";
    $error='';
   }
     //Dept. Checking
   if(empty($_POST['man_dept'])){
    $man_depterror="Please Select The Manager Department";
   $error='';
   }
    //Inserting Data
 if(!isset($error)){
  //Inserting User Info Into Database
    $man_fname=mysqli_real_escape_string($conn,$_POST['man_fname']);
	$man_lname=mysqli_real_escape_string($conn,$_POST['man_lname']);
	$man_dept=mysqli_real_escape_string($conn,$_POST['man_dept']);
	$sub_date=mysqli_real_escape_string($conn,$_POST['sub_date']);
	$uploadOk = 1;
	$folder="project/";
	$file = basename($_FILES['file']['name']);
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
// new file size in KB
$new_size = $file_size/1024; 
// new file size in KB
// make file name in lower case
$new_file_name = strtolower($file);
// make file name in lower case
$final_file=str_replace(' ','-',$new_file_name);

if($imageFileType != "doc" && $imageFileType != "dot" && $imageFileType != "docx" && $imageFileType != "dotx"
 && $imageFileType != "pdf" && $imageFileType != "ppt" && $imageFileType != "pptx" ) {
    echo "Sorry, only doc,dot,docx,dotx,pdf,ppt,pptx files are allowed.";
	$uploadOk = 0;
}
if (file_exists($final_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    
if(move_uploaded_file($file_loc,$folder.$final_file))
{
	 
    $sql="INSERT INTO project(man_fname,man_lname,man_dept,file,type,size,given_date,sub_date)
    VALUES('$man_fname','$man_lname','$man_dept','$final_file','$file_type','$new_size',now(),'$sub_date')";
   mysqli_query($conn,$sql);
 echo "Project was Successfully Submitted to <font color=green> $_POST[man_fname] $_POST[man_lname]</font>";
 header("location:projects.php");
}
else
{
echo "Error.Please try again";
}
 }
}}
?>