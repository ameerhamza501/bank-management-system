<?php
    include "validate_customer.php";
    include "header.php";
    include "account_holdernavbar.php";
    include "account_holdersidebar.php";
 
   include "session_timeout.php";

    if (isset($_GET['customer_id'])) {
        $id = $_GET['customer_id'];
    }

   
 $sql0 = "SELECT * FROM customer WHERE customer_id=".$id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="account_holderadd_style.css">
</head>

<body>
   
 <form class="add_account_holderform" action="send_funds_action.php?customer_id=<?php echo $id ?>" method="post">
    
    <div class="flex-container-form_header">
            <h1 id="form_header">Transfer Funds</h1>
        </div>

      
  <div class="flex-container">
            <div class=container>
                <label>
                    
To : <label id="info_label">
                        <?php echo $row0["first_name"]." ".$row0["last_name"] ?>
                  
  </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
         
   <div class=container>
                <label>Account No : <label id="info_label"><?php echo $row0["account_no"] ?></label></label>
  
          </div>
        </div>

        <div class="flex-container">
            <div class=container>
              
  <label>Enter Amount (in INR) :</label><br>
                <input name="amt" size="24" type="text" required />
      
      </div>
        </div>

        <div class="flex-container">
            <div  class=container>
           
     <label>Enter your pasword :</b></label><br>
                <input name="pasword" size="24" type="pasword" required />
    
        </div>
        </div>

        <div class="flex-container">
            <div class="container">
           
     <a href="payee.php" class="button">Go Back</a>
            </div>

            <div class="container">
               
 <button type="submit">Submit</button>
            </div>

            <div class="container">
             
   <button type="reset" class="reset" onclick="return confirmReset();">Reset</button>
            </div>
  
      </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Do you really want to reset?')
 
   }
    </script>

</body>
</html>
