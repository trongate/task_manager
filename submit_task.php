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

// Create a data array from our posted values.
$data = [
    'task_title' => $task_title,
    'task_description' => $task_description,
    'complete' => $complete
];

// Attempt to read $update_id from the URL.
$update_id = $_GET['update_id'] ?? 0;
settype($update_id, 'int');

if ($update_id === 0) {
    $action = 'inserted';
    insert($data); // Insert the new record.
} else {
    $action = 'updated';
    update($data, $update_id); // Update the record.
}

// Send the user back to index.php.
header('Location: index.php?action='.$action);
die();