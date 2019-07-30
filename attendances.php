<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
include("db.php");
include("header.php");

?>
<form> <input class="btn btn-secondary" type="button" value="Back" onClick="javascript:history.go(-1)" /> </form>

<table class="table table-striped">
<tr>
<th>#serial No.</th><th>Employee Id</th><th>Login TIme</th><th>Logout Time</th><th>Duration</th>
</tr>


<?php
$result=mysqli_query($conn,"select * from attendance where date='$_POST[date]'");
$counter=0;
$serialnumber=0;
while($row=mysqli_fetch_array($result))
{
	$serialnumber++;
?>

<tr>
<td><?php echo $serialnumber;?></td>
<td><?php echo $row['emp_id'];?></td>
<td><?php echo $row['log_in_time'];?></td>
<td><?php echo $row['log_out_time'];?></td>
<td><?php echo $row['duration'];?></td>
</tr>
<?php
$counter++;
}
?>
</table>