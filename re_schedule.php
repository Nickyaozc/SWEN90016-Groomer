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
<body>
<form class='form-appointment' action='update_apmt.php' method='post'>
    <h1 class='h1 mb-3 font-weight-normal'>Appointment</h1>
    <br><br>
    
    <?php
        require_once "connect.php";
        $query_d = "select * from dinfo where d_ownerid='".$_SESSION['id']."'";
        $results_d = $db->query($query_d);
        echo "
            <div class='form-group'>
                <label for='dog_variety'>Dog name</label>
                <select class='form-control' name='dogname'>
        ";
        while($re_d = mysqli_fetch_array ( $results_d )){
            echo "<option>".$re_d['d_name']."</option>";                    
        }            
                
        echo "
                </select>
            </div>
        ";
        
        $query = "select * from appointment where Id='".$_GET['apmt_id']."'";
        $results = $db->query($query);
        $re = mysqli_fetch_array ( $results );
        echo "
            <input type='hidden' name='apmt_id' value='".$_GET['apmt_id']."'>
            <div class='form-group'>
                <label for='dog_variety'>Dog variety</label>
                <select class='form-control' name='variety' >
                    <option>test</option>
                    <option>mc</option>
                    <option>zc</option>
                    <option>px</option>
                    <!--<option>5</option>-->
                </select>
            </div>
            <label for='dog_appointment_date'>Appointment date</label>
            <input type='text' class='form-control' name='date' value='".$re['a_date']."'>
            <small name='appointment_date_help' class='form-text text-muted'>Please input appointment date as this format:
                dd-mm-yyyy.
            </small>
            </div>
            <div class='form-group'>
                <label for='dog_appointment_time'>Appointment time</label>
                <select class='form-control' name='time' >
                    <option>10am-11.30am</option>
                    <option>11.45am-1.15pm</option>
                    <option>1.30pm-3.00pm</option>
                    <option>3.15pm-4.45pm</option>
                    <!--<option>5</option>-->
                </select>
            </div>
            <div class='form-group'>
                <label for='dog_appointment_options'>Grooming options</label>
                <select class='form-control' name='options' >
                    <option>wash only</option>
                    <option>wash and nail clipping</option>
                    <option>deluxe grooming</option>
                    <!--<option>3.15pm-4.45pm</option>-->
                    <!--<option>5</option>-->
                </select>
            </div>
            <div class='form-group'>
                <label for='dog_appointment_descriptions'>Description</label>
                <textarea class='form-control' name='description' rows='2' value='".$re['a_description']."'></textarea>
            </div>
            <div class='right-form-appointment'>
                <input type='submit' value='Submit' class='btn btn-secondary btn-sm'/>
                <input type='reset' value='Reset' class='btn btn-secondary btn-sm'/>
            </div>
        ";
    ?>
</form>
</body>
</html>