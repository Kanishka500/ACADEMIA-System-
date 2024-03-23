<?php

require_once "./dbh.inc.php";
require_once "./validation.inc.php";


if (isset($_POST['login-btn'])) {
    $eno = $_POST['eNo'];
    $pass = $_POST['pass'];
    // $remember = $_POST['re-check'];

    // if (inputEmptyLogin($eNo, $pass)) {
    //     header("Location: ../login.php?err=empty_inputs");
    // } elseif (indexlInvalid($index)) {
    //     header("Location: ../login.php?err=invalid_index");
    // if (passwordInvalid($pass)) {
    //     header("Location: ../login.php?err=invalid_password");
    // } else {
        loginUser($conn, $eno, $pass);
    // }
} else {
    header("Location: ../index.php");
    exit();
}


function loginUser($conn, $eno, $pass)
{

    $sql = "SELECT * FROM students WHERE eno = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?err=faildstmtregister");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $eno);
    mysqli_stmt_execute($stmt);
    $data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($data)) {

        $passHashed = $row['password'];

        $isPassOk = password_verify($pass, $passHashed);

        echo $isPassOk;
        if ($isPassOk) {
            session_start();
            $_SESSION['user_eno'] = $row['eno'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['user_email'] = $row['email'];


            //cookie($remember, $index, $pass);

            if($row['role'] == "student"){
                header("Location: ../upload_Download.php");
                exit();
            }elseif($row['role'] == "Admin"){
                header("Location: ../admin.php");
                exit();
            }

            exit();
        } else {
            header("Location: ../login.php?err=loginfailedpass");
            exit();
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: ../login.php?err=loginfailedpass");
        mysqli_stmt_close($stmt);
        exit();
    }
}

function cookie($remember, $eno, $pass)
{
    if (isset($remember)) {
        setcookie("indexcookie", $eno, time() + (3600 * 24 * 7), "/");
        setcookie("passwordcookie", $pass, time() + (3600 * 24 * 7), "/");
    } else {
        if (isset($_COOKIE['indexcookie'])) {
            setcookie("indexcookie", $eno, time() - (3600 * 24 * 7), "/");
        }
        if (isset($_COOKIE['passwordcookie'])) {
            setcookie("passwordcookie", $eno, time() - (3600 * 24 * 7), "/");
        }
    }
}