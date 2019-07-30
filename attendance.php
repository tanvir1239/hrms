<?php
//SELECT TIMEDIFF(log_in_time,log_out_time) AS duration FROM attendance
include('db.php');
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager' || $_SESSION['user']['role']=='admin'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry'){

if(isset($_POST['login'])){
	if(!empty($_POST['emp_id'])){
  //Cheking for White Space
  $emp_id=preg_match('/\s/',$_POST['emp_id']);
  if($emp_id==0){
  $retrieve=mysqli_query($conn,"SELECT * FROM employee WHERE emp_id='".$_POST['emp_id']."'");
   $count=$retrieve->num_rows;
  if($count==1){
	  $check=mysqli_query($conn,"SELECT * FROM attendance WHERE log_out_time = CONVERT(0,TIME) AND emp_id='".$_POST['emp_id']."' ");
   $countt=$check->num_rows;
   if($countt==1){
	   $error='';
    $emp_iderror="ID <font color=green> $_POST[emp_id]</font> Already Logged In";
   }
   else{
	  $date=date("Y-m-d");
	$result=mysqli_query($conn,"insert into attendance (emp_id,log_in_time,date) values('$_POST[emp_id]',now(),'$date')");
    $error='';
    $emp_iderror="ID <font color=green> $_POST[emp_id]</font> Successfully Logged In";
  }
  }
  else{
   $error='';
   $emp_iderror="ID <font color=green> $_POST[emp_id]</font> is Not a Valid ID, Please Try Again with a Valid ID";
  }
 }else{
  $error='';
  $emp_iderror='White Space are Not Allowed';
 }
 }else{
  $emp_iderror='Please Enter Your ID To Login';
  $error='';
 }
 	
}
if(isset($_POST['logout'])){
	if(!empty($_POST['emp_id'])){
  //Cheking for White Space
  $emp_id=preg_match('/\s/',$_POST['emp_id']);
  if($emp_id==0){
	  
  $retrieve=mysqli_query($conn,"SELECT * FROM attendance WHERE emp_id='".$_POST['emp_id']."'");
  $count=$retrieve->num_rows;
   $check=mysqli_query($conn,"SELECT * FROM attendance WHERE log_out_time = CONVERT(0,TIME) AND emp_id='".$_POST['emp_id']."' ");
   $countt=$check->num_rows;
  while($row=mysqli_fetch_array($retrieve))
  {
	  if($countt==1){
	$result=mysqli_query($conn,"update attendance set log_out_time=now(), duration=TIMEDIFF(log_out_time,log_in_time) where emp_id='".$_POST['emp_id']."' order by id desc limit 1");
    $error='';
    $emp_iderror="ID <font color=green> $_POST[emp_id]</font> Successfully Logged Out";
	
  }
  else{
	  $error='';
    $emp_iderror="ID <font color=green> $_POST[emp_id]</font> Already Logged Out";
  }
  }
  if($count==0){
   $error='';
   $emp_iderror="ID <font color=green> $_POST[emp_id]</font> Not Found, Please Enter Your ID First";
  }
 }else{
  $error='';
  $emp_iderror='White Space are Not Allowed';
 }
 }else{
  $emp_iderror='Please Login First ';
  $error='';
 }
 	
 }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry -Attendance</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><strong>Mehedi Knit Wears</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registry.php">Home</a></li>
                 							  
                 

                    
					<li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">Add</a></li>
							  <div class="dropdown-content">
								<a href="addpro.php">Project</a>
								<a href="addem.php">Employee</a>
								
							  </div>
							  </div>
							  
							  <li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link" href="">View</a></li>
							  <div class="dropdown-content">
								<a href="employees.php">Employee Profile</a>
								<a href="projects.php">Project Details</a>
								<a href="viewattendance.php">View Attendence</a>
								<a href="late_user.php">View Late Comers</a>
							  </div>
							</div>
                   
					<li class="nav-item" role="presentation"><a class="nav-link" href="salary.php">Salary</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link active" href="attendance.php">Take Attendance</a></li>
					 <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
     <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Employee Attendance Area</h4>
                </div>
			<style>						
	    .error{
   color:red;
   font-weight:bold;
   font-style:italic;
  }</style>
                <form method="POST" action="">
                    <div class="form-group"><label for="emp_id">Employee ID</label><input class="form-control item" type="text" name="emp_id" id="emp_id">
					  <div><?php if(isset($emp_iderror)){
    echo '<div class=error>'.$emp_iderror.'</div>';}?></div>
</div>
			<button class="btn btn-success btn-block" name="login" type="submit">Login</button>
			<button class="btn btn-primary btn-block" name="logout" type="submit">Logout</button>
			</form>
            </div>
        </section>
    </main>
     </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html><?php }?>