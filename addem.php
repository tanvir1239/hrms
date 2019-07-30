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
    <title>Admin - Add Employee</title>
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

<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Add Employee</h4>
                </div>
               <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group"><label for="username">FristName</label> <input class="form-control item" type="text" id="fname" name="fname" />
  <div><?php if(isset($fnameerror)){
    echo '<div class=error>'.$fnameerror.'</div>';}?></div></div>
 
<div class="form-group"><label for="fname">LastName</label> <input class="form-control item" type="text" id="lname" name="lname"/>
  <div><?php if(isset($lnameerror)){
    echo '<div class=error>'.$lnameerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="emp_id">EmployeeID</label><input class="form-control item" type="text" id="emp_id" name="emp_id"/>
  <div><?php if(isset($emp_iderror)){
    echo '<div class=error>'.$emp_iderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email"/>
  <div><?php if(isset($emailerror)){
    echo '<div class=error>'.$emailerror.'</div>';}?></div></div>

	 <label class="radio-inline">
      <input type="radio" name="sex" value="Male">Male
    </label>
	 <label class="radio-inline">
      <input type="radio" name="sex" value="Female">Female
    </label>
	<label class="radio-inline">
      <input type="radio" name="sex" value="Other">Other
    </label>
	<div><?php if(isset($sexerror)){
    echo '<div class=error>'.$sexerror.'</div>';}?></div>
	
	<div class="form-group"><label for="bday">BirthDate</label><input class="form-control item" type="date" id="bday" name="bday" />
  <div><?php if(isset($bdayerror)){
    echo '<div class=error>'.$bdayerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="phone_number">Phone No</label><input class="form-control item" type="tel" id="phone_number" name="phone_number" pattern="^(?:\+88|01)?\d{11}$"/>
  <div><?php if(isset($phone_numbererror)){
    echo '<div class=error>'.$phone_numbererror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="cur_add">Present Address</label><input class="form-control item" type="text" id="cur_add" name="cur_add"/>
  <div><?php if(isset($cur_adderror)){
    echo '<div class=error>'.$cur_adderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="addr">Parmanent Address</label><input class="form-control item" type="text" id="addr" name="addr"/>
  <div><?php if(isset($addrerror)){
    echo '<div class=error>'.$addrerror.'</div>';}?></div></div>
	
	<select type="text" class="form-control" id="category" name="category">
<option value="">Select Category</option>
         <option value="Labour">Labour</option>
         <option value="Line_Incharge">Line_Incharge</option>
         <option value="Supervisor">Supervisor</option>
      </select>
	   <div><?php if(isset($categoryerror)){
    echo '<div class=error>'.$categoryerror.'</div>';}?></div>
	</br>
			<select type="text" class="form-control" id="dept" name="dept">
<option value="">Select Department</option>
         <option value="cutting">Cutting</option>
         <option value="washing">Washing</option>
         <option value="taylor">Taylor</option>
      </select>
	   <div><?php if(isset($depterror)){
    echo '<div class=error>'.$depterror.'</div>';}?></div>
	</br>

		 </br><label class="radio-inline">
      <input type="radio" name="country" value="Bangladesh" checked>Bangladesh
    </label>
	 <label class="radio-inline">
      <input type="radio" name="country" value="Other">Other
    </label>
	<div><?php if(isset($countryerror)){
    echo '<div class=error>'.$countryerror.'</div>';}?></div>
	
	<input type="file" name="profile" id="profile"/><br/>

				</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Create Profile</button></form>
            </div>
        </section>
    </main>
 <?php }
 if($_SESSION['user']['role']=='registry'){
	 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - Add Employee</title>
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
    <main class="page landing-page">
        
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
                    <h4 class="text-info">Add Employee</h4>
                </div>
               <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group"><label for="username">FristName</label> <input class="form-control item" type="text" id="fname" name="fname" />
  <div><?php if(isset($fnameerror)){
    echo '<div class=error>'.$fnameerror.'</div>';}?></div></div>
 
<div class="form-group"><label for="fname">LastName</label> <input class="form-control item" type="text" id="lname" name="lname"/>
  <div><?php if(isset($lnameerror)){
    echo '<div class=error>'.$lnameerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="emp_id">EmployeeID</label><input class="form-control item" type="text" id="emp_id" name="emp_id"/>
  <div><?php if(isset($emp_iderror)){
    echo '<div class=error>'.$emp_iderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email"/>
  <div><?php if(isset($emailerror)){
    echo '<div class=error>'.$emailerror.'</div>';}?></div></div>

	 <label class="radio-inline">
      <input type="radio" name="sex" value="Male">Male
    </label>
	 <label class="radio-inline">
      <input type="radio" name="sex" value="Female">Female
    </label>
	<label class="radio-inline">
      <input type="radio" name="sex" value="Other">Other
    </label>
	<div><?php if(isset($sexerror)){
    echo '<div class=error>'.$sexerror.'</div>';}?></div>
	
	<div class="form-group"><label for="bday">BirthDate</label><input class="form-control item" type="date" id="bday" name="bday" />
  <div><?php if(isset($bdayerror)){
    echo '<div class=error>'.$bdayerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="phone_number">Phone No</label><input class="form-control item" type="tel" id="phone_number" name="phone_number" pattern="^(?:\+88|01)?\d{11}$"/>
  <div><?php if(isset($phone_numbererror)){
    echo '<div class=error>'.$phone_numbererror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="cur_add">Present Address</label><input class="form-control item" type="text" id="cur_add" name="cur_add"/>
  <div><?php if(isset($cur_adderror)){
    echo '<div class=error>'.$cur_adderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="addr">Parmanent Address</label><input class="form-control item" type="text" id="addr" name="addr"/>
  <div><?php if(isset($addrerror)){
    echo '<div class=error>'.$addrerror.'</div>';}?></div></div>
	
	<select type="text" class="form-control" id="category" name="category">
<option value="">Select Category</option>
         <option value="Labour">Labour</option>
         <option value="Line_Incharge">Line_Incharge</option>
         <option value="Supervisor">Supervisor</option>
      </select>
	   <div><?php if(isset($categoryerror)){
    echo '<div class=error>'.$categoryerror.'</div>';}?></div>
	</br>
		<select type="text" class="form-control" id="dept" name="dept">
<option value="">Select Department</option>
         <option value="cutting">Cutting</option>
         <option value="washing">Washing</option>
         <option value="taylor">Taylor</option>
      </select>
	   <div><?php if(isset($depterror)){
    echo '<div class=error>'.$depterror.'</div>';}?></div>
	</br>

		 </br><label class="radio-inline">
      <input type="radio" name="country" value="Bangladesh" checked>Bangladesh
    </label>
	 <label class="radio-inline">
      <input type="radio" name="country" value="Other">Other
    </label>
	<div><?php if(isset($countryerror)){
    echo '<div class=error>'.$countryerror.'</div>';}?></div>
	
	<input type="file" name="profile" id="profile"/><br/>

				</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Create Profile</button></form>
            </div>
        </section>
    </main>
 <?php } if(isset($error)){ echo $error; }?>
</body>
</html>

<?php if(isset($success)){
    echo $success;}?>
<?php if(isset($error)){
    echo $error;}?>
    </div>
	<?php
include("db.php");
if(isset($_POST['submit']))
{
	$size=$_FILES['profile']['size'];
	$temp=$_FILES['profile']['tmp_name'];
	$type=$_FILES['profile']['type'];
	$profile_name=$_FILES['profile']['name'];
	if($profile_name=="")
	{
		echo "<script>alert('Please Select image')</script>";
		exit;
	}
	elseif(($type=="image/jpeg") || ($type=="image/jpg") ||($type=="image/png") || ($type=="image/gif"))
	{
		move_uploaded_file($temp,"upload/$profile_name");
	}
	else{
		echo "<script>alert('Invalid format')</script>";
	}
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$emp_id=mysqli_real_escape_string($conn,$_POST['emp_id']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
    $sex=mysqli_real_escape_string($conn,$_POST['sex']);
	$bday=mysqli_real_escape_string($conn,$_POST['bday']);
	$phone_number=mysqli_real_escape_string($conn,$_POST['phone_number']);
	$cur_add=mysqli_real_escape_string($conn,$_POST['cur_add']);
	$addr=mysqli_real_escape_string($conn,$_POST['addr']);
	$dept=mysqli_real_escape_string($conn,$_POST['dept']);
	$category=mysqli_real_escape_string($conn,$_POST['category']);
    $country=mysqli_real_escape_string($conn,$_POST['country']);
if($category=='Supervisor')
{
	$salary=15000;
}
if($category=='Labour')
{
	$salary=10000;
}
if($category=='Line_Incharge')
{
	$salary=12000;
}
	$profile_name=$_FILES['profile']['name'];
	  $sql=mysqli_query($conn,"INSERT INTO employee(fname,lname,emp_id,email,sex,bday,phone_number,cur_add,addr,category,dept,country,profile,salary)
    VALUES('$fname','$lname','$emp_id','$email','$sex','$bday','$phone_number','$cur_add','$addr','$category','$dept',
	'$country','$profile_name','$salary')");
	if($sql)
	{
		echo "<script>alert('Information Save Succesfully')</script>";
	}
	else{
	echo "<script>alert('Insertion Failed')</script>";
	}
}
?>
