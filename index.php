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
        <p class="text-center"><a href="create.php" class="button">Create Task</a></p>

        <?php
        if (empty($rows)) {
            echo '<p class="text-center">There are currently no tasks.</p>';
        } else {
        ?>

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
                    <td class="text-center"><?php
                    settype($row['complete'], 'int');
                    $complete = ($row['complete'] === 1) ? 'yes' : 'no';
                    echo $complete;
                    ?></td>
                    <td class="text-center">EDIT</td>
                </tr><?php
                }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>

    </div>
</body>
</html>