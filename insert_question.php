<?php
include('includes/connect.php');
session_start();
$student_name=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask the Question!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 10px;
            font-family: 'Poppins', sans-serif;
            background-image: url('images/school.jpg');
        }

        .container {
            width:40%; /* Increase the max-width */
            margin: 90px auto;
            background: #fff;
            padding: 30px; /* Increase the padding */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px; /* Increase the padding */
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #000;
            color: #fff;
            padding: 12px; /* Increase the padding */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ask Question</h2>
        <form action="#" method="post">
            <label for="stu_name">Student Name:</label>
            <input type="text" name="stu_name"  required>

            <label for="subject">Subject:</label>
            <select id="subject" name="subject" >
            <?php
                   $select_query="Select * from `all_subjects`";
                   $result_query=mysqli_query($con,$select_query);
                   while($row=mysqli_fetch_assoc($result_query))
                   {
                     $subject_name=$row['subject_name'];
                     $subject_id=$row['subject_id'];
                     echo "<option value='$subject_id'>$subject_name</option>";
                   }
                ?>
            </select>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" name="sub_question">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['sub_question'])){
    $sub_id=$_POST['subject'];
    $stu_name=$_POST['stu_name'];
    $question=$_POST['message'];
    $insert_query="INSERT INTO `questions` (student_name,subject_id,question) 
    VALUES ('$stu_name',$sub_id ,'$question')";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('$stu_name and $sub_id and $question')</script>";
        echo "<script>window.open('student.php','_self')</script>"; 
    }
    }
   
?>
