<?php
    include "validate_customer.php";
   
 include "header.php";
   
 include "account_holdernavbar.php";
  
  include "account_holdersidebar.php";
    
include "session_timeout.php";
?>


<!DOCTYPE html>
<html>
<head>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
   <link rel="stylesheet" href="account_holderadd_style.css">
</head>

<body>
    
<form class="add_account_holderform" action="add_payee_action.php" method="post">
      
  <div class="flex-container-form_header">
           
 <h1 id="form_header">Please fill in payee details...</h1>
        </div>

   
     <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
           
     <input name="firtname" size="30" type="text" required />
            </div>
            <div  class=container>
             
   <label>Last Name :</b></label><br>
                <input name="lastname" size="30" type="text" required />
        
    </div>
        </div>

        <div class="flex-container">
            <div class=container>
            
    <label>Account No :</label>
<br>
               
 <input name="acno" size="25" type="text" required />
    
        </div>
        </div>

        <div class="flex-container">
    
        <div class=container>
                <label>Email-ID :</label><br>
             
   <input name="email" size="30" type="text" required />
            </div>
       
     <div  class=container>
                <label>Phone No. :</b></label><br>
           
     <input name="phno" size="30" type="text" required />
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
                <button type="reset" class="reset" onclick="return confirmReset();
">Reset</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() 
{
        return confirm('Do you really want to reset?')
    }
    </script>


</body>

</html>
