<?php
include("db.php");
session_start();
if($_SESSION['user']['role']=='manager' || $_SESSION['user']['role']=='admin'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry'){
	?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - View Attendance</title>
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
    <main class="page landing-page">
        
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<table class="table table-striped">
<tr>
<th>#serial No.</th><th>Login Time</th><th>Logout Time</th><th>Duration</th><th>Date</th>
</tr>
</div>
<?php
if(isset($_POST['submit'])){
$result=mysqli_query($conn,"select * from attendance where (date BETWEEN LAST_DAY(CURDATE() - INTERVAL 2 MONTH) + INTERVAL 1 DAY AND LAST_DAY(CURDATE() - INTERVAL 1 MONTH)) AND emp_id='".$_POST['emp_id']."'ORDER BY date ASC");
$serialnumber=0;
while($res=mysqli_fetch_array($result))
{
	$serialnumber++;
	echo "	<tr>";
?>

<td>$serialnumber</td>
<td><?php echo $res['log_in_time']?></td>
<td><?php echo $res['log_out_time']?></td>
<td><?php echo $res['duration']?></td>
<td><?php echo $res['date']?></td>

<?php
}
$result=mysqli_query($conn,"SELECT (SEC_TO_TIME(SUM(TIME_TO_SEC(duration))))  AS stime FROM attendance WHERE (date BETWEEN LAST_DAY(CURDATE() - INTERVAL 2 MONTH) + INTERVAL 1 DAY AND LAST_DAY(CURDATE() - INTERVAL 1 MONTH)) AND emp_id='".$_POST['emp_id']."'");
	$count=$result->num_rows;
	if($count=1){
while ($row = $result->fetch_assoc()){
	$time=$row['stime'];
	}
	echo "<tr>";
	echo "<th>Total</th>";
	
echo "<td>You Worked In this Month: $time</td>";
	echo "</tr>";
	}
}
?>
</table><?php } ?>