<?php
// $is_logged_in = true;
// $has_paid = true;

// if (($is_logged_in === true) && ($has_paid === true)) {
//     echo 'Welcome to your course!';
// }

$user_level = 'admin';

if (($user_level === 'admin') || ($user_level === 'manager')) {
    echo 'Welcome to the admin panel.';
}





