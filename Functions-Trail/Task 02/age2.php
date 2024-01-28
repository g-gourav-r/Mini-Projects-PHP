<?php
    //splitting the input and subtracting the last element in the array with current year
    $input = readline("Enter the date of birth seperated by - ");
    $array = explode("-",$input);
    echo "Current age is " . 2023 - $array[count($array)-1];
?>