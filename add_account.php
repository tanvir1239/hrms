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
    <title>Admin - Create Account</title>
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

<?php
include("db.php");
if(isset($_POST['submit'])){
 //UserName Checking
 if(!empty($_POST['username'])){
  //Cheking for White Space
  $username=preg_match('/\s/',$_POST['username']);
  if($username==0){
  $result=mysqli_query($conn,"SELECT*FROM user WHERE username='".$_POST['username']."'");
  $count=$result->num_rows;
  if($count==1){
   $error='';
   $usernameerror="Sorry UserName <font color=green> $_POST[username]</font> Already Taken";
  }
 }else{
  $error='';
  $usernameerror='White Space are Not Allowed';
 }
 }else{
  $usernameerror='UserName Can not Be Empty';
  $error='';
 }
  if(!empty($_POST['password'])){
    if(strlen($_POST['password'])<8){
     $passerror='Your Password Should not be less Than 8 Characters';
     $error='';
    }
   }else{
     $passerror='Your Password Cannot be Empty';
  $error='';
   }
   //Type Checking
   if(empty($_POST['role'])){
    $roleerror="Your role Can Not be Empty";
   $error='';
   }
 
 //Inserting Data
 if(!isset($error)){
  //Inserting User Info Into Database
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
	$role=mysqli_real_escape_string($conn,$_POST['role']);
	
    $result=mysqli_query($conn,"INSERT INTO user(username,password,role)
    VALUES('$username','$password','$role')");
    if($result){
     $success="<script type='text/javascript'>alert('Suuccess')</script>";
    }else{
     $error= "<script type='text/javascript'>alert('Oops Something Went Wrong,Please Try Again!')</script>";
    }
 }

}
?>

<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Create Account</h4>
                </div>
                <form method="POST" action="">
                    <div class="form-group"><label for="username">UserName</label><input class="form-control item" type="text" name="username" id="username">
					  <div><?php if(isset($usernameerror)){
    echo '<div class=error>'.$usernameerror.'</div>';}?></div>
</div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" name="password" type="password" id="password">
					 <div><?php if(isset($passerror)){
    echo '<div class=error>'.$passerror.'</div>';}?></div>
</div>
                    <div><select type="text" class="form-control" id="type" name="role">
<option value="">Select Type</option>
         <option value="admin">Admin</option>
         <option value="registry">Registry</option>
         <option value="manager">Manager</option>
      </select>
	   <div><?php if(isset($roleerror)){
    echo '<div class=error>'.$roleerror.'</div>';}?></div>
</div>
				</br>	<button class="btn btn-primary btn-block" name="submit" type="submit">Create Account</button></form>
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