<?php
include('database.php');

// Fetch the posted values.
$task_title = trim($_POST['task_title']);
$task_description = trim($_POST['task_description']);

// Build SQL query.
$sql = "INSERT INTO 
              tasks 
              (task_title, task_description, complete) 
              VALUES 
              ('$task_title', '$task_description', 0)";

// Run the SQL query (insert the data).
run_query($sql);

// Send the user back to index.php.
header('Location: index.php');
die();