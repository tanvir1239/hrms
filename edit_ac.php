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
    <title>Admin -Edit Account</title>
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
<?php
// including the database connection file
include_once("db.php");
  
if(isset($_POST['update']))
{    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$role = mysqli_real_escape_string($conn, $_POST['role']);
    
    // checking empty fields
    if(empty($username) || empty($password) || empty($role)) {            
        if(empty($username)) {
            echo "<font color='red'>UserName field is empty.</font><br/>";
        }
        
        if(empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        
        if(empty($role)) {
            echo "<font color='red'>Role field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE user SET username='$username',password='$password',role='$role' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: accounts.php");
		if(mysqli_affected_rows()>=1){
echo "<p>($id) Record Updated<p>";
}else{
echo "<p>($id) Not Updated<p>";
}
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $username = $res['username'];
    $password = $res['password'];
    $role = $res['role'];
}
?>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Update Account</h4>
                </div>
                <form method="POST" action="">
                    <div class="form-group"><label for="username">UserName</label><input class="form-control item" type="text" name="username" id="username" value="<?php echo $username;?>">
					  <div><?php if(isset($usernameerror)){
    echo '<div class=error>'.$usernameerror.'</div>';}?></div>
</div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" name="password" type="password" id="password" value="<?php echo $password;?>">
					 <div><?php if(isset($passerror)){
    echo '<div class=error>'.$passerror.'</div>';}?></div>
</div>
      <select type="text" class="form-control" id="type" name="role">

         <option value="admin" <?php echo ($role=='admin')?'selected':'' ?>>Admin</option>
         <option value="registry" <?php echo ($role=='registry')?'selected':'' ?>>Registry</option>
         <option value="manager" <?php echo ($role=='manager')?'selected':'' ?>>Manager</option>
      </select>
	<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
</br>	<button class="btn btn-primary btn-block" name="update" type="submit">Update Account</button></form>
            </div>
        </section>
    </main>
	 </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html><?php } ?>