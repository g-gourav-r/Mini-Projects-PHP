<?php
    //Finding number of days
    $date2 = strtotime('now'); 
    $date1 = strtotime('1969-04-01');
    $diff = $date2 - $date1; 
    $days = floor($diff / (60 * 60 * 24));
    // $month = floor($diff /)
    echo "{$days} days";
?>