<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='admin'){
	?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Employee Info</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="admin.php">Home</a></li>
                 							  
                 

                    
					<li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link" href="">Add</a></li>
							  <div class="dropdown-content">
								<a href="add_account.php">Account</a>
								<a href="addem.php">Employee</a>
								
							  </div>
							  </div>
							  
							  <li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link active" href="">View</a></li>
							  <div class="dropdown-content">
								<a href="employees.php">Employee Profile</a>
								<a href="accounts.php">Account Information</a>
								<a href="viewattendance.php">View Attendence</a>
								
							  </div>
							</div>
                   
					<li class="nav-item" role="presentation"><a class="nav-link" href="salary.php">Salary</a></li>
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
<form action="empdf.php" method="post">
<input type="text" name="emp_id" id="emp_id">
<input type="submit" name="submit" value="print">
</form>
 <table class="table table-striped">
    
        <tr bgcolor='#CCCCCC'>
           <td>Serial NO.</td>
            <td>Frist Name</td>
            <td>Last Name</td>
            <td>Employee ID</td>
			<td>Email</td>
            <td>Sex</td>
            <td>Birth Date</td>
            <td>Phone Number</td>
			<td>Present Address</td>
            <td>Parmanent Address</td>
			
            <td>Category</td>
            <td>Department</td>
           
			<td>Salary(in Tk)</td>
			 <td>Country</td>
			<td>Photo</td>
            <td>Action</td>
		
        </tr>
<?php 
		$serial=0;
		include("db.php");
$result = mysqli_query($conn, "SELECT * FROM employee");
        while($res = mysqli_fetch_array($result)) {

?>		
            <tr>
            <td><?php echo $serial;?></td>
            <td><?php echo $res['fname'];?></td>
            <td><?php echo $res['lname'];?></td>
            <td><?php echo $res['emp_id'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['sex'];?></td>
            <td><?php echo $res['bday'];?></td>
            <td><?php echo $res['phone_number'];?></td>
            <td><?php echo $res['cur_add'];?></td>
            <td><?php echo $res['addr'];?></td>
			<td><?php echo $res['category'];?></td>
			<td><?php echo $res['dept'];?></td>
			<td><?php echo $res['salary'];?></td>
			<td><?php echo $res['country'];?></td>
			<td><img src="upload/<?php echo $res['profile'];?>" style="width:50px;height:50px;"/></td>
			<td><a href="edit_em.php?id=<?php echo $res['id'];?>">Edit</a>|<a href="del_em.php?id=<?php echo $res['id'];?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
<?php 
$serial++;
} }if($_SESSION['user']['role']=='registry'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry -Employee Info</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="registry.php">Home</a></li>
                 							  
                 

                    
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
</center>	
<form action="empdf.php" method="post">
<input type="text" name="emp_id" id="emp_id">
<input type="submit" name="submit" value="print">
</form>
 <table class="table table-striped">
    
        <tr bgcolor='#CCCCCC'>
           <td>Serial NO.</td>
            <td>Frist Name</td>
            <td>Last Name</td>
            <td>Employee ID</td>
			<td>Email</td>
            <td>Sex</td>
            <td>Birth Date</td>
            <td>Phone Number</td>
			<td>Present Address</td>
            <td>Parmanent Address</td>
			<td>Category</td>
            
            <td>Department</td>
			<td>Salary(in Tk)</td>
            
            <td>Country</td>
			<td>Photo</td>
            <td>Action</td>
		
        </tr>
<?php 
		$serial=0;
		include("db.php");
$result = mysqli_query($conn, "SELECT * FROM employee");
        while($res = mysqli_fetch_array($result)) {         
?>		
            <tr>
            <td><?php echo $serial;?></td>
            <td><?php echo $res['fname'];?></td>
            <td><?php echo $res['lname'];?></td>
            <td><?php echo $res['emp_id'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['sex'];?></td>
            <td><?php echo $res['bday'];?></td>
            <td><?php echo $res['phone_number'];?></td>
            <td><?php echo $res['cur_add'];?></td>
            <td><?php echo $res['addr'];?></td>
			<td><?php echo $res['category'];?></td>
            
            <td><?php echo $res['dept'];?></td>
			<td><?php echo $res['salary'];?></td>
			<td><?php echo $res['country'];?></td>
			
			<td><img src="upload/<?php echo $res['profile'];?>" style="width:50px;height:50px;"/></td>
			<td><a href="edit_em.php?id=<?php echo $res['id'];?>">Edit</a>|<a href="del_em.php?id=<?php echo $res['id'];?>" onClick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
<?php 
$serial++;
} }
?>