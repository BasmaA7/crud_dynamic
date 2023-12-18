<?php 
require "connexion.php";
 // Usage example:

$mysqli = connexion();

// Insert example
$insertData = array('column1' => 'value1', 'column2' => 'value2');
insertRecord($mysqli, 'your_table', $insertData);

// Update example
$updateData = array('column1' => 'new_value1', 'column2' => 'new_value2');
updateRecord($mysqli, 'your_table', $updateData, 1);

// Delete example
deleteRecord($mysqli, 'your_table', 1);

// Select example
$selectResult = selectRecords($mysqli, 'your_table', 'column1, column2', 'column1 = "value1"');

// Process select result if needed
while ($row = mysqli_fetch_assoc($selectResult)) {
    // Process each row
}

// Close the connection
mysqli_close($mysqli);

?>