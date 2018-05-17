<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Edit user info</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <meta name="author" content="Baroom_Five"/>
</head>
<body background="img/Yakkety_Yak_Wallpaper_grey.jpg" style="background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-brand" href="#">Groomer</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="user.php">Home<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Log out</a>
                </li>
            </ul>
        </form>
    </div>
</nav>
<br>
<!--<center>-->
<h1 align="center">Edit user info</h1>
<br>
<!-- <form name="form" onsubmit="CheckPwd()" action="register.php" -->
<form name="form" action="update_user.php" method="post" class="form-register">
    <table align="center" class="table table-striped">
        <?php
            require_once "connect.php";
            $query = "select * from uinfo where Id='".$_SESSION['id']."'";
            $results = $db->query($query);
            $re = mysqli_fetch_array ( $results );
            echo "
                <tr>
                    <th colspan='4'>User info</th>
                </tr>
                <tr>
                    <td align='center'>Username</td>
                    <td align='center'>
                        <input type='text' name='name' value='".$re['u_name']."'>
                    </td>
                    <td align='center'>E-mail address</td>
                    <td align='center'>
                        <input type='text' name='e_mail' value='".$re['u_email']."'>
                    </td>
                </tr>
                <tr>
                    <td align='center'>Password</td>
                    <td align='center'>
                        <input type='password' name='password1' value='".$re['u_password']."'>
                    </td>
                    <td align='center'>Input again:</td>
                    <td align='center'>
                        <input type='password' name='password2' value='".$re['u_password']."'> 
                    </td>
                </tr>

                <tr>
                    <td align='center'>Address:</td>
                    <td align='center'>
                        <input type='text' name='address' value='".$re['u_address']."'>
                    </td>
                    <td align='center'>State:</td>
                    <td align='center'>
                        <input type='text' name='state' value='".$re['u_state']."'>
                    </td>
                </tr>
                <!--<tr>-->
                    <!---->
                <!--</tr>-->
                <tr>
                    <td align='center'>Postcode:</td>
                    <td align='center'>
                        <input type='text' name='postcode' value='".$re['u_postcode']."'>
                    </td>
                    <td align='center'>Mobile number:</td>
                    <td align='center'>
                        <input type='text' name='mobile_number' value='".$re['u_mobile']."'>
                    </td>
                </tr>
                <!--<tr>-->

                <!--</tr>-->
                <tr>
                    <td align='center'>Home number:</td>
                    <td align='center'>
                        <input type='text' name='home_number' value='".$re['u_homenumber']."'>
                    </td>
                    <td align='center'>Work number:</td>
                    <td align='center'>
                        <input type='text' name='work_number' value='".$re['u_worknumber']."'>
                    </td>
                </tr>
                <tr>

                </tr>


                </tr>
                <tr>
                    <!--<td align='center'>Date of birth:</td>-->
                    <!--<td align='center'>-->
                        <!--&lt;!&ndash;<input type='text' name='date_of_birth'>&ndash;&gt;-->
                    <!--</td>-->
                    <td align='right' colspan='4'>
                        <input type='submit' value='Submit' class='btn btn-secondary btn-sm'/>
                        <input type='reset' value='Reset' class='btn btn-secondary btn-sm'/>
                    </td>
                </tr>
            ";
        ?>
    </table>
</form>
<!--</center>-->
</body>
</html>


