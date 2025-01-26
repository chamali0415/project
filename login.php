<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }

    $file = '../data/users.txt'; 
    $users = file($file, FILE_IGNORE_NEW_LINES);

   
    foreach ($users as $user) {
        list($existing_username, $hashed_password) = explode('|', $user);
        if ($existing_username === $username && password_verify($password, $hashed_password)) {
            echo "Login successful! Welcome, $username.";
            exit;
        }
    }

    echo "Invalid username or password.";
}
?>
