<?php
if (!empty($_GET['tid'] && !empty($_GET['product']) && !empty($_GET['cname']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $tid = $GET['tid'];
    $customer = $_GET['cname'];
    $product = $GET['product'];
} else {
    header('Location: index.php');
}
?>

<?php include 'inc/header.php'; ?>

<div class="container">
    <div class="row justify-content-center nm-checkout">
        <div class="col-md-6 nm-success">
            <h1>Transection Info</h1>
            <h3>Thank you for purchasing <?php echo $product; ?></h3>
            <p>Customer Name : <span class="nm-text-pink"><?php echo $customer; ?></span></p>
            <p>Transaction ID : <span class="nm-text-pink"><?php echo $tid; ?></span></p>
            <p>Check your email for more info</p>
            <p><a href="index.php" class="nm-btn nm-btn-color">Go Back</a></p>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>