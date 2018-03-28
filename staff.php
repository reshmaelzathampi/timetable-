<?php include('header.php');
include("db.php");
$obj=new db();
?>
<style>
th{
	background:#7FAEF7;
	}
</style>
<h1 align="center" style="color:;">Staff Detail</h1>
<table width="100%"><tr><td>
<table align="center" style="margin-left:6em;">
<tr>
<th style="width:5em;">STAFF ID</th>
<th style="width:20em;">STAFF NAME</th>
<th style="width:5em;">OPERATIONS</th>
</tr>
<?php
$i=1;
$sql1="SELECT * FROM staff WHERE status=1 ";
$res1=$obj->exe($sql1);
while($r1=mysqli_fetch_array($res1))
{
	if($i%2==0){
?>
<tr>
<td style="width:5em; background:#827F7F;color:#FFFFFF;" align="center"><?php echo $r1[0];?></td>
<td style="width:20em;background:#827F7F;color:#FFFFFF;" align="center"><?php echo $r1[1];?></td>
<td style="width:5em;background:#827F7F;color:#FFFFFF;" align="center"><a href="delstaff.php?id=<?php echo $r1[0];?>">
<input type="button" value="DELETE"></a>
</td>
</tr>
<?php }
else{
?>
<tr>
<td style="width:5em; background:#FFFFFF;color:#000000;" align="center"><?php echo $r1[0];?></td>
<td style="width:20em;background:#FFFFFF;color:#000000;" align="center"><?php echo $r1[1];?></td>
<td style="width:5em;background:#FFFFFF;color:#000000;" align="center"><a href="delstaff.php?id=<?php echo $r1[0];?>">
<input type="button" value="DELETE"></a>
</td>
</tr>
<?php }
$i++;
} ?>
</table>
</td>
<td align="center">
<table align="center">
<tr>
<th colspan="2">ADD NEW STAFF</th>
</tr><form action="addstaff.php" method="post">
<tr style="height:3em;">
<td><br />Name</td>
<td><br /><input type="text" name="name" placeholder="Enter Staff Name" required style="width:15em;"></td>
</tr>
<tr style="height:3em;">
<td><br />Designation</td>
<td>
<br />
<select name="desig" required style="width:15em;">
<option selected disabled>Choose Designation</option>
<option value="Professor">Professor</option>
<option value="Associate Professor">AssociateProfessor</option>
<option value="Assistant Professor">Assistant Professor</option>
<option value="Lecturer">Lecturer</option>
</select>
</td>
</tr>
<tr><td colspan="2"><input type="submit" value="ADD TO REGISTER" style="width:100%"></td></tr>
</form>
</table>


</td>
</tr>
</table> 
 
 <?php include('footer.php');?>
