
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>
<?php
include("db.php");
session_start();
//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  
  if(empty($username)&&empty($passwordmd5)){
  $error='';
  $usernameerror='Please Enter Your UserName';
  $error='';
  $passerror='Please Enter Your PassWord';
  
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT*FROM user WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);

 if($count==1){
      $_SESSION['user']=array(
   'username'=>$row['username'],
   'password'=>$row['password'],
   'role'=>$row['role']
   );
   $role=$_SESSION['user']['role'];
   //Redirecting User Based on Role
    switch($role){
  case 'registry':
  header('location:registry.php');
  break;
  case 'manager':
  header('location:manager.php');
  break;
  case 'admin':
  header('location:admin.php');
  break;
 }
 }else{
 $error='Your PassWord or UserName is not Found';
 }
}
}
?>
<!DOCTYPE html>
<html>
<head>	 
    <title>Mehedi Knit Wear Ltd..</title>
        <script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script>
  
        <style >
          .error{
   color:red;
   font-weight:bold;
   font-style:italic;
  }
        #frame {
            width: 500px;
            margin: auto;
            margin-top: 125px;
            border: solid 1px #CCC; /* SOME CSS3 DIV SHADOW */
            -webkit-box-shadow: 0px 0px 10px #CCC;
            -moz-box-shadow: 0px 0px 10px #CCC;
            box-shadow: 0px 0px 10px #CCC; /* CSS3 ROUNDED CORNERS */
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -khtml-border-radius: 5px;
            border-radius: 5px;
            background-color: #FFF;
        }
  #frame h1 {
            text-align: center;
        }
		  #frame form {
            text-align: center;
            margin-bottom: 30px;
        }
	
input[type=submit] {
    width: 30%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 180px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}.content {
max-width:500px;
margin: auto;
margin-top: 15%;

}
body, html {
  height: 100%;
}

* {
  box-sizing: border-box;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

body{
	background: url('assets/img/login.jpg');
	background-size: cover;
	background-repeat: no-repeat;
}



</style>
</head>
<body>
	<div id="image">
	
 <div id='frame'>
 <div class='search'><h1>Sign In Here</h1>
<form method="POST" action="">
<div class="content">
  <input type="text" id="username" name="username" placeholder="UserName"/>
  <div><?php if(isset($usernameerror)){
    echo '<div class=error>'.$usernameerror.'</div>';}?></div>
  <input type="password" id="password" name="password" placeholder="PassWord"/>
 <div><?php if(isset($passerror)){
    echo '<div class=error>'.$passerror.'</div>';}?></div>

  <input type="submit" name="login" value="Login">
  </div>
</form>
</div>
</div>
</div>
<?php if(isset($error)){ echo $error; }?>
</body>
