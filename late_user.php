<?php
include('db.php');
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager' || $_SESSION['user']['role']=='admin'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - Late user</title>
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
							   <li class="nav-item" role="presentation"><a class="nav-link active" href="">View</a></li>
							  <div class="dropdown-content">
								<a href="employees.php">Employee Profile</a>
								<a href="projects.php">Project Details</a>
								<a href="viewattendance.php">View Attendence</a>
								<a href="late_user.php">View Late Comers</a>
								
							  </div>
							</div>
                   
					<li class="nav-item" role="presentation"><a class="nav-link" href="salary.php">Salary</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="attendance.php">Take Attendance</a></li>
					 <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
</br></br></br>
<table class="table table-striped">
<tr>
<th>#Serial No</th><th>EMployee ID</th><th>Login TIme</th><th>Logout Time</th><th>Duration</th>
</tr>
<?php
 $check=mysqli_query($conn,"SELECT * FROM attendance WHERE log_in_time > CONVERT('08:00:00', TIME)");
 $counter=0;
$serialnumber=0;
while($row=mysqli_fetch_array($check))
{
	$serialnumber++;
?>

<tr>
<td><?php echo $serialnumber;?></td>
<td><?php echo $row['emp_id'];?></td>
<td><?php echo $row['log_in_time'];?></td>
<td><?php echo $row['log_out_time'];?></td>
<td><?php echo $row['duration'];?></td>
</tr>
<?php
$counter++;
}
?>
</table><?php } ?>

    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
