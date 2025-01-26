<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

   
    if (empty($username) || empty($password)) {
        echo "Both fields are required.";
        exit;
    }

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $file = 'E:\NOTES RUSL\2nd year\CS\Web designing\Project\users.txt'; 
    $user_data = "$username|$password\n";

   
    $users = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($existing_username, ) = explode('|', $user);
        if ($existing_username === $username) {
            echo "Username already exists. Choose a different one.";
            exit;
        }
    }

    
    file_put_contents($file, $user_data, FILE_APPEND);
    echo "Registration successful! <a href='../login.html'>Login here</a>";
}
?>
