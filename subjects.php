<?php include('header.php');
include("db.php");
$obj=new db();
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
function showHint(str)
{
if (str.length==0)
  {
  document.getElementById("Hint").innerHTML="";
  return;
  } 

else
  {
   var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("t2").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsubs.php?q="+str,true);
xmlhttp.send();
}
}
</script>
<style>
th{
	background:#7FAEF7;
	}
</style>
<h1 align="center" style="color:">Subject Details</h1>
<table width="100%">
<tr><td>
<table style="margin-left:6em;" align="center">
<tr style="height:2em;">
<td style="font-style:normal;font-weight:bold;"> Filter By Semester&nbsp;&nbsp;&nbsp;</td>
<td> <select name="state" onchange="showHint(this.value)" required>
	<option value="0">Select Semester</option>
	<option value="1">1</option>
	<option value="3">3</option>
    <option value="5">5</option>
    </select>
</td>
</tr>
</table>
<table align="center" style="margin-left:6em;" id="t2">
<tr>
<th style="width:2em;">ID</th>
<th style="width:20em;">SUBJECT</th>
<th style="width:5em;">CODE</th>
<th style="width:2em;">SEMESTER</th>
<th style="width:5em;">OPERATIONS</th>
</tr>
<?php
$i=1;
$sqlj="SELECT * FROM subjects WHERE status=1 ";
$resj=$obj->exe($sqlj);
while($rj=mysqli_fetch_array($resj))
{
	if($i%2==0){
?>
<tr>
<td style="width:2em; background:#827F7F;color:#FFFFFF;" align="center"><?php echo $rj[0];?></td>
<td style="width:20em;background:#827F7F;color:#FFFFFF;" align="center"><?php echo $rj[1];?></td>
<td style="width:5em; background:#827F7F;color:#FFFFFF;" align="center"><?php echo $rj[2];?></td>
<td style="width:2em;background:#827F7F;color:#FFFFFF;" align="center"><?php echo $rj[3];?></td>
<td style="width:5em;background:#827F7F;color:#FFFFFF;" align="center"><a href="delsubj.php?id=<?php echo $rj[0];?>">
<input type="button" value="DELETE"></a>
</td>
</tr>
<?php }
else{
?>
<tr>
<td style="width:2em; background:#FFFFFF;color:#000000;" align="center"><?php echo $rj[0];?></td>
<td style="width:20em;background:#FFFFFF;color:#000000;" align="center"><?php echo $rj[1];?></td>
<td style="width:5em; background:#FFFFFF;color:#000000;" align="center"><?php echo $rj[2];?></td>
<td style="width:2em;background:#FFFFFF;color:#000000;" align="center"><?php echo $rj[3];?></td>
<td style="width:5em;background:#FFFFFF;color:#000000;" align="center"><a href="delsubj.php?id=<?php echo $rj[0];?>">
<input type="button" value="DELETE"></a>
</td>
</tr>
<?php }
$i++;
} ?>
</table>
</td>
<td align="center">

<form method="post" action="addsubject.php" enctype="multipart/form-data">
<table>   
	<tr>
    <td colspan="2" style="height:3em;background:color:#FFFFFF;" align="center">ADD NEW SUBJECT </td>
    </tr> 
  <tr>
    <td style="height:3em;"> Semester  </td>
    <td><select name="sem" required style="width:15em;">
	<option value="0">Select Semester</option>
	<option value="1">1</option>
	<option value="3">3</option>
    <option value="5">5</option>
    </select>
	</td>
  </tr>
  	<tr style="height:3em;">
    <td> Subject  </td>
    <td><input type="text" name="subject" required placeholder="Subject Name" style="width:15em;"></td>
	</tr>
    <tr>
    <td style="height:3em;"> Code  </td>
    <td><input type="text" name="scode" required placeholder="Subject Code" style="width:15em;"></td>
	</tr>
    
	
	
 <tr>
 <td colspan="2" style="height:3em;"><input type="submit" value="ADD SUBJECT" style="width:100%;"></td>
 </form></tr></table>
 
 </td>
</tr>
</table> 
 
 <?php include('footer.php');?>
