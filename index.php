<?php
include('database.php');

// Fetch data from tasks table.
$sql = 'SELECT * FROM tasks';
$result = run_query($sql);

// Convert $result into an array of $rows
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Task Manager</title>
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        <p class="text-center"><button>Create Task</button></p>

        <table>
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Task Description</th>
                    <th>Complete</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($rows as $row) { 
                ?>
                <tr>
                    <td><?= $row['task_title'] ?></td>
                    <td><?= $row['task_description'] ?></td>
                    <td><?= $row['complete'] ?></td>
                    <td class="text-center">EDIT</td>
                </tr><?php
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>