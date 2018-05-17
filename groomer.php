<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/groomer.css" rel="stylesheet">
    <title>Groomer page</title>
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
                <a class="nav-link" href="#">Management<span class="sr-only">(current)</span></a>
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
    <h1 class="h1 mb-3 font-weight-normal">Appointment list</h1>
    <br>
    
    <br>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Appointment id</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Owner name</th>
            <th scope="col">Owner E-mail</th>
            <th scope="col">Mobile number</th>
            <th scope="col">Dog name</th>
            <!--<th scope="col">Dog name</th>-->
            
        </tr>
        </thead>
        <tbody>
        <?php
            require_once "connect.php";
            $query_apmt = "select * from appointment ";
            $results_apmt = $db->query($query_apmt);
            
            
            while($re = mysqli_fetch_array ( $results_apmt )){
                echo "
                    <tr>
                    <th scope='row'>".$re['Id']."</th>
                    <td>".$re['a_date']."</td>
                    <td>".$re['a_time']."</td>
                ";
                $query_uinfo = "select * from uinfo where Id='".$re['a_userid']."'";
                $results_uinfo = $db->query($query_uinfo);
                $re_u = mysqli_fetch_array ( $results_uinfo );    
                echo "
                    <td>".$re_u['u_name']."</td>
                    <td>".$re_u['u_email']."</td>
                    <!--<td>test_breed1</td>-->
                    <td>".$re_u['u_mobile']."</td>
                ";
                $query_dinfo = "select d_name from dinfo where Id='".$re['a_dogid']."'";
                $results_dinfo = $db->query($query_dinfo);
                $re_d = mysqli_fetch_array ( $results_dinfo ); 
                echo "
                    <td>".$re_d['d_name']."</td>
                    </tr>
                ";
                
            }
            
        ?>
        </tbody>
    </table>
    <br><br>
</form>

<form class="form-index">
    <h1 class="h1 mb-3 font-weight-normal">User list</h1>
    <br>
    
    <br>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">User id</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Home</th>
            <th scope="col">Work</th>
            <th scope="col">Address</th>
            <th scope="col">Operations</th>
            
        </tr>
        </thead>
        <tbody>
        <?php
            require_once "connect.php";
            $query2 = "select * from uinfo ";
            $results2 = $db->query($query2);
            
            
            while($re2 = mysqli_fetch_array ( $results2 )){
                echo "
                    <tr>
                    <th scope='row'>".$re2['Id']."</th>
                    <td>".$re2['u_name']."</td>
                    <td>".$re2['u_email']."</td>
                    <td>".$re2['u_mobile']."</td>
                    <td>".$re2['u_homenumber']."</td>
                    <td>".$re2['u_worknumber']."</td>
                    <td>".$re2['u_address']."</td>
                    <td><a href='delete_user.php?user_id=".$re2['Id']."'>delete</a></td>
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