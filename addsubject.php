<?php
include("db.php");
$obj=new db();
extract($_POST);
$sql="insert into subjects (name,scode,semester,status)values('$subject','$scode','$sem',1)";
$res=$obj->exe($sql);
if($res){
?>
<script>
alert("New Subject Added Sucessfully ");
window.location.href="subject.php";
</script>
<?php
}else{
?>
<script>
alert("Sorry Something Went Wrong,Please Try Again");
window.location.href="subject.php";
</script>
<?php
}
?>