<?php
    session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <link href='css/bootstrap.css' rel='stylesheet'>
    <link href='css/bootstrap-grid.css' rel='stylesheet'>
    <link href='css/bootstrap-reboot.css' rel='stylesheet'>
    <link href='css/appointment.css' rel='stylesheet'>
    <title>Appointment</title>
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
<form class='form-appointment' action='add_appointment.php' method='post'>
    <h1 class='h1 mb-3 font-weight-normal'>Appointment</h1>
    <br><br>
    <?php
        require_once "connect.php";
        $query = "select * from dinfo where d_ownerid='".$_SESSION['id']."'";
        $results = $db->query($query);
        echo "
            <div class='form-group'>
                <label for='dog_variety'>Dog name</label>
                <select class='form-control' name='dogname'>
        ";
        while($re = mysqli_fetch_array ( $results )){
            echo "<option>".$re['d_name']."</option>";                    
        }            
                
        echo "
                </select>
            </div>
        ";
    ?>
    
    <label for='dog_appointment_date'>Appointment date</label>
    <input type='text' class='form-control' name='date' >
    <small name='appointment_date_help' class='form-text text-muted'>Please input appointment date as this format:
        dd-mm-yyyy.
    </small>
    </div>
    <div class='form-group'>
        <label for='dog_appointment_time'>Appointment time</label>
        <select class='form-control' name='time'>
            <option>10am-11.30am</option>
            <option>11.45am-1.15pm</option>
            <option>1.30pm-3.00pm</option>
            <option>3.15pm-4.45pm</option>
            <!--<option>5</option>-->
        </select>
    </div>
    <div class='form-group'>
        <label for='dog_appointment_options'>Grooming options</label>
        <select class='form-control' name='options'>
            <option>wash only</option>
            <option>wash and nail clipping</option>
            <option>deluxe grooming</option>
            <!--<option>3.15pm-4.45pm</option>-->
            <!--<option>5</option>-->
        </select>
    </div>
    <div class='form-group'>
        <label for='dog_appointment_descriptions'>Description</label>
        <textarea class='form-control' name='description' rows='2'></textarea>
    </div>
    <div class='right-form-appointment'>
        <input type='submit' value='Submit' class='btn btn-secondary btn-sm'/>
        <input type='reset' value='Reset' class='btn btn-secondary btn-sm'/>
    </div>
</form>
</body>
</html>