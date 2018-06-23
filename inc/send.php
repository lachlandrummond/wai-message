<?php
    error_reporting(0);
    require_once('db-connect.php');
    $id = NULL;
    $message = $_POST['msg_send'];
    $user = $_SESSION['username'];
    $msg = $_SESSION['msg'];
    $ts = NULL;
    $statement = mysqli_prepare( $link, "INSERT INTO messages VALUES (?, ?, ?, ?, ?)" );
    mysqli_stmt_bind_param($statement, 'sssss', $id, $message, $user, $msg, $ts);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close( $statement );
    mysqli_close( $link );
    header('Location: ?page=msg&msg='.$_SESSION['msg'].'')
?>