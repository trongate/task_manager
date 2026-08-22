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
        <form action="submit_task.php" method="post">
            <label>Task Title</label>
            <input type="text" name="task_title" placeholder="Enter task title...">
            <label>Task Description</label>
            <textarea name="task_description" placeholder="Enter description here..." rows="7"></textarea>
            <label class="checkbox-container">
                <input type="checkbox" name="complete" value="1"> 
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