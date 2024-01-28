<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $path = 'data/movies-100.csv';
$handle = fopen($path, "r"); // open in readonly mode

echo '<table border="1">'; // Start an HTML table

// Read and display the header row as table headers
if (($header = fgetcsv($handle)) !== false) {
    echo '<tr>';
    foreach ($header as $cell) {
        echo '<th>' . htmlspecialchars($cell) . '</th>';
    }
    echo '</tr>';
}

// Read and display the data rows as table rows
while (($row = fgetcsv($handle)) !== false) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . htmlspecialchars($cell) . '</td>';
    }
    echo '</tr>';
}

echo '</table>'; // End the HTML table

fclose($handle); // Close the file handle
?>
    
</body>
</html>
