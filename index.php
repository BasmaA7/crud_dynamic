<?php

require "Crud_dynamic.php";

// Exemple d'utilisation pour l'insertion
$crud = new Crud_dynamic();
// $data = ['name' => 'Nouhaila', 'email' => 'noha@gmail.com'];

// $result = $crud->insertRecord('user', $data);

// if ($result) {
//     echo "Enregistrement inséré avec succès !";
// } else {
//     echo "Erreur lors de l'insertion de l'enregistrement.";
// }



// ***** Exemple Update *****
// $crud = new Crud_dynamic();

// $data= ['name' => 'Amal', 'email' => 'Amal@gmail.com'];
// $id = 4;

// $result = $crud->updateRecord('user', $data, $id);

// if ($result) {
//     echo "Record updated successfully!";
// } else {
//     echo "Error updating record.";
// }



// ***** Example Delete *****
$crud = new Crud_dynamic();

// $id =12;

// $result = $crud->deleteRecord('user', $id);

// if ($result) {
//     echo "Record deleted successfully!";
// } else {
//     echo "Error deleting record.";
// }



// ***** Example Select ****
$crud = new Crud_dynamic();

$result = $crud->selectRecord('user', 'id, name,email' );

// Example: Fetch data from the result set
foreach ($result as $row) {
    print_r($row);
}