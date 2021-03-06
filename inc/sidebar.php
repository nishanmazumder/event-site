<!-- Sidebar Start -->
<div class="col-lg-3 col-md3 col-sm-12 col-xs-12 nm-sidebar">

    <div class="row no-gutters nm-sidebar-block wow slideInRight">
        <div class="col-md-12"> 
            <div class="nm-advert">
                <img src="img/ad1.png" style="width: 100%;" alt="" />
            </div>
        </div>
    </div>

    <div class="row no-gutters nm-sidebar-block wow slideInRight">
        <div class="col-md-12">
            <div class="nm-sidebar-title">
                <h3>Most Sell</h3>
                <div class="nm-line-sidebar"></div>
            </div>
        </div>

        <?php
        $sql_sell = "SELECT id, eve_img FROM nm_event_up ORDER BY id DESC LIMIT 6";
        $result_sell = $db->select($sql_sell);

        if ($result_sell) {
            while ($data = $result_sell->fetch_assoc()) {
                ?>
        <div class="col-md-6"> 
            <a href="../events/single.php?eventId=<?php echo $data['id']; ?>">
                <div class="nm-mostsell-event" style="background-image: url('./admin/<?php echo $data['eve_img']; ?>');"></div>
            </a>
        </div>
                
                <?php
            }
        } else {
            echo 'Events Not Found';
        }
        ?>

    </div>

    <div class="row no-gutters nm-sidebar-block wow slideInRight">
        <div class="col-md-12">
            <div class="nm-sidebar-category">
                <div class="nm-sidebar-title">
                    <h3>More Events</h3>
                    <div class="nm-line-sidebar"></div>
                </div>
                <ul>
                    <?php
                    $sql = "SELECT id, title FROM nm_event_up ORDER BY id DESC LIMIT 5";
                    $result_eve = $db->select($sql);

                    if ($result_eve) {
                        while ($data = $result_eve->fetch_assoc()) {
                            ?>
                            <li><a href="../events/single.php?eventId=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a></li>
                            <?php
                        }
                    } else {
                        echo 'Events Not Found';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="row no-gutters nm-sidebar-block wow slideInRight">
        <div class="col-md-12">
            <div class="nm-sidebar-category">
                <div class="nm-sidebar-title">
                    <h3>Category</h3>
                    <div class="nm-line-sidebar"></div>
                </div>
                <ul>
                    <?php
                    $query = "SELECT * FROM nm_eve_category LIMIT 5";
                    $result_cat = $db->select($query);

                    if ($result_cat) {
                        while ($data = $result_cat->fetch_assoc()) {
                            ?>

                            <li><a href="../events/category.php?categoryId=<?php echo $data['cat_id']; ?>"><?php echo $data['category']; ?></a></li>

                            <?php
                        }
                    } else {
                        echo 'Category Not Found';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>


</div>
<!-- Sidebar End -->