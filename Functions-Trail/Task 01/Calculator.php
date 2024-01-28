<?php

# Taking Input and Validating it
    $num1 = readline("Enter the first number: ");
        if($num1 == "q"){
            exit(1);
        }
        elseif(!is_numeric($num1)){
            echo "Invalid Input";
            exit(1);
        }

    $operation = readline("Enter the operation: ");
        if($operation == "q"){
            exit(1);
        }

    $num2 = readline("Enter the second number: ");
        if($num2 == "q"){
            exit(1);
        }
        elseif(!is_numeric($num2)){
            echo "Invalid Input";
            exit(1);
        }

#Performing operations
    if ($operation == "+"){
        $op = $num1 + $num2;;
        echo "The sum of $num1 and $num2 is: $op\n";
    }

    elseif($operation == "-"){
        $op =$num1 - $num2;
        echo "The difference of $num1 and $num2 is: $op\n";
    }

    elseif ($operation == "*") {
        $op =  $num1 * $num2;
        echo "The product of $num1 and $num2 is: $op\n";
    }

    elseif ($operation == "/") {
        if ($num2 != 0){
            echo "quotient ". (int)($num1/$num2) ."\n";
            echo "reminder ". ($num1%$num2);
        }
        else{
            echo "Can't divide by Zero.\n";
    }}
?>