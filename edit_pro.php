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
    <title>Registry -Update Project</title>
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
<?php
// including the database connection file
include_once("db.php");
include_once("header.php");
  
if(isset($_POST['update']))
{    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$man_fname = mysqli_real_escape_string($conn, $_POST['man_fname']);
	$man_lname = mysqli_real_escape_string($conn, $_POST['man_lname']);
	$man_dept = mysqli_real_escape_string($conn, $_POST['man_dept']);
$sub_date = mysqli_real_escape_string($conn, $_POST['sub_date']);
    // checking empty fields
    if(empty($man_fname) || empty($man_lname) || empty($man_dept)) {            
        if(empty($man_fname)) {
            echo "<font color='red'>Manager FirstName field is empty.</font><br/>";
        }
        
        if(empty($man_lname)) {
            echo "<font color='red'>Manager LastName field is empty.</font><br/>";
        }
        
        if(empty($man_fname)) {
            echo "<font color='red'>Manager Department field is empty.</font><br/>";
        }        
    }
if(isset($_FILES['file']['name']) && ($_FILES['file']['name']!=" "))
    {
	
    $fileName = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
	$uploadDir = "project/";
    $filePath = $uploadDir . $fileName;
 move_uploaded_file($tmpName,$filePath);
}


        //updating the table
        $result = mysqli_query($conn, "UPDATE project SET man_fname='$man_fname', man_lname='$man_lname',man_dept='$man_dept', 
		file='$filePath',sub_date='$sub_date' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: projects.php");
    }
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM project WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $man_fname = $res['man_fname'];
    $man_lname = $res['man_lname'];
    $man_dept = $res['man_dept'];
	$sub_date = $res['sub_date'];
	
	$file=$res['filePath'];
}
?>
<main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h4 class="text-info">Update Project Details</h4>
                </div>
                <form action="edit_pro.php" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label for="man_fname">Manager FirstName</label><input class="form-control item" type="text" id="man_fname" name="man_fname"  value="<?php echo $man_fname;?>">
					  <div><?php if(isset($man_fnameerror)){
    echo '<div class=error>'.$man_fnameerror.'</div>';}?></div>
</div>
                    <div class="form-group"><label for="man_lname">Manager LastName</label><input class="form-control item" type="text" id="man_lname" name="man_lname" value="<?php echo $man_lname;?>">
					 <div><?php if(isset($man_lnameerror)){
    echo '<div class=error>'.$man_lnameerror.'</div>';}?></div>
</div>
                   
<select type="text" class="form-control" id="man_dept" name="man_dept">
         <option value="washing"<?php echo ($man_dept=='washing')?'selected':'' ?>>Washing</option>
		 <option value="cutting"<?php echo ($man_dept=='cutting')?'selected':'' ?>>Cutting</option>
		 <option value="taylor"<?php echo ($man_dept=='taylor')?'selected':'' ?>>Taylor</option>
      </select>
	   <div><?php if(isset($man_depterror)){
    echo '<div class=error>'.$man_depterror.'</div>';}?></div>
	</br>
	
	
	
	<div class="form-group"><label for="sub_date">SubmissionDate</label><input class="form-control item" type="date" id="sub_date" name="sub_date" value="<?php echo $sub_date;?>"/>
  <div><?php if(isset($sub_dateerror)){
    echo '<div class=error>'.$sub_dateerror.'</div>';}?></div></div>
	
	<input type="file" name="file" id="file"><br/>
	
	<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				</br>	<button class="btn btn-primary btn-block" name="update" type="submit">Update Project</button>
				</form>
            </div>
        </section>
    </main>
   </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html><?php } ?>