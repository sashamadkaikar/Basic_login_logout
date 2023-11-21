<?php
session_start();
include('includes/connect.php');
$username=$_SESSION['username'];
$password=$_SESSION['password'];
//echo " HELLO $username";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            background-image: url('images/school.jpg');
        }

        .container {
            background: #fff;
            margin: auto;
            width: 70%;
            height: 70vh;
            border-radius: 10px;
            box-sizing: border-box;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:2%;
            overflow-y: auto;
           
        }

        .sub-container {
            margin: 20px;
           
        }

        .btn2 {
            background: #fff;
            font-weight: 600;
            font-size: 16px;
            height: 50px;
            width: 150px;
            border: 2px solid #a17630;
            border-radius: 50px;
            cursor: pointer;
            text-align:center;
        }

        .btn2:hover {
            background: #a17630;
            color: #fff;
        }

        .btn2 a {
            text-decoration: none;
            color: inherit;
           
            height: 100%;
            width: 100%;
        }

.container2{
            font-weight: 600;
            font-size: 16px;
            height: 50px;
            width: 150px;
            border: 2px solid #a17630;
            border-radius: 50px;
            cursor: pointer;
            text-align:center;
            margin:auto;
            margin-top:2%;
}
.questions {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
    width: 90%; /* Adjust the width as needed */
    overflow-y: auto; /* Add this to enable vertical scrolling */
    max-height: 400px;
}

.questions ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.questions li {
    margin-bottom: 10px;
    font-weight: bold;
}

/* Add additional styles as needed for each list item */

    </style>
</head>
<body>
<div class="container2">
    <form action="" method="post">
            <input type="submit" class="btn2" name="stu_question" value="ASK A QUESTION">
        </form>
</div>
   <div class="container" style="">
    <!-- first child -->
    <div class="sub-container">
        
      <h1>Questions</h1>
      <?php
       if(isset($_POST['stu_question'])){
        echo "<script>window.open('insert_question.php','_self')</script>"; 
       }
      else{
        ?>
        <!-- second child -->
        
            <?php
        $display_query="select * from `questions`";
        $run=mysqli_query($con,$display_query);
        while($row_data=mysqli_fetch_assoc($run)){
            $ques=$row_data['question'];
            $st_name=$row_data['student_name'];
            $sub_id=$row_data['subject_id'];
            $ques_no=$row_data['question_id'];
            $sub_query="select * from `all_subjects` where subject_id=$sub_id";
            $run_sub=mysqli_query($con,$sub_query);
            $row_sub=mysqli_fetch_assoc($run_sub);
            $sub_name=$row_sub['subject_name'];
             echo"<div class='questions'>
             <ul> 
                <li>SUBJECT : $sub_name</li>
                <li>QUESTION NO : $ques_no</li>
                <li>STUDENT NAME : $st_name</li>
                <li>QUSETION : $ques</li> 
                </ul> 
                </div> ";
        }
      }
      ?> 
      
    </div>

   </div>

    <!-- button for logout  -->
  <div class="container2">
        <button class="btn2"><a href="logout.php" class="nav-link mt-2 my-1">LOGOUT</a></button>
  </div>
  
</body>
</html>
