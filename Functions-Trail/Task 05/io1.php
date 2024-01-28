<?php
    //Writing to a text file
    $txtfile1 = fopen("demo1.txt",'a'); //using "a" as a parameter
    $txtfile2 = fopen("demo2.txt",'w'); //using "w" as a parameter
    $txt = readline("Enter the text to be added : ");
    fwrite($txtfile1,$txt."\n"); //-> gets appended as "a" is used
    fwrite($txtfile2,$txt."\n"); //-> gets overwritten as "w" is used
    fclose($txtfile2);
?>
