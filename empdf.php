<?php
session_start();
if(empty($_SESSION['user'])){
 header('location:error.php');
}
if($_SESSION['user']['role']=='manager'){
 header('location:deny.php');
}
if($_SESSION['user']['role']=='registry' || $_SESSION['user']['role']=='admin'){
include("db.php");
	 if(isset($_POST['submit'])){
		$result=mysqli_query($conn,"SELECT*FROM employee WHERE emp_id='".$_POST['emp_id']."'");
		$count=$result->num_rows;
if($count==1)		{
while ($row = $result->fetch_assoc())				 
				 {
				
					 ?>
					 <style>
							.s{
							border:3px solid black;
							height:100% px;
							width:450px;
							align:center;
							background-color:white;
						}
@media print{
   .noprint{
       display:none;
   }
 
}

					</style>
					<center>
						<div id="printableArea">
					<div class="s" >	
							<center>
							<h2>Mehedi Knit Wears Ltd.</h2>
							<h4>mehedi@gmail.com</h4>
							<h4><?php echo date("d M Y")?></h4>								
								<table style="width:100%"><td>
								<img src="upload/<?php echo $row['profile'];?>" style="width:100px;height:100px;"/>
								</td>
								<tr>
									<td>Full Name</td> 
									<td>:</td><td>
									<?php echo "".$row['fname']." ".$row['lname']."";?></td>
								</tr>
												<tr><td>Employee ID</td><td>:</td><td> <?php echo $row['emp_id'];?> </td></tr>
												
											    <tr><td>Email</td> <td>:</td><td> <?php echo $row['email'];?></td></tr>
												
												<tr><td>Sex</td><td>:</td><td> <?php echo $row['sex'];?></td></tr>
												
												<tr><td>Birth Date</td><td>:</td><td> <?php echo $row['bday'];?> </td></tr>
												
											    <tr><td>Phone Number</td> <td>:</td><td> <?php echo $row['phone_number'];?></td></tr>
											
												<tr><td>Present Address</td><td>:</td><td> <?php echo $row['cur_add'];?></td></tr>
												
												<tr><td>Parmanent Address</td><td>:</td><td> <?php echo $row['addr'];?> </td></tr>
												
												<tr><td>Category</td><td>:</td><td> <?php echo $row['category'];?> </td></tr>
												
											    <tr><td>Department</td> <td>:</td><td> <?php echo $row['dept'];?></td></tr>
												
												<tr><td>Country</td><td>:</td><td> <?php echo $row['country'];?></td></tr>
												
												</table>
												</center>
												</div>							
		<div class="noprint">	<h3 align="center"></h3><center><input type="button" onclick="printDiv('printableArea')" value="Confirm!" />
		<form> 
		<input class="btn btn-info pull-right non-printable" type="button" value="Cencel" onClick="javascript:history.go(-1)" /> </form>
		
		</center></div>
		

			<script>
			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}</script>
				
<?php }}else
{
echo "Nothing Found</br>
<a href='employees.php'>Go Back";
}	

}}?>	
				</div>
			

</body>
</html>