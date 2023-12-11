<?php require_once('header.php'); ?>

<?php
if (!isset($_REQUEST['email']) || !isset($_REQUEST['token'])) {
    header('location: ' . BASE_URL);
    exit;
}

$var = 1;

// Check if the token is correct and matches with the database.
$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=? AND cust_token=?");
$statement->execute(array($_REQUEST['email'], $_REQUEST['token']));
$result = $statement->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    // Token does not match, redirect to the homepage.
    header('location: ' . BASE_URL);
    exit;
}

// Everything is correct, now activate the user by removing the token value from the database.
$statement = $pdo->prepare("UPDATE tbl_customer SET cust_token=?, cust_status=? WHERE cust_email=?");
$statement->execute(array('', 1, $_GET['email']));

$success_message = '<p style="color:green;">You can now login to our website.</p><p><a href="' . BASE_URL . 'login.php" style="color:#167ac6;font-weight:bold;">Click here to login</a></p>';
?>

<div class="page-banner" style="background-color:#444;">
    <div class="inner">
        <h1>Registration Successful</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">
                    <?php
                    echo $error_message;
                    echo $success_message;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>