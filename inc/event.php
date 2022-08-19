<!-- Events Start -->
<div id="nmEvents" class="container-fluid nm-section nm-events">
    <div class="row no-gutters">

    </div>
    <div class="row no-gutters">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 wow slideInLeft nm-up-events">
            <div class="nm-title-left">
                <h1>Upcoming Events</h1>
                <div class="nm-line"></div>
            </div>


            <?php
            $query = "SELECT * FROM nm_event_up WHERE status = 1 ORDER BY eve_time ASC limit 3";
            $result = $db->select($query);

            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="row no-gutters align-items-center nm-upcoming-eve">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                        <div class="nm-eve-img" style="background-image: url('admin/<?php echo $data['eve_img']; ?>');"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 nm-eve-details">
                        <div class="nm-eve-time">
                            <?php echo $fm->dateFormat($data['eve_time']); ?> <span><?php echo $fm->timeFormat($data['eve_time']); ?></span>
                        </div>
                        <div class="nm-eve-title">
                            <h2><?php echo $data['title']; ?></h2>
                        </div>
                        <div class="nm-eve-location">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo $data['location']; ?></span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                        <div class="nm-eve-hoster">
                            <img src="admin/<?php echo $data['host_img']; ?>" alt="" />
                            <ul>
                                <li class="nm-text-light">Organized by:</li>
                                <li class="nm-text-pink"><?php echo $data['host_name']; ?></li>
                            </ul>
                            <div class="clearfix"></div>
                            <a href="single.php?eventId=<?php echo $data['id']; ?>" class="nm-btn nm-btn-color-block">Join Now</a>
                        </div>
                    </div>
                    
                </div>
            <?php } ?>

            <div class="row no-gutters">
                <div class="col-md-12">
                    <a href="events.php" class="text-left nm-text-pink nm-see-more">See more</a>
                </div>
            </div>                
        </div>

        <!-- Recent Events -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow slideInRight">
            <div class="nm-title-left">
                <h1>Recent Events</h1>
                <div class="nm-line"></div>
            </div>
            <ul id="nmRecentEvents" class="">

                <?php
                $query_gal = "SELECT nm_event_rec.*, nm_event_up.id, nm_event_up.title, nm_event_up.token FROM nm_event_rec, nm_event_up WHERE nm_event_rec.token = nm_event_up.token";
                $result_gal = $db->select($query_gal);

                while ($data_gal = mysqli_fetch_assoc($result_gal)) {
                    ?>

                    <li data-thumb="admin/<?php echo $data_gal['eve_img_gal']; ?>" data-src="admin/<?php echo $data_gal['eve_img_gal']; ?>">
                        <img src="admin/<?php echo $data_gal['eve_img_gal']; ?>" />
                        <a class="nm-eve-slider-title" href="single.php?eventId=<?php echo $data_gal['id']; ?>"><?php echo $data_gal['title']; ?></a>
                    </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- Events End -->