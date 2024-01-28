<?php
    //Using inbuilt functions
    $dob = readline("Enter the date of birth (YYYY-MM-DD): ");
    $date = strtotime($dob);
    $today = getdate();
    $difference = (int)$today["year"] - (int)date("Y", $date);
    if($difference<0){
        echo "Date of birth can't be more than current year";
    }
    else{
        echo $difference. " Years";
    }
?>