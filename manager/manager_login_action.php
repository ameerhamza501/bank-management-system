<?php
    include "conect.php";
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    
if(!isset($_SESSION)) {
        session_start();
    }

    $uname = mysqli_real_escape_string($conn, $_POST["manager_uname"]);
  
  $pwd = mysqli_real_escape_string($conn, $_POST["manager_psw"]);

    $sql0 =  "SELECT * FROM manager WHERE uname='".$uname."' AND pwd='".$pwd."'";
  
  $result = $conn->query($sql0);

    if (($result->num_rows) > 0) {
        $_SESSION['ismanagerValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
      
  header("location:manager_home.php");
    }
    else {
        session_destroy();
        die(header("location:manager_login.php?loginFailed=true"));
    }
?>
