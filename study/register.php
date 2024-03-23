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

        .Register-form {
            width: 480px;
            margin: 0 auto;
            margin-top: 100px;
            background-color: #fff;
            /* Add a background color for the login form */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px #8a4818(0, 0, 0, 0.1);
            border: 2px solid #8a4818;
        }

        .Register-form h2 {
            text-align: center;
            /* Center the h2 element */
            color: #8a4818
        }

        .Register-form input[type="text"],
        .Register-form input[type="password"] {
            width: 65%;
            padding: 10px 20px;
            margin: 5px ;
            display: flexbox;
            border: 2px solid #8a4818;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
        }

        .Register-form button {
            background-color: #8a4818;
            color: white;
            padding: 10px 10px;
            margin: 8px 0;
            border: none;
            float: right;
            border-radius: 20px;
            cursor: pointer;
            width: 50%;
        }

        .Register-form button:hover {
            opacity: 0.8;
        }

    </style>
</head>

<body>
    <div class="navbar">
        <a href="index.php"><i class="bi bi-house-fill"></i> Home</a>
        <a href="profile.php"><i class="bi bi-person-fill"></i> profile</a>
        <a class="right" href="contactus.php"><i class="bi bi-telephone-fill"></i> Contact Us</a>
    </div>

    <div class="Register-form">
        <h2>REGISTER FORM</h2>
        <form action="./include/register.inc.php" method="POST">
            <label for="username">Enrollment Number : </label>
            <input type="text" name="eNo" required>
            <label for="username">Full Name : &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="fname" required></br>
            <label for="username">Student Email : &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="email" required></br>
            <label for="username">Contact Number : &nbsp; &nbsp;&nbsp;</label>
            <input type="text" name="phone" required></br>
            <label for="username">User Name : &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input name="lname" type="text" required>
            <label for="username">Create Password : &nbsp; &nbsp;</label>
            <input name="pass" type="text" required>
            <label for="password">Confirm Password : &nbsp;</label>
            <input  name="repass" type="password" required>


            <p></p><button type="clear">Clear</button>
            <button type="submit" name="register-btn">Submit</button>
        </form>
    </div>
</body>

</html>