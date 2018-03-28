<?php
include("db.php");
$obj=new db();
extract($_POST);
$sql="insert into staff (name,designation,status)values('$name','$desig',1)";
$res=$obj->exe($sql);
if($res){
?>
<script>
alert("New Staff Added Sucessfully ");
window.location.href="staff.php";
</script>
<?php
}else{
?>
<script>
alert("Sorry Something Went Wrong,Please Try Again");
window.location.href="staff.php";
</script>
<?php
}
?>