<?php
// Attempt to read $update_id from the URL.
$update_id = $_GET['update_id'] ?? 0;
settype($update_id, 'int');

// Create a headline based on the value of $update_id.
$headline = ($update_id === 0) ? 'Create Task' : 'Update Task';

if (($_SERVER['REQUEST_METHOD'] === 'GET') && ($update_id > 0)) {
    // Fetch form data from database.
    include('database.php');
    $sql = 'SELECT * FROM tasks WHERE id = '.$update_id;
    $result = run_query($sql);
    $task_record = mysqli_fetch_assoc($result);

    $task_title = $task_record['task_title'] ?? '';
    $task_description = $task_record['task_description'] ?? '';
    $complete = $task_record['complete'] ?? 0;
} else {
    // Attempt fetch form data from $_POST.
    $task_title = $_POST['task_title'] ?? '';
    $task_description = $_POST['task_description'] ?? '';
    $complete = $_POST['complete'] ?? 0;
}

settype($complete, 'int');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title><?= $headline ?></title>
</head>
<body>
    <div class="container">
        <h1><?= $headline ?></h1>
        <?php
        if (isset($validation_errors)) {
            foreach($validation_errors as $validation_error) {
                echo '<p class="error">'.$validation_error.'</p>';
            }
        }
        ?>
        <form action="submit_task.php?update_id=<?= $update_id ?>" method="post">
            <label for="task_title">Task Title</label>
            <input type="text" id="task_title" name="task_title" value="<?= $task_title ?>" placeholder="Enter task title...">
            <label for="task_description">Task Description</label>
            <textarea id="task_description" name="task_description" placeholder="Enter description here..." rows="7"><?= $task_description ?></textarea>
            <label class="checkbox-container">
                <input type="checkbox" name="complete" value="1"<?php
                if ($complete === 1) {
                    echo ' checked';
                }
                ?>> 
                <span>Complete</span>
            </label>
            <p class="text-center">
                <a href="index.php" class="button alt">Cancel</a>
                <button type="submit">Submit</button>
            </p>
        </form>
    </div>
</body>
</html>