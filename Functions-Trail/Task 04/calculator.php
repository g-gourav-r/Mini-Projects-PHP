<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Age Calculator</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Onest:wght@200&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: #ecf0f3;
            color: grey;
            font-family: 'Onest', sans-serif;
        }

        .main {
            display: flex;
            justify-content: center;
            margin-left: 30%;
            margin-right: 30%;
            margin-top: 40px;
            padding: 20px;
            width: 40%;
            height: 40%;
        }

        .container {
            background: #ecf0f3;
            box-shadow: 4px 4px #C3C3BE;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
        }

        .sub-main {
            margin-bottom: 20px;
        }

        .btn-custom {
            color: grey;
            margin-top: 20px;
            height: 40px;
            border-radius: 20px;
            font-weight: 900;
            box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
        }

        .inputs {
            box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
            background: #ecf0f3;
        }

        .btn-custom:hover {
            box-shadow: none ;
        }

        h2 {
            font-weight: bold;
            color: grey;
            padding-bottom: 5px;
        }
        .result-box {

            color: grey;
            padding: 10px;
        }
        
    </style>
</head>
<body>
<?php
// Driver code starts here
$result = "Enter the numbers 🔢";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["num1"]) && !empty($_POST["num2"])) {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        if (!empty($_POST['flexRadioDefault'])) {
            $selectedValue = $_POST['flexRadioDefault'];
            if ($selectedValue == 4) {
                if ($num2 == 0) {
                    $result = "Can we divide a number by zero 🤔";
                } else {
                    $quotient = (int)$num1 / $num2;
                    $remainder = $num1 % $num2;
                    $result = "The quotient is " . $quotient . " and the remainder is " . $remainder;
                }
            } else {
                switch ($selectedValue) {
                    case 1:
                        $result = "The result is " . ($num1 + $num2);
                        break;

                    case 2:
                        $result = "The result is " . ($num1 - $num2);
                        break;

                    case 3:
                        $result = "The result is " . ($num1 * $num2);
                        break;
                }
            }
        } else {
            $result = "Select an operation to perform 🔪";
        }
    } else {
        $result = "Please enter valid numbers 🤚";
    }
}
?>
<div class="main">
    <div class="container">
        <div class="sub-main">
            <h2>Calculator</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="number" name="num1" class="form-control inputs" id="num1" placeholder="Number 1">
                </div>
                <div class="mb-3">
                    <input type="number" name="num2" class="form-control inputs" id="num2" placeholder="Number 2">
                </div>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Addition
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="2" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Subtraction
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="3" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Multiplication
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" value="4" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                        <label class="form-check-label" for="flexRadioDefault4">
                            Division
                        </label>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-custom">Calculate</button></center>
            </form>
        </div>
        <hr>
        <div class="result-box">
            <?php echo $result ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
