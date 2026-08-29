<?php
// Attempt to read $update_id from the URL.
$update_id = $_GET['update_id'] ?? 0;
settype($update_id, 'int');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Confirm Delete</title>
</head>
<body>
    <div class="container">
        <h1>Confirm Delete</h1>
        <p class="text-center">You are about to delete a record.  This cannot be undone!</p>
        <p class="text-center">Are you sure?</p>
        <form action="submit_delete.php?update_id=<?= $update_id ?>" method="post">
            <p class="text-center">
                <a href="create.php?update_id=<?= $update_id ?>" class="button alt">Cancel</a>
                <button type="submit" class="danger">Yes - Delete Record</button>
            </p>            
        </form>
    </div>
</body>
</html>