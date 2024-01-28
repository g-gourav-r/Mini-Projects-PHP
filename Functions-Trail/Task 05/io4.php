<?php
//Writing a CSV file
$file = fopen('new.csv','a');
$status = true;
$n = readline("Enter the number of elements : ");

if(!empty($n) and is_numeric($n)){
    while($status){
        $row = array();
        for($i=0;$i<$n;$i++){
            $x = readline("Enter the element " . $i+1 . " : ");
            $row[] = $x;
        }
        fputcsv($file, $row);

        $a = readline("Y/N : ");
        $status = $a=="Y"?true:false;
    }
}else{
    echo "Not a number";
}

?>
