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
    <title>Upload Page</title>
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
        <?php

            if (isset($_SESSION['user_eno'])) {
                echo '<a href="upload_Download.php">Upload&Download</a>';
                echo '<a href="include/logout.inc.php">Logout</a>';
            }
        ?>
    </div>

    <div class="Register-form">
        <h2>UPLOAD</h2>
        <form action="upload-delete.php" method="POST" enctype="multipart/form-data">
            <?php
            
            echo "Enrollment Number : <input type='text' name='ENo' value='{$_SESSION['user_eno']}' disabled required><br>";
            echo "Student Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='email' value='{$_SESSION['user_email']}' disabled required>";
            ?>
            
            Academic Year : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="academicYear" name="Academic_Year">
                <option value="fst">First Year</option>
                <option value="snd">Second Year</option>
                <option value="trd">Third Year</option>
            </select><br><br>

            <label for="semester">Semester : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <select id="semester" name="Semester">
                <option value="sem1">Semester I</option>
                <option value="sem2">Semester II</option>
            </select><br><br>
                
            <label for="subject">Subject : &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="subject" name="Subject">
                <!-- Options will be populated dynamically using JavaScript -->
            </select><br><br>
                
            <label for="username">Upload File : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
            <input type="file" name="file" accept="application/pdf" required>

            <p></p><button type="clear">Clear</button>
           <button type="submit" name="upload">Submit</button></a>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var academicYearSelect = document.getElementById('academicYear');
            var semesterSelect = document.getElementById('semester');
            var subjectSelect = document.getElementById('subject');

            // Function to populate subjects based on the selected options
            function updateSubjects() {
                // Clear existing options
                subjectSelect.innerHTML = "";

                // Define subjects based on academic year and semester
                var subjects = {
                    fst_sem1: ["ESD 121-1 English Language","ESD 151-1 Sinhala Language I","ESD 161-1 Tamil Language I","ICT 101-2 Mathematics for ICT", "ICT 131-3 Programming Techniques","ICT 133-3 Computer Systems Organization","ICT 141-3 Electronics for ICT"],
                    fst_sem2: ["ESD 111-1 Communication Skills I","ESD 122-1 Communicative English","ESD 152-1 Sinhala Language II","ESD 162-1 Tamil Language II","ICT 102-2 Calculus","ICT 103-2 Introduction to Statistics","ICT 111-2 Financial Management","ICT 134-2 Database Management Systems","ICT 142-3 Internet and Web Technologies","ICT 143-2 Data Structures and Algorithms"],
                    snd_sem1: ["BGE 211-2 Aesthetic Studies", "ESD 221-1 Effective English Usage","ICT 201-2 Numerical Methods","ICT 231-3 Object Oriented Programming","ICT 232-3 Information Systems and Data Modeling","ICT 233-2 Communication Theory","ICT 234-2 Information Assurance","ICT 235-3 Software Engineering"],
                    snd_sem2: ["ESD 222-1 Explorative English ","ICT 211-2 Project Management","ICT 221-2 Professional Ethics in Computing","ICT 222-2 Independent Study Project I","ICT 236-2 Business Process Management","ICT 237-2 Systems Level Programming","ICT 238-3 Object Oriented Analysis and Designs","ICT 241-2 Human Computer Interaction","ICT 242-2 Statistical Methods"],
                    trd_sem1: ["ESD 311-1 Communication Skills II","ICT 321-2 Independent Study Project II","ICT 331-2 Advanced Database Management Systems","ICT 332-3 Software Quality Assurance ","ICT 341-2 Algorithm Design and Optimization","ICT 342-2 Cloud Computing","ICT 343-3 Web Service Technologies","ICT 351-2 Mobile Computing","ICT 352-2 Rapid Application Development","ICT 361-3 Operational Research","ICT 362-1 Sampling Techniques"],
                    trd_sem2: ["Industrial Training"],
                    // Add subjects for other combinations of academic year and semester
                };

                // Get the selected academic year and semester
                var academicYear = academicYearSelect.value;
                var semester = semesterSelect.value;

                // Populate subjects based on the selected options
                subjects[academicYear + '_' + semester].forEach(function (subject) {
                    var option = document.createElement('option');
                    option.text = subject;
                    option.value = subject.replace(/\s/g, ''); // Remove spaces for value
                    subjectSelect.add(option);
                });
            }

            // Call updateSubjects initially and whenever academic year or semester changes
            updateSubjects();
            academicYearSelect.addEventListener('change', updateSubjects);
            semesterSelect.addEventListener('change', updateSubjects);
        });
    </script>
</body>

</html>
