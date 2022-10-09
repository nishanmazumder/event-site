<?php
/*
|--------------------------------------------------------------------------
| Banner Section
|--------------------------------------------------------------------------
|
| @package event-site
|
*/
?>


<!--Banner-->
<div id="nmHome" class="nm-banner">

    <?php
    $query = "SELECT * FROM nm_event_up WHERE status = 1 order by str_to_date(`eve_time`, '%Y-%m-%d') ASC limit 1";
    $result = $db->select($query);

    if ($result) {
        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
            $eve_date = explode(' ', $data['eve_time']);
            $eve_current_date = explode(' ', date("Y-m-d h:i:sa"));

            if ($eve_date[0] == $eve_current_date[0]) {
                $past_eve_query = "UPDATE nm_event_up SET status = '0' WHERE status = '1' order by str_to_date(`eve_time`, '%Y-%m-%d') ASC limit 1";
                $pass_events = $db->update($past_eve_query);
            } else { ?>

                <?php
                $query_video = "SELECT nm_header_video FROM nm_general WHERE id = 1";
                $result_video = $db->select($query_video);
                if ($result_video) {
                    while ($data_v = $result_video->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="overlay"></div>
                        <video playsinline="playsinline" muted="muted" loop="loop" autoplay>
                            <source src="admin/<?php echo $data_v['nm_header_video']; ?>" type="video/mp4">
                        </video>
                <?php
                    }
                }
                ?>
                <div class="container-fluid nm-header-content h-100 wow bounceIn">
                    <div class="d-flex h-100 text-center align-items-center">
                        <div class="w-100 text-white nm-events-count">
                            <h1 class="display-3"><?php echo $fm->textLimit($data['title'], 50); ?></h1>
                            <p><?php echo $fm->textLimit($data['subtitle'], 50); ?></p>
                            <div class="flipper" data-reverse="true" data-datetime="<?php echo $data['eve_time']; ?>" data-template="ddd|HH|ii|ss" data-labels="Days|Hours|Minutes|Seconds" id="myFlipper"></div>
                            <a href="single.php?eventId=<?php echo $data['id']; ?>" class="nm-btn nm-btn-default">Buy Now</a>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>

</div>
<!-- Banner End -->