<?php
include('includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('images/login.jpg');
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.3);
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 8px;
        }

        .sub_button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form action="" class="login-form" style=" display: flex;">
    <input type="submit" name="student" value="STUDENT">
    <input type="submit" name="teacher" value="TEACHER">
  </form>
    <?php
        if(isset($_GET['student']))
        {
            
            echo "<h2>Student Login</h2>
            <form class='login-form' method='post'>
            <input type='text' placeholder='Username' name='stu_username' required>
            <input type='password' placeholder='Password' name='stu_password' required>
            <input class='sub_button' type='submit' name='stu_login' value='Login'>
           
        </form>";
        }
        if(isset($_GET['teacher']))
        {
            echo "<h2>Teacher Login</h2>
            <form class='login-form' method='post'>
            <input type='text' placeholder='Username' name='tea_username' required>
            <input type='password' placeholder='Password' name='tea_password' required>
            <input class='sub_button' type='submit' name='tea_login' value='Login'>
            </form>";
        }
   ?>  
</div>
</body>
</html>
 <?php
        if(isset($_POST['stu_login']))
        {
            $username = $_POST['stu_username'];
            $password = $_POST['stu_password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            if($username=='student' && $password=='pcce'){
                 echo "<script>window.open('student.php','_self')</script>"; 
                 echo "<script>alert('login sucess')</script>";
            }
            else{
                echo "<script>alert('invalid credentials')</script>";
                echo "<script>window.open('login.php','_self')</script>"; 
            }
            
            
        }
        if(isset($_POST['tea_login']))
        {
            $username = $_POST['tea_username'];
            $password = $_POST['tea_password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            if($username=='teacher' && $password=='pcce'){
                 echo "<script>window.open('teacher.php','_self')</script>"; 
                 echo "<script>alert('login sucess')</script>";
            }
            else{
                echo "<script>alert('invalid credentials')</script>";
                echo "<script>window.open('login.php','_self')</script>"; 
            }
            
        }
        ?>