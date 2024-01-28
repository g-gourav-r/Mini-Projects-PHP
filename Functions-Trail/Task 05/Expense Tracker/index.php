<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .container {
        margin-top: 30px;
    }

    .result {
        width: 60%;
        margin: auto;
        margin-top: 20px;
        border: 1px solid black;
    }

    .result table {
        width: 100%;
        border-collapse: collapse;
    }
    .textbox {
    background-color: #f2f2f2;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 18px;
    margin-top: 10px;
    display: flex;
    justify-content: center; 
    align-items: center; 
   
}


</style>
<body>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Expense Tracker</span>
    </div>
</nav>
<div class="container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-group">
            <input type="text" aria-label="First name" name="expense" placeholder="Enter the Expense"
                   class="form-control">
            <input type="text" aria-label="Last name" name="amount" placeholder="Enter the Amount"
                   class="form-control">
            <button class="btn btn-outline-secondary" type="Submit" id="button-addon1">Add Expense</button>
        </div>
    </form>
</div>
<?php
$result = "Expense once added can't be removed";
$tracker = fopen('expense.csv', 'a') or die('Problem in opening CSV');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["expense"]) && isset($_POST["amount"])) {
    if (empty($_POST["expense"]) || empty($_POST["amount"])) {
        $result = "Invalid entry";
    } else {
        if (!is_numeric($_POST["amount"])) {
            $result = "Amount should be in Numbers";
        } else {
            $to_add = array();
            $amount = $_POST["amount"];
            $to_add[] = $amount;
            $expense = $_POST["expense"];
            $to_add[] = $expense;
            fputcsv($tracker, $to_add);
            unset($amount);
            $result = "Expense Added ✅";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }
}

$tracker = fopen('expense.csv', 'r');
?>

<div class="textbox">
    <?php echo $result; ?>
</div>
<div class="result">
    <table border="1px" class="table table-striped">
        <?php
        if (($head = fgetcsv($tracker)) !== false) {
            foreach ($head as $cells) {
                echo "<th>" . $cells . "</th>";
            }
        }
        while (($head = fgetcsv($tracker)) !== false) {
            echo "<tr>";
            foreach ($head as $cells) {
                echo "<td>" . $cells . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
<?php
fclose($tracker); // Close the file after reading
?>
