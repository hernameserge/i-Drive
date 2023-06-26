<?php
    function build_calendar($month, $year){
        $daysofweek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Sunday');

        $firstDayOfMonth = mktime(0,0,0, $month, 1, $year);

        $numberDays = date('t', $firstDayOfMonth);

        $dateComponents = getdate($firstDayOfMonth);

        $monthname = $dateComponents['month'];

        $dayofweek = $dateComponents['wday'];

        $dateToday = date('Y-m-d');

        $calendar = "<table class = 'table table-bordered'>";

        $calendar .= "<center> <h2> $monthname $year </h2>";

        $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0,0,0, $month-1, 1, $year)). "&year=" .date('Y', mktime(0,0,0, $month-1, 1, $year)). "'> Previous Month </a>";
        $calendar .= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
        $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0, $month+1, 1, $year))."&year=".date('Y', mktime(0,0,0, $month+1, 1, $year))."'> Next Month </a></center><br>";
        
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

            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            $currentTimeinSeconds = time();
            $currentDate = date('Y-m-d', $currentTimeinSeconds);
            if($date < $currentDate){
                $calendar.="<td><h4>$currentDay</h4> <button disabled class='btn btn-danger btn-xs'>N/A</button>";
            }
            else{
                $calendar.="<td class='$today'><h4>$currentDay</h4> <button onclick='openModal(\"$date\")' style='outline:none;' class='btn btn-success btn-xs'>Book</button>";
                
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