<?php include 'inc/header.php'; ?>
<!-- Single Events Start -->
<?php
if (isset($_GET['eventId'])) {
    $eventId = $_GET['eventId'];

    $sql = "SELECT nm_event_up.*, nm_eve_category.cat_id, nm_eve_category.category FROM nm_event_up INNER JOIN nm_eve_category ON nm_event_up.eve_category = nm_eve_category.cat_id AND nm_event_up.id = '$eventId'";
    $result = $db->insert($sql);

    if ($result) {
        foreach ($result as $data) {
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="nm-hero-img" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('./admin/<?php echo $data['eve_img']; ?>');">
                        <div class="nm-hero-text wow fadeIn">
                            <h1 class=""><?php echo $data['title']; ?></h1>
                            <h3><?php echo $data['subtitle']; ?></h3>
                        </div> 
                    </div>
                </div>
            </div>

            <div id="nmSingle" class="container-fluid nm-section-single nm-single">
                <div class="row no-gutters">

                    <!---Content Area--->
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 nm-single-inner">

                        <div class="row no-gutters">
                            <div class="nm-single-block-ticket wow bounceIn">
                                <div class="single-block">
                                    <h3 class="single-block-title">
                                        Start 
                                    </h3>
                                    <span class="single-block-data"><?php echo $fm->timeFormatDay($data['eve_time']); ?></span>
                                </div>
                                <div class="single-block">
                                    <h3 class="single-block-title">
                                        Duration
                                    </h3>

                                    <span class="single-block-data"><?php echo $data['eve_dur']; ?> days</span>

                                </div>
                                <div class="single-block">
                                    <h3 class="single-block-title">
                                        Activity
                                    </h3>
                                    <div class="single-block-data">
                                        <ul>
                                            <li><a href="https://www.bdsoftcreation.com/"><i class="fab fa-facebook-square"></i></a></li>
                                            <li><a href="https://www.bdsoftcreation.com/"><i class="fab fa-twitter-square"></i></a></li>
                                            <li><a href="https://www.bdsoftcreation.com/"><i class="fab fa-youtube-square"></i></a></li>
                                            <li><a href="https://www.bdsoftcreation.com/"><i class="fab fa-google-plus-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-block">
                                    <h3 class="single-block-title">
                                        $<?php
                                        $eveprice = $data['eve_price'] / 100;
                                        echo $eveprice;
                                        ?>/<span class="nm-single-ticket-txt">ticket</span>
                                    </h3>
                                    <div class="single-block-btn">
                                        <a href="checkout.php?eveId=<?php echo $data['id']; ?>" class="nm-btn">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row no-gutters align-items-center nm-single-info wow slideInLeft">
                            <div class="col-md-3">
                                <div class="nm-eve-hoster">
                                    <img src="admin/<?php echo $data['host_img']; ?>" alt="Event Organizer Image" />
                                    <ul>
                                        <li>Organized by:</li>
                                        <li><?php echo $data['host_name']; ?></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="nm-eve-location">
                                    <i class="fas fa-eye"></i>
                                    <span>Enrolled:</span>
                                    <span>
                                        <?php
                                        $eveTitle = $data['title'];
                                        $enroll_query = "SELECT product, SUM(ticket) AS all_ticket FROM transactions WHERE product = '$eveTitle'";
                                        $en_result = $db->select($enroll_query);

                                        $ticket = 0;
                                        while ($allTicket = mysqli_fetch_assoc($en_result)) {
                                            $value = $allTicket['all_ticket'];
                                            $ticket += $value;
                                        }
                                        echo $ticket;
                                        ?>
                                    </span>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="nm-eve-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo $data['location']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="nm-single-eve-category">
                                    <i class="fas fa-stream"></i>
                                    <a href="category.php?categoryId=<?php echo $data['cat_id']; ?>"><?php echo $data['category']; ?></a>
                                </div>
                            </div> 
                        </div>

                        <div class="row no-gutters align-items-center wow slideInLeft">
                            <div class="col-md-12 nm-single-block-description">
                                <p>
                                    <?php echo $data['eve_des']; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row no-gutters align-items-center nm-single-block-gallery wow slideInLeft">
                            <div class="col-md-12">
                                <h3>Gallery</h3>
                                <div class="nm-line-des"></div>
                            </div>
                            <div class="col-md-12">
                                <ul id="nmSingleEvents" class="nm-eve-slider">

                                    <?php
                                    $query_gal = "SELECT nm_event_up.id, nm_event_up.title, nm_event_up.token, nm_event_rec.token, nm_event_rec.eve_img_gal FROM nm_event_up, nm_event_rec WHERE nm_event_up.token = nm_event_rec.token AND nm_event_up.id = '$eventId'";
                                    $result_gal = $db->select($query_gal);

                                    while ($data_gal = mysqli_fetch_assoc($result_gal)) {
                                        ?>
                                        <li data-thumb="admin/<?php echo $data_gal['eve_img_gal']; ?>" data-src="admin/<?php echo $data_gal['eve_img_gal']; ?>">
                                            <img class="nm-single-main-img" src="admin/<?php echo $data_gal['eve_img_gal']; ?>" />
                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="row no-gutters nm-single-loc wow fadeIn">
                            <div class="col-md-12">
                                <h3>Location</h3>
                                <div class="nm-line-des"></div>
                            </div>
                            <div class="col-md-12 wow fadeIn">
                                <?php
                                $iframe = str_replace(array('600', '450'), array('100%', '250'), $data['map_loc']);
                                echo $iframe;
                                ?> 
                            </div>
                        </div>


                    </div>

                    <?php
                }
            }
        }
        ?>
        <!---Content Area--->

        <!-- Sidebar Start -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- Sidebar End -->

    </div>
</div>

<!-- Events End -->

<?php include 'inc/faq.php'; ?>
<?php include 'inc/footer.php'; ?>