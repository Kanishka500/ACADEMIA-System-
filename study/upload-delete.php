<?php

session_start();

require_once "./include/dbh.inc.php";

if (isset($_POST['upload'])) {

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    // $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower($fileExt['1']);
    $allowed = array('pdf');

    $eno = $_POST['ENo'];
    $email = $_POST['email'];
    $year = $_POST['Academic_Year'];
    $semester = $_POST['Semester'];
    $subject = $_POST['Subject'];

    echo $eno.$email.$year.$semester.$subject;

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 100000000) {
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                $filDest = "uploads/" . $fileNewName;

                if (!move_uploaded_file($fileTmpName, $filDest)) {
                    $_SESSION['message'] = "upload error";
                    header("Location: index.php");
                    exit(0);
                }

                $review = "Pending";

                $date = date("Y-m-d");

                echo $eno.$email.$year.$semester.$subject.$fileNewName.$review;

                $query = "INSERT INTO notes (eno,email,year,semester,subject,filename,review,filerealname) VALUES ('$eno','$email','$year','$semester','$subject','$fileNewName','$review','$fileName');";
                $query_run = mysqli_query($conn, $query);

                if ($query_run) {
                    $_SESSION['message'] = "Note Uploaded Successfully";
                    header("Location: UploadScuccesfulMessage.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Note Upload Error";
                    //display error message
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    //header("Location: index.php");
                    exit(0);
                }
                $_SESSION['message'] = "upload success";
                header("Location: UploadScuccesfulMessage.php");
                exit(0);
                
            } else {
                $_SESSION['message'] = "File is too big";
                header("Location: index.php");
                exit(0);
            }
        } else {
            $_SESSION['message'] = "There is an error related to your file";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "You cannot upload this type of files";
        header("Location: index.php");
        exit(0);
    }

}

// if (isset($_POST['delete_news'])) {

//     $id = mysqli_real_escape_string($conn, $_POST['delete_news']);

//     $query = "SELECT image FROM news WHERE id='$id'";
//     $quary_run = mysqli_query($conn, $query);

//     if ($quary_run) {

//         $row = mysqli_fetch_assoc($quary_run);
//         $path = "uploads/" . $row['image'] . "";

//         if (unlink($path)) {
//             $query = "DELETE FROM news WHERE id='$id'";
//             $quary_run = mysqli_query($conn, $query);
//             if ($quary_run) {
//                 $_SESSION['message'] = "News Delete Successfully";
//                 header("Location: news.php");
//                 exit(0);
//             } else {
//                 $_SESSION['message'] = "News Delete Error";
//                 header("Location: news.php");
//                 exit(0);
//             }
//         } else {
//             $_SESSION['message'] = "Failed to delete";
//             header("Location: news.php");
//             exit(0);
//         }

//         $_SESSION['message'] = "News Delete Successfully";
//         header("Location: news.php");
//         exit(0);
//     } else {
//         $_SESSION['message'] = "News Delete Error";
//         header("Location: news.php");
//         exit(0);
//     }
// }
