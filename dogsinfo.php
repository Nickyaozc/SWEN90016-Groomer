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
            <td><select class='form-control' name='breed'>
                        <!--            <option>test</option>-->
                        <option>German Shepherd</option>
                        <option>Labrador Retriever</option>
                        <option>Rottweiler</option>
                        <option>Golden Retriever</option>
                        <option>Beagle</option>
                        <option>Bulldog</option>
                        <option>Great Dane</option>
                        <option>Poodle</option>
                        <option>Dobermann</option>
                        <option>Dachshund</option>
                        <option>Siberian Husky</option>
                        <option>Others</option>
                        <!--<option>5</option>-->
                    </select></td>
            <td><input type="text" name="date_of_birth"></td>
            <td><a href="adddogs.php"><input type="submit" value="Submit" class="btn btn-secondary btn-sm"/></a></td>
            <td><input type="reset" value="Reset" class="btn btn-secondary btn-sm"/></td>
        </tr>

    </table>
</form>
<!--</center>-->
</body>
</html>