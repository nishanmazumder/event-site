<?php include 'inc/header.php'; ?>

<div class="container nm-section-single nm-checkout">
    <div class="row no-gutters align-items-center">
        <div class="col-md-6 text-center">
            <h1>Thanks for contribution.</h1>
            <h3>You may check other payment method</h3>
            <img src="img/pay3.png" style="width: 75%;" alt="" />
        </div>
        <div class="col-md-6 nm-check-form-section">
            <?php
            if (isset($_GET['eveId'])) {
                $eveId = $_GET['eveId'];
                
                $query = "SELECT title, eve_price FROM nm_event_up WHERE id = '$eveId'";
                $result = $db->select($query);
            } elseif (isset($_GET['planId'])) {
                $planId = $_GET['planId'];
                
                $query = "SELECT plan_title, plan_price FROM nm_eve_plan WHERE id = '$planId'";
                $result = $db->select($query);
            }

            //$query = "SELECT nm_event_up.title, nm_event_up.eve_price, nm_eve_plan.plan_title, nm_eve_plan.plan_price FROM nm_event_up, nm_eve_plan WHERE nm_event_up.id = '$eveId' OR nm_eve_plan.id = '$planId'";
            //$result = $db->select($query);

            if ($result) {
                foreach ($result as $data) {
                    ?>

                    <div class="nm-check-form">
                        <h3 class="text-center mb-3">Pay Safe</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Item</th>
                                    <td>=></td>
                                    <td><?php
                                        if (isset($_GET['eveId'])) {
                                            $title = $data['title'];
                                        } elseif (isset($_GET['planId'])) {
                                            $title = $data['plan_title'];
                                        }
                                        echo $title;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Payment</th>
                                    <td>=></td>
                                    <td>$<?php
                                        if (isset($_GET['eveId'])) {
                                            $eveprice = $data['eve_price'] / 100;
                                        } elseif (isset($_GET['planId'])) {
                                            $eveprice = $data['plan_price'] / 100;
                                        }
                                        echo $eveprice;
                                        ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <form action="payment/charge.php" method="post" id="payment-form">
                            <input type="hidden" id="" name="eve_price" value="<?php echo $eveprice * 100; ?>">
                            <input type="hidden" id="" name="eve_title" value="<?php echo $title; ?>">
                            <div class="form-row no-gutters">
                                <div class="col-md-6 nm-p-0">
                                    <input type="text" name="first_name" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="First Name">
                                </div>
                                <div class="col-md-6 nm-p-0">
                                    <input type="text" name="last_name" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="Last Name">
                                </div>
                                <input type="email" name="email" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="Email">
                                <input type="text" name="phone" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="Phone">
                                <input type="text" name="address" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="Address">
                                <input type="number" name="ticket" min="1" class="form-control mb-3 nm-input StripeElement StripeElement--empty" placeholder="Ticket Quantity">
                                <div id="card-element" class="form-control">
                                    <!-- a Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="nm-btn nm-btn-default-bg">Submit Payment</button>
                        </form>
                    </div>

        <?php
    }
} else {
    echo "Data Not Found";
}
?>

        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>