<?php
/**
 * Database Connection & Query Helper
 * 
 * Sets up a connection to the MySQL database and provides a basic wrapper 
 * function to execute SQL queries.
 */

// =========================================================================
// 1. DATABASE CONFIGURATION
// =========================================================================
// Default XAMPP MySQL credentials (change these for a live production server)
$db_host = 'localhost'; // Database host server
$db_user = 'root';      // Database username
$db_pass = '';          // Database password (default is empty for XAMPP)
$db_name = 'task_manager'; // The specific database to target

// =========================================================================
// 2. CONNECT TO THE DATABASE
// =========================================================================
// Attempt to establish a connection to the MySQL server
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if the connection attempt failed
if (!$conn) {
    // Stop script execution immediately and display the connection error details
    die('Database connection failed: ' . mysqli_connect_error());
}

// =========================================================================
// 3. HELPER FUNCTION
// =========================================================================
 // Executes an SQL query using the database connection.
function run_query($sql) {
    // Import the $conn variable from the global scope so it can be accessed locally
    global $conn;

    // Execute the query using the global database connection link
    $result = mysqli_query($conn, $sql);

    // If the query failed to execute, terminate the script and output the MySQL error
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    // Return the query result
    return $result;
}

// Insert a task using a prepared statement.
function insert($data) {
    global $conn;

    $sql = 'INSERT INTO tasks (task_title, task_description, complete) VALUES (?, ?, ?)';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $data['task_title'], $data['task_description'], $data['complete']);
    mysqli_stmt_execute($stmt);
}

// Update a task using a prepared statement.
function update($data, $update_id) {
    global $conn;

    $sql = 'UPDATE tasks SET task_title = ?, task_description = ?, complete = ? WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssii', $data['task_title'], $data['task_description'], $data['complete'], $update_id);
    mysqli_stmt_execute($stmt);
}
