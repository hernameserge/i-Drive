<?php
    date_default_timezone_set('Asia/Singapore');
    function build_calendar($month, $year){
        $mysqli = new mysqli('localhost', 'root', '', 'idrive');
        $stmt = $mysqli->prepare("select * from admin_schedule where MONTH(date) = ? AND YEAR(date) = ?");
        $stmt->bind_param('ss', $month, $year);
        $bookings = array();
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $bookings[] = $row['date'];
                }
                
                $stmt->close();
            }
        }

        $daysofweek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Sunday');

        $firstDayOfMonth = mktime(0,0,0, $month, 1, $year);

        $numberDays = date('t', $firstDayOfMonth);

        $dateComponents = getdate($firstDayOfMonth);

        $monthname = $dateComponents['month'];

        $dayofweek = $dateComponents['wday'];

        $dateToday = date('Y-m-d');

        $calendar = "<table class = 'table table-bordered'>";

        $calendar .= "<center> <h2> $monthname $year </h2>";

        $calendar .= "<a class='btn btn-xs btn-primary' href='admin.php?page=admin_calendar&month=" . date('m', mktime(0,0,0, $month-1, 1, $year)) . "&year=" . date('Y', mktime(0,0,0, $month-1, 1, $year)) . "' onclick='event.preventDefault(); window.location.href=this.href;'> Previous Month </a>";
        $calendar .= " <a class='btn btn-xs btn-primary' href='admin.php?page=admin_calendar&month=".date('m')."&year=".date('Y')."' onclick='event.preventDefault(); window.location.href=this.href;'>Current Month</a> ";
        $calendar .= "<a class='btn btn-xs btn-primary' href='admin.php?page=admin_calendar&month=".date('m', mktime(0,0,0, $month+1, 1, $year))."&year=".date('Y', mktime(0,0,0, $month+1, 1, $year))."' onclick='event.preventDefault(); window.location.href=this.href;'> Next Month </a></center><br>";
        
        $calendar .= "<tr>";

        foreach($daysofweek as $day){
            $calendar .= "<th class = 'header' > $day </th>";
        }

        $calendar .= "<tr></tr>";

        if($dayofweek > 0){
            for($k = 0; $k < $dayofweek; $k++){
                $calendar .= "<td></td>";
            }
        }

        $currentDay = 1;

        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while($currentDay <= $numberDays){

            if($dayofweek == 7){
                $dayofweek = 0;
                $calendar .= "<tr></tr>";
            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";
            $phpdate = $date;
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            $currentTimeinSeconds = time();
            $currentDate = date('Y-m-d', $currentTimeinSeconds);
            if($date < $currentDate){
                $calendar.="<td><h4>$currentDay</h4> <button disabled class='btn btn-danger btn-xs'>N/A</button>";
            }
            else if(in_array($date, $bookings)){
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='admin_list.php?date=".$date."' class='btn btn-danger btn-xs'>List</a>";
            }
            else{
                $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='admin_list.php?page=admin_calendar&date=".$date."' class='btn btn-success btn-xs'>List</a>";
            }

            

            $calendar .= "</td>";

            $currentDay++;
            $dayofweek++;
        }

        if($dayofweek != 7){
            $remainingDays = 7 - $dayofweek;
            for($i = 0; $i < $remainingDays; $i++){
                $calendar .= "<td></td>";
            }   
        }

        $calendar .= "</tr>";
        $calendar .= "</table>";

        echo $calendar;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Instructor</title>
    <style>
        table{
            table-layout:fixed;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    $dateComponents = getdate();
                    if(isset($_GET['month']) && isset($_GET['year'])){
                        $month = $_GET['month'];
                        $year = $_GET['year'];
                    }
                    else{
                        $month = $dateComponents['mon'];
                        $year = $dateComponents['year'];
                    }
                    echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
</body>
</html>