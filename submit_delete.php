<?php
// Attempt to read $update_id from the URL.
$update_id = $_GET['update_id'] ?? 0;
settype($update_id, 'int');

if ($update_id === 0) {
    // Send them back to the index.php page.
    header('Location: index.php');
    die();
}

// Delete the record from the database.
include('database.php');
$sql = 'DELETE FROM tasks WHERE id = '.$update_id;
run_query($sql);

// Send user back to index.php
header('Location: index.php?action=deleted');