<?php
session_start();

$username=$_SESSION['username'];
$password=$_SESSION['password'];
echo " HELLO $username";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
         .sub_button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 50%;
            
        }
    </style>
</head>
<body>
   
        <button class="sub_button"><a href="logout.php" class="nav-link my-1">LOGOUT</a></button>
</body>
</html>