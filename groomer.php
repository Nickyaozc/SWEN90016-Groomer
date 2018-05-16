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
<body>
<form class="form-index">
    <h1 class="h1 mb-3 font-weight-normal">Appointment list</h1>
    <br>
    
    <br>
    <table class="table table-striped">
        <thead>
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
</body>
</html>