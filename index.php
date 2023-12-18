<?php 
require "connexion.php";
require "crud_dynamic.php";
 // Usage example:

$mysqli =connectDatabase();

// Insert example
$insertData = array('name' => 'Basma', 'column2' => 'value2');
insertRecord($mysqli, 'task_db', $insertData);

// Update example
$updateData = array('column1' => 'new_value1', 'column2' => 'new_value2');
updateRecord($mysqli, 'task_db', $updateData, 1);

// Delete example
deleteRecord($mysqli, 'task_db', 1);

// Select example
$selectResult = selectRecords($mysqli, 'task_db', 'column1, column2', 'column1 = "value1"');

// Process select result if needed
while ($row = mysqli_fetch_assoc($selectResult)) {
    // Process each row
}

// Close the connection
mysqli_close($mysqli);

?>