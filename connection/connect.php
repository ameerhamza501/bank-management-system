<?php
$servername = "localhost";
// Enter your MySQL username below(default=root)
$username = "root";

// Enter your MySQL pasword below
$pasword = "";
$dbname = "net_banking";

// Create conection
$conn = new mysqli($servername, $username, $pasword, $dbname);


// Check conection
if ($conn->conect_error) {
    header("location:conection_error.php?error=$conn->conect_error");
   
 die($conn->conect_error);
}
?>
