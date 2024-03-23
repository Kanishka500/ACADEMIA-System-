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
            top: 40%;
            left: 30%;
            transform: translate(-50%, -50%);
        }
        .title h1{
            color: #050505;
            font-size: 140px;
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
            top: 80%;
            left: 15%;
            transform: translate(-50%, -50%);
        }

        .btn{
            border: 1px solid #8a4818;
            padding: 10px 30px;
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
        <?php

            if (isset($_SESSION['user_eno'])) {
                echo '<a href="upload_Download.php">Upload&Download</a>';
                echo '<a href="include/logout.inc.php">Logout</a>';
            }
        ?>
    </div>


<?php
require_once "./include/dbh.inc.php";
// Step 2: Fetch data from the "notes" table
$sql = "SELECT year, semester, subject, filename,review, filerealname FROM notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Step 3: Organize data into categories
    $categories = array();
    while ($row = $result->fetch_assoc()) {
        $year = $row['year'];
        $semester = $row['semester'];
        $subject = $row['subject'];
        $filename = $row['filename'];
        $realfilename = $row['filerealname'];
        $review = $row['review'];
        
        // dont show the files that are not approved
        if($review == "Approved"){
            // Create categories if they don't exist
            if (!isset($categories[$year])) {
                $categories[$year] = array();
            }
            if (!isset($categories[$year][$semester])) {
                $categories[$year][$semester] = array();
            }
            if (!isset($categories[$year][$semester][$subject])) {
                $categories[$year][$semester][$subject] = array();
            }
            
            // Add filename and real filename to the appropriate category
            $categories[$year][$semester][$subject][] = array('filename' => $filename, 'file_real_name' => $realfilename,'review' => $review);
        }else{
            continue;
        }
    }
    
    // Step 4: Display files under each category
    // only approved files will be shown
    foreach ($categories as $year => $yearData) {
        if ($year == 'fst') {
            $year = "First Year";
        }elseif ($year == 'snd') {
            $year = "Second Year";
        }elseif ($year == 'trd') {
            $year = "Third Year";
        }
        echo "<h2>Year: $year</h2>";
        foreach ($yearData as $semester => $semesterData) {
            echo "<h3>Semester: $semester</h3>";
            foreach ($semesterData as $subject => $files) {
                echo "<h4>Subject: $subject</h4>";
                echo "<ul>";
                foreach ($files as $file) {
                    // Step 5: Provide download links for each file
                    if($file['review'] == "Approved"){
                        echo "<li><a href='uploads/{$file['filename']}' download>{$file['file_real_name']}</a></li>";
                    }
                }
                echo "</ul>";
            }
        }
    }
} else {
    echo "No notes found.";
}

$conn->close();
?>


</body>

</html>
