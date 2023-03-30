<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
   
 if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
   
 include "conect.php";
    include "header.php";
    include "account_holdernavbar.php";
   
 include "account_holdersidebar.php";
    include "session_timeout.php";

   
 $_SESSION['auto_delete_benef'] = false;
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
         
   <p id="info" style="font-size:36px;">
                <b>One or more of your beneficiaries have been deleted ! :(</b><br>
            </p>
        </div>

   
     <div class="flex-item">
            <p id="info" style="margin-top:-40px;">
        
        <br>For security reasons if sensitive details of your payee like
                Phone No, Account No, Email-ID, etc have been changed <b>OR</b> 
if the
                payee no longer exists, they get deleted from your list of
                beneficiaries automatically.
<br><br>
                Please add payee details again. :)
            </p>
        </div>
        <?php $conn->close(); ?>

 
       <div class="flex-item">
            <a href="payee.php" class="button">Go to Transfer Funds</a>
        </div>

 
   </div>

</body>
</html>
