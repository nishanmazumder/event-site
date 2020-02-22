<div id="nmTickets" class="container-fluid nm-section nm-tickets nm-bg">
    <div class="row no-gutters nm-ticket-list">
        <div class="col-12 wow fadeInDown">
            <div class="nm-title">
                <h1 class="nm-text-light-more">Tickets</h1>
                <div class="nm-line-middle"></div>
            </div>
        </div>

        <?php
        $query = "SELECT * FROM nm_eve_plan";
        $result = $db->select($query);

        if ($result) {
            while ($data = $result->fetch_assoc()) {
                ?>

                <div class="col-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 wow bounceIn">
                   
                        <div class="nm-eve-price">
                            <h3><?php echo $data['plan_title']; ?></h3>
                            <h1>$<?php echo $data['plan_price']/100; ?>/<span>m</span></h1>
                            <ul>
                                <?php
                                $item = explode(',', $data['plan_item']);

                                foreach ($item as $value) {
                                    ?>
                                    <li><?php echo $value; ?></li>
                                <?php } ?>

                            </ul>
                            <a href="../events/checkout.php?planId=<?php echo $data['id']; ?>" class="nm-btn">Buy Now</a>
                        </div> 
                    
                </div>

                <?php
            }
        }
        ?>

    </div>
</div>
<!-- Ticket End -->


