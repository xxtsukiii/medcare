<?php
// Initialize your session and database connection
ob_start();
session_start();
include("../../admin/inc/config.php");
include("../../admin/inc/functions.php");

// Check if the payment method is COD
if ($_POST['payment_method'] == 'COD') {
    // Process the COD payment
    $payment_date = date('Y-m-d H:i:s');
    $payment_id = time();

    // Insert the payment information into the database
    $statement = $pdo->prepare("INSERT INTO tbl_payment (   
                                customer_id,
                                customer_name,
                                customer_email,
                                payment_date,
                                txnid, 
                                paid_amount,
                                card_number,
                                card_cvv,
                                card_month,
                                card_year,
                                bank_transaction_info,
                                payment_method,
                                payment_status,
                                shipping_status,
                                -- payment_id
                            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $statement->execute(array(
        $_SESSION['customer']['cust_id'],
        $_SESSION['customer']['cust_name'],
        $_SESSION['customer']['cust_email'],
        $payment_date,
        '',
        $_POST['amount'],
        '',
        '',
        '',
        '',
        'COD Payment',
        'Success', // Assuming the COD payment is always successful
        'Pending', // Set shipping status as pending, you can adjust as needed
        // $payment_id
    ));

    // Clear the shopping cart or perform other necessary actions
    // ...

    // Redirect to success page
    header('location: ../../payment_success.php');
} else {
    // Redirect to an error page or handle other payment methods
    header('location: ../../error_page.php');
}

?>