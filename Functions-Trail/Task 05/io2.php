<?php
    $file = fopen("demo1.txt","r");
    // echo fgets($file)."this is from fgets"; -> this line will read the first line and points to the next line after reading
    while(!feof($file)){ //-> feof will check wheter i've encountered the end of the line.
        echo fgets($file); //-> get one line
    }
    fclose($file);
?>
