<?php
include('database.php');

// Fetch the posted values.
$task_title = trim($_POST['task_title']);
$task_description = trim($_POST['task_description']);
$complete = $_POST['complete'] ?? 0;
settype($complete, 'int');

include('validation_tests.php');

if (!empty($validation_errors)) {
    include('create.php'); // Present the form again.
    die();
}

// Build SQL query.
$sql = "INSERT INTO 
              tasks 
              (task_title, task_description, complete) 
              VALUES 
              ('$task_title', '$task_description', $complete)";

// Run the SQL query (insert the data).
run_query($sql);

// Send the user back to index.php.
header('Location: index.php');
die();