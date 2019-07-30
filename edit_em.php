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
    <title>Admin - Update Employee</title>
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
include("db.php");
$id = $_GET['id'];
$select=mysqli_query($conn,"select * from employee where id='$id'");
while($row = $select->fetch_assoc()) {
	$pic = $row['profile'];
?>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Add Employee</h4>
                </div>
               <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group"><label for="username">FirstName</label> <input class="form-control item" type="text" id="fname" name="fname" value="<?= $row['fname'];?>"/>
  <div><?php if(isset($fnameerror)){
    echo '<div class=error>'.$fnameerror.'</div>';}?></div></div>
 
<div class="form-group"><label for="fname">LastName</label> <input class="form-control item" type="text" id="lname" name="lname" value="<?= $row['lname'];?>"/>
  <div><?php if(isset($lnameerror)){
    echo '<div class=error>'.$lnameerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="emp_id">EmployeeID</label><input class="form-control item" type="text" id="emp_id" name="emp_id" value="<?= $row['emp_id'];?>"/>
  <div><?php if(isset($emp_iderror)){
    echo '<div class=error>'.$emp_iderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email" value="<?= $row['email'];?>"/>
  <div><?php if(isset($emailerror)){
    echo '<div class=error>'.$emailerror.'</div>';}?></div></div>

	 <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Male' )?'checked':''?> value="Male">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Female' )?'checked':''?>
                            value="Female">Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Other' )?'checked':''?>
                            value="Other">Other
                        </label>
                        <div>
                            <?php if(isset($sexerror)){
                                    echo '<div class=error>'.$sexerror.'</div>';}?>
                        </div>
	
	<div class="form-group"><label for="bday">BirthDate</label><input class="form-control item" type="date" id="bday" name="bday" value="<?= $row['bday'];?>"/>
  <div><?php if(isset($bdayerror)){
    echo '<div class=error>'.$bdayerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="phone_number">Phone No</label><input class="form-control item" type="tel" id="phone_number" name="phone_number" pattern="^(?:\+88|01)?\d{11}$" value="<?= $row['phone_number'];?>"/>
  <div><?php if(isset($phone_numbererror)){
    echo '<div class=error>'.$phone_numbererror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="cur_add">Present Address</label><input class="form-control item" type="text" id="cur_add" name="cur_add" value="<?= $row['cur_add'];?>"/>
  <div><?php if(isset($cur_adderror)){
    echo '<div class=error>'.$cur_adderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="addr">Parmanent Address</label><input class="form-control item" type="text" id="addr" name="addr" value="<?= $row['addr'];?>"/>
  <div><?php if(isset($addrerror)){
    echo '<div class=error>'.$addrerror.'</div>';}?></div></div>

		<select type="text" class="form-control" id="category" name="category">

                            <option value="Labour" <?=($row['category']=='Labour' )?'selected':'' ?>>Labour</option>
                            <option value="Line_Incharge" <?=($row['category']=='Line_Incharge' )?'selected':'' ?>>Line_Incharge</option>
                            <option value="Supervisor" <?=($row['category']=='Supervisor' )?'selected':'' ?>>Supervisor</option>
                        </select>
                        <div>
                            <?php if(isset($categoryerror)){
                                echo '<div class=error>'.$categoryerror.'</div>';}?>
                        </div>
</br>
	
	<select type="text" class="form-control" id="dept" name="dept">

                            <option value="cutting" <?=($row['dept']=='cutting' )?'selected':'' ?>>Cutting</option>
                            <option value="washing" <?=($row['dept']=='washing' )?'selected':'' ?>>Washing</option>
                            <option value="taylor" <?=($row['dept']=='taylor' )?'selected':'' ?>>Taylor</option>
                        </select>
                        <div>
                            <?php if(isset($depterror)){
                                echo '<div class=error>'.$depterror.'</div>';}?>
                        </div>
                        </br>
                        <label class="radio-inline">
                            <input type="radio" name="country" <?=($row['country']=='Bangladesh' )?'checked':'' ?>
                            value="Bangladesh">Bangladesh
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="country" <?=($row['country']=='Other' )?'checked':'' ?>
                            value="Other">Other
                        </label>
                        <div>
                            <?php if(isset($countryerror)){
                                echo '<div class=error>'.$countryerror.'</div>';}?>
                        </div>
	<td><img src="upload/<?php echo $row['profile'];?> " style="width:100px;height:100px;" />
	<input type="file" name="profile" id="profile"/><br/>

				</br>	<button class="btn btn-primary btn-block" name="update" type="submit">Update Profile</button></form>
            </div>
        </section>
    </main>
<?php } ?>
<?php
if(isset($_POST['update']))
  {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$emp_id=$_POST['emp_id'];
	$email=$_POST['email'];
    $sex=$_POST['sex'];
	$bday=$_POST['bday'];
	$phone_number=$_POST['phone_number'];
	$cur_add=$_POST['cur_add'];
	$addr=$_POST['addr'];
	$dept=$_POST['dept'];
    $country=$_POST['country'];
$category= $_POST['category'];
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
    if(isset($_FILES['profile']['name']) && ($_FILES['profile']['name']!=""))
    {
        $size=$_FILES['profile']['size'];
        $temp=$_FILES['profile']['tmp_name'];
        $type=$_FILES['profile']['type'];
        $profile_name=$_FILES['profile']['name'];
        unlink("upload/$old_image");
        move_uploaded_file($temp,"upload/$profile_name");
    }
else 
{ 
	$profile_name=$old_image;
}
 $update =mysqli_query($conn, "UPDATE employee SET fname='$fname',lname='$lname', emp_id='$emp_id',email='$email',sex='$sex',bday='$bday',phone_number='$phone_number',cur_add='$cur_add', addr='$addr', dept='$dept', category='$category', country='$country',profile='$profile_name',salary='$salary' WHERE id='$id'");
 if($update)
	{
		echo "<script>alert('Information Update Succesfully')</script>";
		echo "<script>window.open('employees.php','_self')</script>";
	}
	else{
	echo "<script>alert('Updation Failed')</script>";
	echo "<script>window.open('employees.php','_self')</script>";
	}
}}if($_SESSION['user']['role']=='registry'){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry - Update Employee</title>
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
							   <li class="nav-item" role="presentation"><a class="nav-link " href="">View</a></li>
							  <div class="dropdown-content">
								<a href="employees.php">Employee Profile</a>
								<a href="projects.php">Project Details</a>
								<a href="viewattendance.php">View Attendence</a>
								
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
<?php 
include("db.php");
$id = $_GET['id'];
$select=mysqli_query($conn,"select * from employee where id='$id'");
while($row = $select->fetch_assoc()) {
	
	$pic = $row['profile'];
?>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Update Employee</h4>
                </div>
               <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group"><label for="username">FirstName</label> <input class="form-control item" type="text" id="fname" name="fname" value="<?= $row['fname'];?>"/>
  <div><?php if(isset($fnameerror)){
    echo '<div class=error>'.$fnameerror.'</div>';}?></div></div>
 
<div class="form-group"><label for="fname">LastName</label> <input class="form-control item" type="text" id="lname" name="lname" value="<?= $row['lname'];?>"/>
  <div><?php if(isset($lnameerror)){
    echo '<div class=error>'.$lnameerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="emp_id">EmployeeID</label><input class="form-control item" type="text" id="emp_id" name="emp_id" value="<?= $row['emp_id'];?>"/>
  <div><?php if(isset($emp_iderror)){
    echo '<div class=error>'.$emp_iderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="email">Email</label><input class="form-control item" type="email" id="email" name="email" value="<?= $row['email'];?>"/>
  <div><?php if(isset($emailerror)){
    echo '<div class=error>'.$emailerror.'</div>';}?></div></div>

	 <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Male' )?'checked':''?> value="Male">Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Female' )?'checked':''?>
                            value="Female">Female
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" <?=($row['sex']=='Other' )?'checked':''?>
                            value="Other">Other
                        </label>
                        <div>
                            <?php if(isset($sexerror)){
                                    echo '<div class=error>'.$sexerror.'</div>';}?>
                        </div>
	
	<div class="form-group"><label for="bday">BirthDate</label><input class="form-control item" type="date" id="bday" name="bday" value="<?= $row['bday'];?>"/>
  <div><?php if(isset($bdayerror)){
    echo '<div class=error>'.$bdayerror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="phone_number">Phone No</label><input class="form-control item" type="tel" id="phone_number" name="phone_number" pattern="^(?:\+88|01)?\d{11}$" value="<?= $row['phone_number'];?>"/>
  <div><?php if(isset($phone_numbererror)){
    echo '<div class=error>'.$phone_numbererror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="cur_add">Present Address</label><input class="form-control item" type="text" id="cur_add" name="cur_add" value="<?= $row['cur_add'];?>"/>
  <div><?php if(isset($cur_adderror)){
    echo '<div class=error>'.$cur_adderror.'</div>';}?></div></div>
	
	<div class="form-group"><label for="addr">Parmanent Address</label><input class="form-control item" type="text" id="addr" name="addr" value="<?= $row['addr'];?>"/>
  <div><?php if(isset($addrerror)){
    echo '<div class=error>'.$addrerror.'</div>';}?></div></div>
	

		<select type="text" class="form-control" id="category" name="category">

                            <option value="Labour" <?=($row['category']=='Labour' )?'selected':'' ?>>Labour</option>
                            <option value="Line_Incharge" <?=($row['category']=='Line_Incharge' )?'selected':'' ?>>Line_Incharge</option>
                            <option value="Supervisor" <?=($row['category']=='Supervisor' )?'selected':'' ?>>Supervisor</option>
                        </select>
                        <div>
                            <?php if(isset($categoryerror)){
                                echo '<div class=error>'.$categoryerror.'</div>';}?>
                        </div>

	</br>
	<select type="text" class="form-control" id="dept" name="dept">

                            <option value="cutting" <?=($row['dept']=='cutting' )?'selected':'' ?>>Cutting</option>
                            <option value="washing" <?=($row['dept']=='washing' )?'selected':'' ?>>Washing</option>
                            <option value="taylor" <?=($row['dept']=='taylor' )?'selected':'' ?>>Taylor</option>
                        </select>
                        <div>
                            <?php if(isset($depterror)){
                                echo '<div class=error>'.$depterror.'</div>';}?>
                        </div>
                        </br>  </br>
                        <label class="radio-inline">
                            <input type="radio" name="country" <?=($row['country']=='Bangladesh' )?'checked':'' ?>
                            value="Bangladesh">Bangladesh
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="country" <?=($row['country']=='Other' )?'checked':'' ?>
                            value="Other">Other
                        </label>
                        <div>
                            <?php if(isset($countryerror)){
                                echo '<div class=error>'.$countryerror.'</div>';}?>
                        </div>
	<td><img src="upload/<?php echo $row['profile'];?> " style="width:100px;height:100px;" />
	<input type="file" name="profile" id="profile"/><br/>

				</br>	<button class="btn btn-primary btn-block" name="update" type="submit">Update Profile</button></form>
            </div>
        </section>
    </main>
<?php } ?>
<?php
if(isset($_POST['update']))
  {
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$emp_id= $_POST['emp_id'];
	$email= $_POST['email'];
    $sex= $_POST['sex'];
	$bday= $_POST['bday'];
	$phone_number= $_POST['phone_number'];
	$cur_add= $_POST['cur_add'];
	$addr= $_POST['addr'];
	$dept= $_POST['dept'];
	$category= $_POST['category'];
    $country= $_POST['country'];
	$salary= $_POST['salary'];
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
	$profile_name = $_FILES['profile']['name'];
	$profile_tamp_name = $_FILES['profile']['tmp_name'];
	$profile_siz = $_FILES['profile']['size'];
	$profile_type = $_FILES['profile']['type'];
	
	if (empty($profile_name)) 
	{
		$profile_name = $pic;
	}

	
	
	
 $update =mysqli_query($conn, "UPDATE employee SET fname='$fname',lname='$lname', emp_id='$emp_id',email='$email',sex='$sex',bday='$bday',phone_number='$phone_number',cur_add='$cur_add', addr='$addr',category='$category', dept='$dept', country='$country',profile='$profile_name',salary='$salary' WHERE id='$id'");
 if($update)
	{
		echo "<script>alert('Information Update Succesfully')</script>";
		echo "<script>window.open('employees.php','_self')</script>";
	}
	else{
	echo "<script>alert('Updation Failed')</script>";
	echo "<script>window.open('employees.php','_self')</script>";
	}
}}?>