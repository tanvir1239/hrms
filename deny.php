
<?php
session_start();
if($_SESSION['user']['role']=='manager'){
echo "<center>
<h1>You Are not Allowed To Access In this Section</h1>
<a href='manager.php'>Click Here To Go to your Home page</a></center>";
}
if($_SESSION['user']['role']=='registry'){
echo "<center>
<h1>You Are not Allowed To Access In this Section</h1>
<a href='manager.php'>Click Here To Go to your Home page</a></center>";
}
if($_SESSION['user']['role']=='admin'){
echo "<center>
<h1>Ooopss this Section is Preserved for Specified Users Only</h1>
<a href='admin.php'>Click Here To Go to your Home page</a></center>";
}

?>