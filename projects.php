<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='admin'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - Projects Details</title>
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
    <?php
//including the database connection file
include("db.php");
session_start();
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM project"); // using mysqli_query instead
?>
</br><table class="table table-striped">
    
        <tr bgcolor='#CCCCCC'>
           <td>Serial NO.</td>
            <td>Manager Frist Name</td>
            <td>Manger Last Name</td>
            <td>Manager Department</td>
			<td>Assign Date</td>
            <td>Submission Date</td>
			
			<td>File</td>
            <td>File Type</td>
            <td>File Size(KB)</td>
			<td>View File</td>
			<td>Status</td>
            <td>Update</td>
		
        </tr>
<?php 
		$serial=0;
        while($row = mysqli_fetch_array($result)) {   		
		$serial++;
            echo "<tr>";
            echo "<td>$serial</td>";
            echo "<td>".$row['man_fname']."</td>";
            echo "<td>".$row['man_lname']."</td>";
            echo "<td>".$row['man_dept']."</td>";
			echo "<td>".$row['given_date']."</td>";
            echo "<td>".$row['sub_date']."</td>";
            echo "<td>".$row['file']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['size']."</td>";
            echo "<td><a href='project/".$row['file']."' target='_blank'>view file</a></td>";
			echo "<td>".$row['status']."</td>";
            echo "<td><a href=\"edit_pro.php?id=$row[id]\">Edit</a></td>";		
}
        ?>
	</table>

    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<?php }
if($_SESSION['user']['role']=='manager'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager -Project Details</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="manager.php">Home</a></li>
                 							  

							  
							  <li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link active" href="">View</a></li>
							  <div class="dropdown-content">
								<a href="projects.php">View Project</a>
								<a href="viewattendance.php">View Attendence</a>
								<a href="logged_in.php">View Logged in User</a>
								
							  </div>
							</div>
					 <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <?php
//including the database connection file
include("db.php");
session_start();
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM project WHERE status='Not Yet Done'"); // using mysqli_query instead
?>
 </br><table class="table table-striped">
    
        <tr bgcolor='#CCCCCC'>
           <td>Serial NO.</td>
            <td>Manager Frist Name</td>
            <td>Manger Last Name</td>
            <td>Manager Department</td>
			<td>SubmissionDate</td>
            
			<td>File</td>
            <td>File Type</td>
            <td>File Size(KB)</td>
			<td>View File</td>
			<td>Action</td>
		
        </tr>
<?php 
		$serial=0;
        while($row = mysqli_fetch_array($result)) {   		
		$serial++;
            echo "<tr>";
            echo "<td>$serial</td>";
            echo "<td>".$row['man_fname']."</td>";
            echo "<td>".$row['man_lname']."</td>";
            echo "<td>".$row['man_dept']."</td>";
				echo "<td>".$row['sub_date']."</td>";
            echo "<td>".$row['file']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td>".$row['size']."</td>";
            echo "<td><a href='project/".$row['file']."' target='_blank'>view file</a></td>";
			echo "<td><a href=\"pro_status.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to Submit?')\">Submit Project</a></td>";
			}
        ?>
	</table>

    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<?php } ?>