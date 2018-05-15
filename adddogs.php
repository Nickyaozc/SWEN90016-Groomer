<?php
session_start();
$dog_name = $_POST ['dog_name'];
$breed = $_POST ['breed'];
$date_of_birth = $_POST ['date_of_birth'];
$ownerid = $_SESSION['id'];
if (! $dog_name || ! $breed || ! $date_of_birth) {
	echo "<script type='text/JavaScript'>
    	 alert('All the filed are required!');
		</script>";
	$url = "dogsinfo.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query = "insert into dinfo set d_name='".$dog_name."', d_breed='".$breed."',d_date_of_birth='".$date_of_birth."', d_ownerid='".$ownerid."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Successfully added new dog info');
		</script>";
	$url = "dogsinfo.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	echo "<script type='text/JavaScript'>
    	 alert('Add dog info failed!');
		</script>";
	$url = "dogsinfo.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="dogsinfo.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
