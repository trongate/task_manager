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

// Attempt to read $update_id from the URL.
$update_id = $_GET['update_id'] ?? 0;
settype($update_id, 'int');

// Build SQL query.
if ($update_id === 0) {
    $action = 'inserted';
    $sql = "INSERT INTO 
                  tasks 
                  (task_title, task_description, complete) 
                  VALUES 
                  ('$task_title', '$task_description', $complete)";
} else {
    $action = 'updated';
    $sql = "UPDATE tasks 
                 SET 
                 task_title = '$task_title', 
                 task_description = '$task_description', 
                 complete = $complete 
                 WHERE id = $update_id";
}

// Run the SQL query (insert or update the data).
run_query($sql);

// Send the user back to index.php.
header('Location: index.php?action='.$action);
die();