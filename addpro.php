<?php
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
    <title>Registry - Add project</title>
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
							   <li class="nav-item" role="presentation"><a class="nav-link active" href="">Add</a></li>
							  <div class="dropdown-content">
								<a href="addpro.php">Project</a>
								<a href="addem.php">Employee</a>
								
							  </div>
							  </div>
							  
							  <li <div a class="dropdown"> </a></li>
							<div class="dropdown">
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">View</a></li>
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

         
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>
</html>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Add Project for Manager</h4>
                </div>
                <form action="add_pro.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label for="man_fname">Manager FirstName</label><input class="form-control item" type="text" id="man_fname" name="man_fname">
					  <div><?php if(isset($man_fnameerror)){
    echo '<div class=error>'.$man_fnameerror.'</div>';}?></div>
</div>
                    <div class="form-group"><label for="man_lname">Manager LastName</label><input class="form-control item" type="text" id="man_lname" name="man_lname">
					 <div><?php if(isset($man_lnameerror)){
    echo '<div class=error>'.$man_lnameerror.'</div>';}?></div>
</div>
                   
				   <select type="text" class="form-control" id="man_dept" name="man_dept">
<option value="">Select Manager Department</option>
         <option value="cutting">Cutting</option>
         <option value="washing">Washing</option>
         <option value="taylor">Taylor</option>
      </select></br>
	 
	 	<div class="form-group"><label for="sub_date">SubmissionDate</label><input class="form-control item" type="date" id="sub_date"
		name="sub_date" />
  <div><?php if(isset($sub_dateerror)){
    echo '<div class=error>'.$sub_dateerror.'</div>';}?></div></div>
	 
	 <p>Please choose a file for further details of project</p>
	<input type="file" name="file" size="2000000" accept=".doc,.docx,.xml,application/pdf,application/msword,
	application/vnd.openxmlformats-officedocument.wordprocessingml.document"><br/>
				</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Assign Project</button></form>
            </div>
        </section>
    </main>



<?php if(isset($error)){ echo $error; }?>
</body>
</html>

<?php if(isset($success)){
    echo $success;}?>
<?php if(isset($error)){
echo $error;}}?>
    </div>