<?php
session_start();

if (!isset($_SESSION['user_role'])) {

    if($_SESSION['user_role'] != "Admin"){
        header("Location: ./login.php");
    }
}
?>


<?php


require_once "./include/dbh.inc.php";

if (isset($_POST['btn-approve'])) {
    $filename = $_POST['filename'];
    $sql = "UPDATE notes SET review = 'Approved' WHERE filename = '$filename'";
    $conn->query($sql);
    // $conn->close();
}

if (isset($_POST['btn-reject'])) {
    $filename = $_POST['filename'];
    $sql = "UPDATE notes SET review = 'Pending' WHERE filename = '$filename'";
    $conn->query($sql);
    // $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>ModaraterApprovel Page</title>
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
        <h2>Uploaded files</h2>
        <form action="?" method="POST">

        <?php
require_once "./include/dbh.inc.php";
// Step 2: Fetch data from the "notes" table
$sql = "SELECT year, semester, subject, filename, filerealname,review FROM notes";
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
    }
    
    // Step 4: Display files under each category
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
                    echo "<li><a href='uploads/{$file['filename']}' download>{$file['file_real_name']}</a></li>";
                    echo "<input type='hidden' name='filename' value='{$file['filename']}'>";
                    if($file['review'] == "Pending"){
                        echo "<button type='submit' name='btn-approve' >Approvel</button><br><br><br>";
                    }else{
                        echo "<button type='submit' name='btn-reject'>Reject</button><br><br><br>";
                    }
                }
                echo "</ul>";
            }
        }
    }
} else {
    echo "No notes found.";
}


?>
            
			<!-- <a href="upload-Download.php"><button type="close" >Close</button></a><br> -->
        </form>
    </div>
</body>

</html>