<?php
    //Finding number of days
    $date2 = strtotime('now'); //Returns number of seconds starting from JAn 1, 1970 till today
    $date1 = strtotime('2022-04-01'); //Returns number of seconds till date from jan 1, 1970
    $diff = $date2 - $date1; // Get the effective number of seconds between two time stamps
    $days = floor($diff / (60 * 60 * 24)); //divide by number of seconds in a day
    echo "{$days} days";
?>