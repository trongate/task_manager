<?php
// FORM VALIDATION
$validation_errors = [];
$got_task_title_error = false;
$got_task_description_error = false;

// Task title is required.
if ($task_title === '') {
    $validation_errors[] = 'The task title is required.';
    $got_task_title_error = true;
}

// Task title cannot have a string length of more than 245
if ((strlen($task_title) > 245) && ($got_task_title_error === false)) {
    $validation_errors[] = 'The task title cannot have a string length of more than 245.';
}

// Task description is required.
if ($task_description === '') {
    $validation_errors[] = 'The task description is required.';
    $got_task_description_error = true;
}

// Task description must be at least 5 characters in length.
if ((strlen($task_description) < 5) && ($got_task_description_error === false)) {
    $validation_errors[] = 'The task description must be at least 5 characters in length.';
}

// Complete value cannot be greater than 1.
if ($complete > 1) {
    $validation_errors[] = 'You did not submit a valid value for \'complete\'.';
}