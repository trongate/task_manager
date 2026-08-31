<?php
$row['complete'] = 1;
$complete = ($row['complete'] === 1) ? 'yes' : 'no';

// if ($row['complete'] === 1) {
//     $complete = 'yes';
// } else {
//     $complete = 'no';
// }



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


A prepared statement is a type of statement we can use to safely pass data into an SQL query without the data 
being treated as SQL syntax.  





A prepared statement is a way of putting data into an SQL query without letting that data become part of the SQL code.