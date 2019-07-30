<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - Salary Info</title>
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
                   
					<li class="nav-item" role="presentation"><a class="nav-link active" href="salary.php">Salary</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link" href="attendance.php">Take Attendance</a></li>
					 <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav><center></br></br></br></br>
	

<?php
include("db.php");
if(isset($_POST['submit'])){
		 
		$result=mysqli_query($conn,"SELECT*FROM employee WHERE emp_id='".$_POST['emp_id']."'");
		$count=$result->num_rows;
if($count==1)		{
while ($row = $result->fetch_assoc())				 
{
	$fname=$row['fname'];
	$lname=$row['lname'];
	$emp_id=$row['emp_id'];
	$email=$row['email'];
	$phone_number=$row['phone_number'];
	$cur_add=$row['cur_add'];
	$salary=$row['salary'];
	$category=$row['category'];
	
}
 
	 

$result=mysqli_query($conn,"SELECT SUM(duration) AS overtime FROM attendance WHERE (date BETWEEN LAST_DAY(CURDATE() - INTERVAL 2 MONTH) + INTERVAL 1 DAY AND LAST_DAY(CURDATE() - INTERVAL 1 MONTH)) AND emp_id='".$_POST['emp_id']."'");
	$count=$result->num_rows;
if($count=1)		{
while ($row = $result->fetch_assoc()){
	$duration=$row['overtime'];
	}}
	
$result=mysqli_query($conn,"SELECT SUM( TIME_TO_SEC(duration))  AS stime FROM attendance WHERE (date BETWEEN LAST_DAY(CURDATE() - INTERVAL 2 MONTH) + INTERVAL 1 DAY AND LAST_DAY(CURDATE() - INTERVAL 1 MONTH)) AND emp_id='".$_POST['emp_id']."'");
	$count=$result->num_rows;
	if($count=1){
while ($row = $result->fetch_assoc()){
	$time=$row['stime'];
	}}
					 ?>
					
					 <style>
							.s{
							border:3px solid black;
							height:100% px;
							width:450px;
							align:center;
							background-color:white;
						}
	</style>
				
						<div id="printableArea">
						<center>
						<div class="s" >	
							<table class="center">				
							
							<h2>Mehedi Knit Wears Ltd.</h2>
							<h4>mehedi@gmail.com</h4>
							<h4><?php echo date("d M Y")?></h4>
					
									<td>Full Name</td> 
									<td>:</td><td>
									<?php echo "".$fname." ".$lname."";?></td>
								</tr>
						
												<tr><td>Employee ID</td><td>:</td><td> <?php echo $emp_id;?> </td></tr>
												
											    <tr><td>Email</td> <td>:</td><td> <?php echo $email;?></td></tr>
											
											    <tr><td>Phone Number</td> <td>:</td><td> <?php echo $phone_number;?></td></tr>
												
												<tr><td>Present Address</td><td>:</td><td> <?php echo $cur_add;?></td></tr>
												
												<tr><td>Salary</td><td>:</td><td> <?php echo "".$salary." Taka";?></td></tr>
												
												 <?php if($duration=='2400000' || $duration>'2400000'){
	foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("240:00:00")') as $row) {
$newtime= $row['TIME_TO_SEC("240:00:00")'];
foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$newtime-$overtime;	
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{
	
	$overtime=(15000/208)*2*($remaining/3600);
	$net_salary=15000+$overtime;
}
if($category=='Floor_Incharge')
{
	$overtime=(12000/208)*2*($remaining/3600);
	$net_salary=12000+$overtime;
}
if($category=='Labour')
{
	$overtime=(10000/208)*2*($remaining/3600);
	$net_salary=10000+$overtime;
}
	?>
<tr><td>Overtime In last Month</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php }}} ?>

<?php if($duration<'2400000' && $duration>'1600000'){

foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$time-$overtime;
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{	$overtime=(15000/208)*2*($remaining/3600);
	$net_salary=15000+$overtime;

}
if($category=='Floor_Incharge')
{
		$overtime=(12000/208)*2*($remaining/3600);
	$net_salary=12000+$overtime;
}

if($category=='Labour')
{
		$overtime=(10000/208)*2*($remaining/3600);
	$net_salary=10000+$overtime;

}

	?>
<tr><td>Overtime In last Month</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php }} ?>
<?php if($duration=='1600000' ){
$net_salary=$salary;}
	?>

<?php if($duration<'1600000' ){
foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$overtime-$time;
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{	$belowtime=($remaining/3600)*62.5;
	$net_salary=15000-$belowtime;

}
if($category=='Floor_Incharge')
{
		$belowtime=($remaining/3600)*50;
	$net_salary=12000-$belowtime;
}

if($category=='Labour')
{
	$belowtime=($remaining/3600)*41.7;
	$net_salary=10000-$belowtime;

}
}	?>
<tr><td>Your Less Worked Time In last Month is</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php } ?>

<tr><td>Net Salary</td><td>:</td><td><?php echo "".(int)$net_salary." Taka";?></td></tr>
												</table>
												</center>
												</div>
												
												
			<h3 align="center"></h3><center><input type="button" onclick="printDiv('printableArea')" value="Print!" /></center>

			<script>
			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}</script>
				
<?php 
}
else{
  $emp_iderror='Enter a Valid Id';
  $error='';
 }

}

?>
				</div>
				</center>
			</div>
				<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Search for Salary Query</h4>
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
		</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Search</button></form>
            </div>
        </section>
    </main>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<?php
}
if($_SESSION['user']['role']=='admin'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Salary Info</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href=""><strong>Mehedi Knit Wears</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="admin.php">Home</a></li>
                 							  
                 

                    
					<li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">Add</a></li>
							  <div class="dropdown-content">
								<a href="add_account.php">Account</a>
								<a href="addem.php">Employee</a>
								
							  </div>
							  </div>
							  
							  <li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">View</a></li>
							  <div class="dropdown-content">
								<a href="employees.php">Employee Profile</a>
								<a href="accounts.php">Account Information</a>
								<a href="viewattendance.php">View Attendence</a>
								
							  </div>
							</div>
                   
					<li class="nav-item" role="presentation"><a class="nav-link active" href="salary.php">Salary</a></li>
					 <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav><center></br></br></br></br>
	
	<?php
include("db.php");
if(isset($_POST['submit'])){
		 
		$result=mysqli_query($conn,"SELECT*FROM employee WHERE emp_id='".$_POST['emp_id']."'");
		$count=$result->num_rows;
if($count==1)		{
while ($row = $result->fetch_assoc())				 
{
	$fname=$row['fname'];
	$lname=$row['lname'];
	$emp_id=$row['emp_id'];
	$email=$row['email'];
	$phone_number=$row['phone_number'];
	$cur_add=$row['cur_add'];
	$salary=$row['salary'];
	$category=$row['category'];
	
}
 
	 

$result=mysqli_query($conn,"SELECT SUM(duration) AS overtime FROM attendance WHERE emp_id='".$_POST['emp_id']."' AND date>DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	$count=$result->num_rows;
if($count=1)		{
while ($row = $result->fetch_assoc()){
	$duration=$row['overtime'];
	}}
	
$result=mysqli_query($conn,"SELECT SUM( TIME_TO_SEC(duration))  AS stime FROM attendance WHERE emp_id='".$_POST['emp_id']."' AND date>DATE_SUB(NOW(), INTERVAL 1 MONTH)");
	$count=$result->num_rows;
	if($count=1){
while ($row = $result->fetch_assoc()){
	$time=$row['stime'];
	}}
					 ?>
					
					 <style>
							.s{
							border:3px solid black;
							height:100% px;
							width:450px;
							align:center;
							background-color:white;
						}
	</style>
				
						<div id="printableArea">
						<center>
						<div class="s" >	
							<table class="center">				
							
							<h2>Mehedi Knit Wears Ltd.</h2>
							<h4>mehedi@gmail.com</h4>
							<h4><?php echo date("d M Y")?></h4>
					
									<td>Full Name</td> 
									<td>:</td><td>
									<?php echo "".$fname." ".$lname."";?></td>
								</tr>
								
												<tr><td>Employee ID</td><td>:</td><td> <?php echo $emp_id;?> </td></tr>
												
											    <tr><td>Email</td> <td>:</td><td> <?php echo $email;?></td></tr>
												
											    <tr><td>Phone Number</td> <td>:</td><td> <?php echo $phone_number;?></td></tr>
												
												<tr><td>Present Address</td><td>:</td><td> <?php echo $cur_add;?></td></tr>
												
												<tr><td>Salary</td><td>:</td><td> <?php echo "".$salary." Taka";?></td></tr>
												
												 <?php if($duration=='2400000' || $duration>'2400000'){
	foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("240:00:00")') as $row) {
$newtime= $row['TIME_TO_SEC("240:00:00")'];
foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$newtime-$overtime;	
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{
	
	$overtime=(15000/208)*2*($remaining/3600);
	$net_salary=15000+$overtime;
}
if($category=='Floor_Incharge')
{
	$overtime=(12000/208)*2*($remaining/3600);
	$net_salary=12000+$overtime;
}
if($category=='Labour')
{
	$overtime=(10000/208)*2*($remaining/3600);
	$net_salary=10000+$overtime;
}
	?>
<tr><td>Overtime In last Month</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php }}} ?>

<?php if($duration<'2400000' && $duration>'160:00:00'){

foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$time-$overtime;
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{	$overtime=(15000/208)*2*($remaining/3600);
	$net_salary=15000+$overtime;

}
if($category=='Floor_Incharge')
{
		$overtime=(12000/208)*2*($remaining/3600);
	$net_salary=12000+$overtime;
}

if($category=='Labour')
{
		$overtime=(10000/208)*2*($remaining/3600);
	$net_salary=10000+$overtime;

}

	?>
<tr><td>Overtime In last Month</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php }} ?>
<?php if($duration=='1600000' ){
$net_salary=$salary;}
	?>

<?php if($duration<'1600000' ){
foreach(mysqli_query($conn,'SELECT TIME_TO_SEC("160:00:00")') as $row) {
$overtime= $row['TIME_TO_SEC("160:00:00")'];
$remaining=$overtime-$time;
$hours = floor($remaining / 3600);
$minutes = floor(($remaining / 60) % 60);
$seconds = $remaining % 60;
if($category='Supervisor')
{	$belowtime=($remaining/3600)*62.5;
	$net_salary=15000-$belowtime;

}
if($category=='Floor_Incharge')
{
		$belowtime=($remaining/3600)*50;
	$net_salary=12000-$belowtime;
}

if($category=='Labour')
{
	$belowtime=($remaining/3600)*41.7;
	$net_salary=10000-$belowtime;

}
}	?>
<tr><td>Your Less Worked Time In last Month</td><td>:</td><td><?php echo "".$hours."h:".$minutes."m:".$seconds."s";?></td></tr><?php } ?>

<tr><td>Net Salary</td><td>:</td><td><?php echo "".(int)$net_salary." Taka";?></td></tr>
												</table>
												</center>
												</div>
												
												
			<h3 align="center"></h3><center><input type="button" onclick="printDiv('printableArea')" value="Print!" /></center>

			<script>
			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}</script>
				
<?php 
}
else{
  $emp_iderror='Enter a Valid Id';
  $error='';
 }

}

?>
				</div>
				</center>
			</div>
				<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Search for Salary Query</h4>
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
		</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Search</button></form>
            </div>
        </section>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html><?php }?>