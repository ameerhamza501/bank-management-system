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

    if (isset($_GET['customer_id'])) {
        $sql0 = "DELETE FROM payee".$_SESSION['last_login_id'].
                " WHERE benef_customer_id=".$_GET['customer_id'];
    }

    $success = 0;
    if (($conn->query($sql0) === TRUE)) {
        $sql0 = "SELECT MAX(benef_id) FROM payee".$_SESSION['last_login_id'];
        $result = $conn->query($sql0);
        $row = $result->fetch_assoc();

        $id = $row["MAX(benef_id)"] + 1;
        $sql1 = "ALTER TABLE payee".$_SESSION['last_login_id']." AUTO_INCREMENT=".$id;

        $conn->query($sql1);
        $success = 1;
    }

    if (isset($_GET['redirect'])) {
        $_SESSION['auto_delete_benef'] = true;
        header("location:payee.php");
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
                    if ($success = 1) { ?>
                        <p id="info"><?php echo "payee Deleted Successfully !"; ?></p>
                    <?php
                    }
                    else { ?>
                        <p id="info"><?php echo "Error: " . $conn->error . "<br>"; ?></p>
                    <?php
                    }
                ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="payee.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
