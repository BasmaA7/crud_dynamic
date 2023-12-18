<?php 
require "Crud_dynamic.php";

// Exemple d'utilisation pour l'insertion
$crud = new Crud_dynamic();

// Données à insérer
$dataToInsert = ['name' => 'Basma', 'email' => 'basma@gmail.com'];

// Table dans laquelle insérer les données
 $tableName = 'user';

// Appel de la méthode insert
$result = $crud->insert($table, $dataToInsert);

// Vérification du résultat de l'insertion
if ($result) {
    echo "Enregistrement inséré avec succès !";
} else {
    echo "Erreur lors de l'insertion de l'enregistrement.";
}
// exemple update
$crud = new Crud_dynamic();

$dataToUpdate = ['name' => ''];

// Mettre à jour l'utilisateur avec l'ID 1
$result = $crud->update('user', $dataToUpdate, 1);

if ($result) {
    echo "Mise à jour réussie !";
} else {
    echo "Erreur lors de la mise à jour.";
}
// exemple de delete
$crud = new Crud_dynamic();

// Supprimer user avec l'ID 1
$result = $crud->delete('user', 1);

if ($result) {
    echo "Suppression réussie !";
} else {
    echo "Erreur lors de la suppression.";
}

//select 
$crud = new Crud_dynamic();

// Sélectionner tous les utilisateurs avec le nom "John"
$users = $crud->select('user', '*', "name = ''");

// Afficher les résultats
foreach ($users as $user) {
    echo "ID: " . $user['id'] . ", Nom: " . $user['name'] . "<br>";
}


