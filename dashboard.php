<?php require_once('header.php'); ?>

<?php
// Check if the customer is logged in or not
if (!isset($_SESSION['customer'])) {
    header('location: ' . BASE_URL . 'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
    $statement->execute(array($_SESSION['customer']['cust_id'], 0));
    $total = $statement->rowCount();
    if ($total) {
        header('location: ' . BASE_URL . 'logout.php');
        exit;
    }
}

// Retrieve the customer ID from the session
$customer_id = $_SESSION['customer']['cust_id'];

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND customer_id=?");
$statement->execute(array('Pending', $customer_id));
$total_payment_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=? AND customer_id=?");
$statement->execute(array('Pending', $customer_id));
$total_shipping_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE order_status=? AND customer_id=?");
$statement->execute(array('Pending', $customer_id));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE order_status=? AND customer_id=?");
$statement->execute(array('Completed', $customer_id));
$total_order_complete = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE order_status=? AND customer_id=?");
$statement->execute(array('Cancelled', $customer_id));
$total_cancel_order = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE return_status=? AND customer_id=?");
$statement->execute(array('Returned Order', $customer_id));
$total_return_order = $statement->rowCount();


?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php require_once('customer-sidebar.php'); ?>
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <h3 class="text-center">
                        <?php echo LANG_VALUE_90; ?>
                    </h3>
                </div>

                <section class="content">
                    <div class="row">
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <p>To Pay</p>
                                    <h3>
                                        <?php echo $total_payment_pending; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <p>To Ship</p>
                                    <h3>
                                        <?php echo $total_shipping_pending; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <p>To Recieve</p>
                                    <h3>
                                        <?php echo $total_order_pending; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <p>Complete Orders</p>
                                    <h3>
                                        <?php echo $total_order_complete; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <p>Cancelled</p>
                                    <h3>
                                        <?php echo $total_cancel_order; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <p>Return/Refund</p>
                                    <h3>
                                        <?php echo $total_return_order; ?>
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-refresh" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>