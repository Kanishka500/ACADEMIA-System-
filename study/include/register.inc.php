<?php

require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if (isset($_POST['register-btn'])) {
    $eno = $_POST['eNo'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['repass'];
    $role = "student";

    if (nameInvalid($fname, $lname)) {
        header("Location: ../register.php?err=invalid_name");
    } elseif (emailInvalid($email)) {
        header("Location: ../register.php?err=invalid_email");
    // } elseif (mobileInvalid($mobile)) {
    //     header("Location: ../register.php?err=invalid_mobile");
    } elseif (passwordInvalid($pass)) {
        header("Location: ../register.php?err=invalid_password");
    } elseif (passNotMatch($pass, $re_pass)) {
        header("Location: ../register.php?err=different_pass");
    } elseif (emailOrMobileAvalable($email, $eno, $conn)) {
        header("Location: ../register.php?err=available_emailorindex");
    } else {
        registerNewUser($conn, $eno, $fname, $lname, $email, $pass, $role);
    }
} else {
    header("Location : ../register.php");
    exit();
}

function registerNewUser($conn, $eno, $fname, $lname, $email, $pass, $role)
{

    $name = $fname . " " . $lname;

    $passHashed = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (eno,name,email,password,role) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?err=faildstmt");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssss", $eno, $name, $email, $passHashed,$role);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../register.php?err=noerrors");
    }
}