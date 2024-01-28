<?php
    
    $userdob = readline("yyyy-mm-dd : "); //Input age by the user
    $birthDate = new DateTime($userdob); // Convert it into Date Time object
    $currentDateObject = new DateTime(); //gets the current Date Time object
    $interval = $birthDate->diff($currentDateObject); // Diff is used to subtract the Date Time object 
    // var_dump($interval);
    $years = $interval->y; // Use arrow operator to extract 
    $months = $interval->m;
    $days = $interval->d;

    echo $years . " years\n" . $months . " months\n" . $days . " days";
?>