<?php
require_once('header.php');

if (!isset($_REQUEST['id']) || !isset($_REQUEST['task'])) {
    header('location: logout.php');
    exit;
} else {
    // Check if the id is valid
    $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: logout.php');
        exit;
    }
}

// Update return_status in tbl_payment
$statement = $pdo->prepare("UPDATE tbl_payment SET return_status=? WHERE id=?");
$statement->execute(array($_REQUEST['task'], $_REQUEST['id']));

// Redirect to order.php
header('location: order.php');
exit; // Make sure to exit after the header redirect
?>
