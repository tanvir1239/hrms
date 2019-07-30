<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager' || $_SESSION['user']['role']=='registry'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='admin'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Accounts Info</title>
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
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">Add</a></li>
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

	<?php
//including the database connection file
include("db.php");
$result = mysqli_query($conn, "SELECT * FROM user"); // using mysqli_query instead
?>
<center>


 <table class="table table-striped">
    
        <tr bgcolor='#CCCCCC'>
		
            <td>Serial_No.</td>
            <td>UserName</td>
            <td>Password</td>
            <td>Role</td>
            <td>Update</td>

        </tr>
        <?php 
		$serial=0;
        while($res = mysqli_fetch_array($result)) {         
		$serial++;
            echo "<tr>";
            echo "<td>$serial</td>";
            echo "<td>".$res['username']."</td>";
            echo "<td>".$res['password']."</td>";
            echo "<td>".$res['role']."</td>";    
            echo "<td><a href=\"edit_ac.php?id=$res[id]\">Edit</a> | <a href=\"del_ac.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
           //echo "<td><form action='' method='GET'><input type='submit' name='print".$row['id']."' value='Print'></form></td>";
			
	   }
	   
        ?>
    </table>
</body>
</html><?php } ?>