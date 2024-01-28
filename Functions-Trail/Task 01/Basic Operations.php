<?php
 $a = readline('Enter the first Number : ');
 $b = readline('Enter the second number : ');

 if(is_numeric($a) and is_numeric($b)){
    echo "Sum is ".$a + $b." \n";
    echo "Difference is ".$a - $b." \n";
    echo "Product is ".$a * $b." \n";
    echo "Division is ".(int)($a / $b)." \n";
    echo "Reminder is ".$a % $b." \n";
 }
 else{
    echo "Invalid Input";
 }
?>