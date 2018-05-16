<?php
session_start();
$breed = $_POST ['breed'];
$date = $_POST ['date'];
$time = $_POST ['time'];
$options = $_POST ['options'];
$description = $_POST ['description'];
$userid = $_SESSION['id'];
$apmt_id = $_POST['apmt_id'];
$dogname = $_POST['dogname'];

if (! $breed || ! $date || !$time || !$options || !$dogname) {
	
	echo "<script type='text/JavaScript'>
    	 alert('All the field are required!');
		</script>";
	$url = "re_schedule.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query_d = "select Id from dinfo where d_ownerid='".$_SESSION['id']."' and d_name='".$dogname."'";
$results_d = $db->query ( $query_d );
$re_d = mysqli_fetch_array ( $results_d );
$dogid = $re_d['Id'];

$query = "update appointment set a_breed='".$breed."', a_date='".$date."',a_time='".$time."', a_userid='".$userid."',a_options='".$options."', a_description='".$description."', a_dogid='".$dogid."' where Id='".$apmt_id."'";

$result = $db->query ( $query );

if ($result) {
	
	echo "<script type='text/JavaScript'>
    	 alert('Appointment Successfully re-scheduled');
		</script>";
	$url = "user.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";

} else {
	
	echo "<script type='text/JavaScript'>
    	 alert('Re-scheduled appointment failed!');
		</script>";
	$url = "re-schedule.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
$db->close ();

$url="user.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
