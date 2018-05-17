<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dogs Info</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/adddogs.css" rel="stylesheet">
    <meta name="author" content="Baroom_Five"/>
</head>
<body background="img/Yakkety_Yak_Wallpaper_grey.jpg" style="background-repeat:no-repeat;background-size:100% 100%;background-attachment:fixed;">
<!--<center>-->
<!--<h1 align="center">Add dogs</h1>-->
<br>
<!-- <form name="form" onsubmit="CheckPwd()" action="register.php" -->
<form name="form" action="adddogs.php" method="post" class="form-register">
    <table align="center" class="table">
        <h1 class="h1 mb-3 font-weight-normal">Owner info</h1>
        <br>
        <?php
            require_once "connect.php";
            $query = "select * from uinfo where Id='".$_SESSION['id']."'";
            $results = $db->query($query);
            $re = mysqli_fetch_array ( $results );
        echo "
        <div class='form-group'>
            <label for='index_email'>Email address</label>
            <input readonly class='form-control-plaintext' type='email'  id='index_email' placeholder='".$re['u_email']."'>
        </div>
        <div class='form-group'>
            <label for='index_username'>Username</label>
            <input readonly class='form-control-plaintext' type='email'  id='index_username' placeholder='".$re['u_name']."'>
        </div>
        "
        ?>
        <br>
        <h1 class="h1 mb-3 font-weight-normal">Dog info</h1>
        <!--<tr>-->
            <!--<th colspan="4">Dog info</th>-->
        </tr>
        
        
           <br>
    
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Breed</th>
            <th scope="col">Date of birth</th>
            <th scope="col" colspan="2">Operations</th>
        </tr>
        </thead>
        
        <?php
            $query = "select * from dinfo where d_ownerid='".$_SESSION['id']."'";
            $results = $db->query($query);
            while($re = mysqli_fetch_array ( $results )){
                echo "
                    <tr>
                        <th scope='row'>".$re['Id']."</th>
                        <td>".$re['d_name']."</td>
                        <td>".$re['d_breed']."</td>
                        <td>".$re['d_date_of_birth']."</td>
                        <td><a href='#'>appointment</a></td>
                        <td><a href='#'>delete</a></td>
                    </tr>
                ";
            }
        ?>



        <tr>
            <th scope='row'>#</th>
            <td> <input type="text" name="dog_name"></td>
            <td><input type="text" name="breed"></td>
            <td><input type="text" name="date_of_birth"></td>
            <td><a href="adddogs.php"><input type="submit" value="Submit" class="btn btn-secondary btn-sm"/></a></td>
            <td><input type="reset" value="Reset" class="btn btn-secondary btn-sm"/></td>
        </tr>

    </table>
</form>
<!--</center>-->
</body>
</html>