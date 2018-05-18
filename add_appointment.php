<?php
session_start();
$date = $_POST ['date'];
$time = $_POST ['time'];
$options = $_POST ['options'];
$description = $_POST ['description'];
$dogname = $_POST['dogname'];
$userid = $_SESSION['id'];

if (! $date || !$time || !$options || !$dogname) {
	
	echo "<script type='text/JavaScript'>
    	 alert('All the field are required!');
		</script>";
	$url = "appointment.php";
	echo "<script language=\"javascript\">";
	echo "location.href=\"$url\"";
	echo "</script>";
	exit ();
}
require_once"connect.php";
$query_d = "select * from dinfo where d_ownerid='".$_SESSION['id']."' and d_name='".$dogname."'";
$results_d = $db->query ( $query_d );
$re_d = mysqli_fetch_array ( $results_d );
$dogid = $re_d['Id'];
$breed = $re_d['d_breed'];
$query = "insert into appointment set a_breed='".$breed."', a_date='".$date."',a_time='".$time."', a_userid='".$userid."',a_options='".$options."', a_description='".$description."', a_dogid='".$dogid."'";

$results = $db->query ( $query );

if ($results) {
		$query_u = "select * from uinfo where Id='".$_SESSION['id']."'";
		$results_u = $db->query ( $query_u );
		$re_u = mysqli_fetch_array ( $results_u );
		$ownername = $re_u['u_name'];
		$owneremail = $re_u['u_email'];
		require_once 'sendemail.php';
		echo "<script type='text/JavaScript'>
	    	 alert('Appointment Successfully made');
			</script>";
		$url = "user.php";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";

	} else {
		
		echo "<script type='text/JavaScript'>
	    	 alert('Make appointment failed!');
			</script>";
		$url = "appointment.php";
		echo "<script language=\"javascript\">";
		echo "location.href=\"$url\"";
		echo "</script>";
		exit ();
	}
$db->close ();

$url="appointment.php";
// echo "<script language=\"javascript\">";
// echo "location.href=\"$url\"";
// echo "</script>";
// echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>
