<?php
session_start();
$name = $_POST ['name'];
$email = $_POST ['e_mail'];
$password = $_POST ['password1'];
$password2 = $_POST ['password2'];
$address = $_POST ['address'];
$state = $_POST ['state'];
$postcode = $_POST ['postcode'];
$mobile = $_POST ['mobile_number'];
$home_number = $_POST ['home_number'];
$work_number= $_POST ['work_number'];

if ($password != $password2) {

    echo "<script type='text/JavaScript'>
         alert('Please input the same password twice!');
        </script>";
    $url = "register.html";
    echo "<script language=\"javascript\">";
    echo "location.href=\"$url\"";
    echo "</script>";
    exit ();
}

else if (! $name || ! $email || ! $password || ! $state || ! $postcode) {
    echo "<script type='text/JavaScript'>
         alert('All the field are required!');
        </script>";
    $url = "edit_user.php";
    echo "<script language=\"javascript\">";
    echo "location.href=\"$url\"";
    echo "</script>";
    exit ();
}
require_once"connect.php";
$query = "update uinfo set u_name='".$name."',u_password='".$password."',u_email='".$email."',u_address='".$address."',u_state='".$state."',u_mobile='".$mobile."',u_homenumber='".$home_number."',u_worknumber='".$work_number."',u_postcode='".$postcode."' where Id='".$_SESSION['id']."'";

$result = $db->query ( $query );

if ($result) {
    
    echo "<script type='text/JavaScript'>
         alert('Successfully updated');
        </script>";
    $url = "edit_user.php";
    echo "<script language=\"javascript\">";
    echo "location.href=\"$url\"";
    echo "</script>";

} else {
    echo "<script type='text/JavaScript'>
         alert('Update failed!');
        </script>";
    $url = "edit_user.php";
    echo "<script language=\"javascript\">";
    echo "location.href=\"$url\"";
    echo "</script>";
    exit ();
}
$db->close ();

$url="edit_user.php";
//echo "<script language=\"javascript\">";
//echo "location.href=\"$url\"";
//echo "</script>";
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
?>