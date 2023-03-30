<?php
    include "validate_manager.php";
    include "conect.php";
    include "header.php";
    include "user_navbar.php";
  
  include "manager_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
 <link rel="stylesheet" href="action_style.css">
</head>

<?php
$firtname = mysqli_real_escape_string($conn, $_POST["firtname"]);

$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$gender = mysqli_real_escape_string($conn, $_POST["gender"]);

$dob = mysqli_real_escape_string($conn, $_POST["dob"]);
$aadhar = mysqli_real_escape_string($conn, $_POST["aadhar"]);

$email = mysqli_real_escape_string($conn, $_POST["email"]);
$phno = mysqli_real_escape_string($conn, $_POST["phno"]);

$address = mysqli_real_escape_string($conn, $_POST["address"]);
$branch = mysqli_real_escape_string($conn, $_POST["branch"]);

$acno = mysqli_real_escape_string($conn, $_POST["acno"]);
$o_balance = mysqli_real_escape_string($conn, $_POST["o_balance"]);

$pin = mysqli_real_escape_string($conn, $_POST["pin"]);
$cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);

$cus_pwd = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);

$sql0 = "SELECT MAX(customer_id) FROM customer";
$result = $conn->query($sql0);

$row = $result->fetch_assoc();
$id = $row["MAX(customer_id)"] + 1;

/*  Prevent mismatch between customer_id and benef/passbook table number.
  
  This is because when a row is deleted from customer AUTO_INCREMENT does
    not reset but keeps increasing.
  
  Hence resest AUTO_INCREMENT to $id and eleminate the error. */
$sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$id;

$conn->query($sql5);

$sql1 = "CREATE TABLE passbook".$id."(
            trans_id INT NOT NULL AUTO_INCREMENT,
            trans_date DATETIME,
        
    remarks VARCHAR(255),
            debit INT,
            credit INT,
            balance INT,
            PRIMARY KEY(trans_id)
        )";


$sql2 = "CREATE TABLE payee".$id."(
            benef_id INT NOT NULL AUTO_INCREMENT,
            benef_customer_id INT UNIQUE,
       
     email VARCHAR(30) UNIQUE,
            phone_no VARCHAR(20) UNIQUE,
            account_no INT UNIQUE,
            PRIMARY KEY(benef_id)
        )";


$sql3 = "INSERT INTO customer VALUES(
            NULL,
            '$firtname',
            '$lastname',
            '$gender',
            '$dob',
      
      '$aadhar',
            '$email',
            '$phno',
            '$address',
            '$branch',
            '$acno',
            '$pin',
 
           '$cus_uname',
            '$cus_pwd'
        )";

$sql4 = "INSERT INTO passbook".$id." VALUES(
            NULL,
            NOW(),
      
      'Opening Balance',
            '0',
            '$o_balance',
            '$o_balance'
        )";

?>

<body>
    <div class="flex-container">
     
   <div class="flex-item">
            <?php
            if (($conn->query($sql3) === TRUE)) { ?>
                <p id="info">

<?php echo "Customer created successfully !\n"; ?></p>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql1) === TRUE)) 
{ ?>
                <p id="info"><?php echo "Passbook created successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info">
<?php
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
           
 <?php
            if (($conn->query($sql4) === TRUE)) { ?>
                <p id="info"><?php echo "Passbook updated successfully !\n"; ?></p>
          
  <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql4 . "<br>" . $conn->error . "<br>"; ?></p>
          
  <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql2) === TRUE)) { ?>
          
      <p id="info"><?php echo "payee created successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info">
<?php
                echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

          
  <?php
            } else { ?>
        </div>
        <div class="flex-item">
                <p id="info">
<?php
                echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>
        <?php $conn->close(); 
?>

        <div class="flex-item">
            <a href="account_holderadd.php" class="button">Add Again</a>
        </div>

    </div>

</body>
</html>
