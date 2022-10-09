<?php
/*
|--------------------------------------------------------------------------
| Footer
|--------------------------------------------------------------------------
|
| @package event-site
|
*/
?>
<footer>
    <canvas id="canvas"></canvas>
    <div class="container-fluid nm-section">

        <!--  Brand block -->
        <div class="row no-gutters">
            <div class="col-12 wow slideInLeft">
                <ul class="nm-brand">
                    <?php
                    $query = "SELECT * FROM nm_brand ORDER BY id DESC limit 9";
                    $result = $db->select($query);
                    while ($data = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li><img class="nm-m-block" src="<?php echo BASE_URL; ?>admin/<?php echo $data['img']; ?>" alt="" /></li>
                    <?php } ?>
                </ul>
            </div>

            <!--  Mailchim block -->
            <div id="nmJoin" class="col-12  wow slideInRight">
                <div class="nm-mailchimp">
                    <h1 class="nm-text-light-more">Newslatter</h1>
                    <form method="POST" action="helpers/mailchimp-submit.php" class="nm-subscribe">
                        <div class="form-group">
                            <input type="email" name="subscriberMail" class="form-control nm-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Mail">
                        </div>
                        <button type="submit" class="nm-btn float-none nm-btn-color-block">Subscribe</button>
                    </form>
                </div>
            </div>

            <!--  Footer Nav block -->
            <div class="col-12 wow slideInLeft">
                <ul class="nav nm-nav-item">
                    <?php
                    $query_f_nav = "SELECT * FROM nm_page WHERE page_loc = 1 LIMIT 5";
                    $result_f_nav = $db->select($query_f_nav);

                    if ($result_f_nav) {
                        while ($data_f_nav = $result_f_nav->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="page.php?id=<?php echo $data_f_nav['id']; ?>"><?php echo $data_f_nav['page_title']; ?></a>
                            </li>
                    <?php
                        }
                    } else {
                        echo 'No nav item yet';
                    }
                    ?>
                </ul>
            </div>

            <!--  Copyright block -->
            <div class="col-12 text-center wow slideInRight">
                <?php
                $query_copy = "SELECT * FROM nm_eve_copyright WHERE id = 1";
                $result_copy = $db->select($query_copy);

                if ($result_copy) {
                    while ($data_copy = $result_copy->fetch(PDO::FETCH_ASSOC)) {
                ?>

                        <p class="nm-copy-text"><?php echo $data_copy['nm_copy']; ?></p>
                        <!-- <p class="nm-copy-text">All right reserver ©copyright by BDSOFTcr</p> -->

                <?php
                    }
                } else {
                    echo '<span class="text-danger">Opps Something wrong !</span>';
                }
                ?>
            </div>

            <!--  Icon block -->
            <div class="col-12 text-center wow pulse">
                <ul class="nm-header-icon">

                    <?php
                    $query_social = "SELECT * FROM nm_social WHERE id = 1";
                    $result_social = $db->select($query_social);

                    if ($result_social) {
                        while ($data_social = $result_social->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <li><a href="<?php echo $data_social['nm_face']; ?>" class="nm-transparent"><i class="fab fa-facebook-f nm-icon"></i></a></li>
                            <li><a href="<?php echo $data_social['nm_twt']; ?>" class="nm-transparent"><i class="fab fa-twitter nm-icon"></i></a></li>
                            <li><a href="<?php echo $data_social['nm_gog']; ?>" class="nm-transparent"><i class="fab fa-google-plus-g nm-icon"></i></a></li>
                            <li><a href="<?php echo $data_social['nm_ytb']; ?>" class="nm-transparent"><i class="fab fa-youtube nm-icon"></i></a></li>
                    <?php
                        }
                    } else {
                        echo '<span class="text-danger">Opps Something wrong !</span>';
                    }
                    ?>

                </ul>
            </div>

            <!--  B2T block -->
            <div class="col-12 wow fadeInUp">
                <button class="text-center nm-btn nm-btn-color-block nm-back-2-top" onclick="topFunction()" id="NmBak2Top" title="Go to top"><i class="fas fa-arrow-up"></i></button>
            </div>
        </div>
    </div>
</footer>
<!--  Footer End -->

<?php include DIR . '/resources/scripts/js.php'; ?>

</body>

</html>