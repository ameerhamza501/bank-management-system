<?php
    include "validate_customer.php";
    include "header.php";
   
 include "account_holdernavbar.php";
    include "account_holdersidebar.php";
  
  include "session_timeout.php";

    $firtname = mysqli_real_escape_string($conn, $_POST["firtname"]);
   
 $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
   
 $acno = mysqli_real_escape_string($conn, $_POST["acno"]);
  
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
 
   $phno = mysqli_real_escape_string($conn, $_POST["phno"]);

   
 $id = $_SESSION['last_login_id'];
    $sql0 = "SELECT customer_id FROM customer WHERE first_name='".$firtname."' AND
          
                                      last_name='".$lastname."' AND
                                               
 account_no='".$acno."' AND
                     email='".$email."' AND
   phone_no='".$phno."'";
    $result = $conn->query($sql0);


    $success = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $payee_id = $row["customer_id"];

 
       if ($id != $payee_id) {
            $sql1 = "INSERT INTO payee".$id." VALUES(
                        NULL,
        
                '$payee_id',
                        '$email',
                        '$phno',
                        '$acno'
       
             )";

            if (($conn->query($sql1) === TRUE)) {
                $success = 1;
            }
        }
      
  else {
            $success = -1;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
          
  <?php
            if ($success == 1) { ?>
                <p id="info"><?php echo "payee successfully added !\n"; ?></p>
            <?php } ?>

        
    <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Invalid data entered/conection error !\n"; ?></p>
            <?php } ?>

  
          <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Can't add self as payee !\n"; ?></p>
         
   <?php } ?>
        </div>

        <div class="flex-item">
            <a href="payee.php" class="button">Go Back</a>
      </div>
    </div>


</body>

</html>
