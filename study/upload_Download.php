<?php
session_start();

if (!isset($_SESSION['user_eno'])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Login Page</title>
    <style>
        .navbar {
            background-color: #8a4818;
            overflow: visible;
            position: absolute;
            /* Fix the position to the top */
            width: 100%;
            /* Take up the full width of the viewport */
            top: 0;
            /* Align to the top */
        }

        .navbar a {
            display: inline-block;
            /* Display the links in a line */
            color: #f2f2f2;
            text-align: center;
            padding: 30px 80px;
            text-decoration: none;
            font-size: 17px;
        }


        .navbar a:hover::content {
            background-color: #ddd;
            color: black;
        }

        /* CSS styles for the login form */
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('newbackground.png');
            /* Replace with the actual path to your image */
            background-size: cover;
            background-position: center;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .title{
            position: absolute;
            top: 35%;
            left: 30%;
            transform: translate(-50%, -50%);
        }
        .title h3{
            color: #050505;
            font-size: 50px;
        }

        .subtitle{
            position: absolute;
            top: 55%;
            left: 30%;
            transform: translate(-50%, -50%);
            color: #050505;
            font-size: 35px;
        }

        .button{
            position: absolute;
            top: 70%;
            left: 25%;
            transform: translate(-50%, -50%);
        }

        .btn{
            border: 1px solid #8a4818;
            padding: 20px 50px;
            color: #faf9f8;
            text-decoration: none;
            transition: 0.6s ease;
            background-color: #8a4818;
            border-radius: 20px;
        }

        .btn:hover{
            background-color: #faf9f8;
            color: #8a4818;
        }

    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.php"><i class="bi bi-house-fill"></i> Home</a>
        <a href="profile.php"><i class="bi bi-person-fill"></i> profile</a>
        <a class="right" href="contactus.php"><i class="bi bi-telephone-fill"></i> Contact Us</a>
        <a href="include/logout.inc.php">Logout</a>
    </div>

    <div class="title">
        <h3>Welcome To ACADEMIA!</h3>
    </div>

    <div class="subtitle">
        <h3><i>Best Way To Get Your Lecture Notes</i></h3>
    </div>
    
    <div class="button">
        <a href="./upload.php" class="btn">Upload</a>
        <a href="./download.php" class="btn">Download</a>
    </div>

</body>

</html>