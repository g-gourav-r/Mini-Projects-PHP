
<?php
$file = fopen("movie.csv",'r');

if(($head = fgetcsv($file))!==false){
    foreach ($head as $cells){
        echo $cells. "\t";
    }
    }
    echo "\n";
    while(($head = fgetcsv($file))!==false){
        foreach( $head as $cells){
        echo $cells. "\t";
        }
        echo "\n";
     }
?>

