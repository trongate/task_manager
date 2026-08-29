<?php
// Establish the starter values for the form fields.
$task_title = $_POST['task_title'] ?? '';
$task_description = $_POST['task_description'] ?? '';
$complete = $_POST['complete'] ?? 0;
settype($complete, 'int');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Create Task</title>
</head>
<body>
    <div class="container">
        <h1>Create Task</h1>
        <?php
        if (isset($validation_errors)) {
            foreach($validation_errors as $validation_error) {
                echo '<p class="error">'.$validation_error.'</p>';
            }
        }
        ?>
        <form action="submit_task.php" method="post">
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