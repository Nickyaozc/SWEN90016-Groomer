<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <title>Index page</title>
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
                <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
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
<form class="form-index">
    <div class="form-inline">
            <h1 class="h1 mb-3 font-weight-normal">User info</h1>
            <div style="width:550px"></div>
            <a href="edit_user.php" class="badge badge-light">Edit</a>
        </div>
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
        <div class='form-group'>
            <label for='index_username'>Home address</label>
            <input readonly class='form-control-plaintext' type='email'  id='index_username' placeholder='".$re['u_address']."'>
        </div>
        <div class='form-group'>
            <label for='index_username'>Phone number</label>
            <input readonly class='form-control-plaintext' type='email'  id='index_username' placeholder='Mobile: ".$re['u_mobile']."; Home: ".$re['u_homenumber']."; Work: ".$re['u_worknumber']."'>
        </div>
        ";
        ?>
    <br>
    <div class="form-inline">
            <h1 class="h1 mb-3 font-weight-normal">Dog info</h1>
            <div style="width:550px"></div>
            <a href="dogsinfo.php" class="badge badge-light">Add dogs</a>
        </div>

    <!--<h1 class="h1 mb-3 font-weight-normal">Dog info</h1>-->

    <br>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Breed</th>
            <th scope="col">Date of birth</th>
            <th scope="col" colspan="2">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $query = "select * from dinfo where d_ownerid='".$_SESSION['id']."'";
            $results = $db->query($query);
            while($re = mysqli_fetch_array ( $results )){
                echo "
                    <tr>
                        <th scope='row'>1</th>
                        <td>".$re['d_name']."</td>
                        <td>".$re['d_breed']."</td>
                        <td>".$re['d_date_of_birth']."</td>
                        <td><a href='#'>appointment</a></td>
                        <td><a href='#'>delete</a></td>
                    </tr>
                ";
            }
        ?>
        </tbody>

    </table>
    <br>
        <div class="form-inline">
            <h1 class="h1 mb-3 font-weight-normal">Appointment</h1>
            <div style="width:380px"></div>
            <a href="appointment.php" class="badge badge-light">Make a new appointment</a>
        </div>

    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Dog name</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col" colspan="2">Operations</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $query = "select * from appointment where a_userid='".$_SESSION['id']."'";
            $results = $db->query($query);
            while($re = mysqli_fetch_array ( $results )){
                $query_d = "select d_name from dinfo where Id='".$re['a_dogid']."'";
                $results_d = $db->query ( $query_d );
                $re_d = mysqli_fetch_array ( $results_d );
                echo "        
                    <tr>
                        <td>".$re['Id']."</td>
                        <th scope='row'>".$re_d['d_name']."</th>
                        <td>".$re['a_date']."</td>
                        <td>".$re['a_time']."</td>
                        <td><a href='re_schedule.php?apmt_id=".$re['Id']."'>re-schedule</a></td>
                        <td><a href='delete_apmt.php?apmt_id=".$re['Id']."'>cancel</a></td>
                    </tr>
                ";
            }
        ?>
        
        </tbody>
    </table>
    <br><br>
</form>
</body>
</html>