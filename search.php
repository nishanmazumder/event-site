<?php include 'inc/header.php'; ?>

<div id="nmCategory" class="container-fluid nm-section-category nm-category">
    <div class="row no-gutters">
        <!---Content Area--->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 nm-single-inner">

            <?php
            if (isset($_GET['nm_search'])) {
                $search = $_GET['nm_search'];
            }
            ?>

            <!-- Search form -->
            <form action="search.php" method="post">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <input name="nm_search" type="search" placeholder="Search Events..." aria-describedby="button-addon1" class="form-control border-0 bg-light">
                        <div class="input-group-append">
                            <button name="nm_search_btn" id="button-addon1" type="submit" class="btn btn-link nm-text-pink"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            $per_page_post = 6;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $start_page = ($page - 1) * $per_page_post;

            $query = "SELECT nm_event_up.*, nm_eve_category.category, nm_eve_category.cat_id "
                    . "FROM nm_event_up, nm_eve_category "
                    . "WHERE nm_event_up.title LIKE '%$search%'"
                    . "AND nm_event_up.eve_category = nm_eve_category.cat_id LIMIT $start_page, $per_page_post";
            $result = $db->select($query);

            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="row no-gutters align-items-center nm-upcoming-eve">
                    <div class="col-3 nm-eve-img" style="background-image: url('admin/<?php echo $data['eve_img']; ?>');"></div>
                    <div class="col-6 nm-eve-details">
                        <div class="nm-eve-title">
                            <h2><?php echo $data['title']; ?></h2>
                        </div>
                        <div class="nm-eve-time">
                            <?php echo $fm->dateFormat($data['eve_time']); ?> <span><?php echo $fm->timeFormat($data['eve_time']); ?></span>
                        </div>
                        <div class="nm-single-eve-category">
                            <i class="fas fa-stream"></i>
                            <a href="category.php?categoryId=<?php echo $data['cat_id']; ?>"><?php echo $data['category']; ?></a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="nm-eve-hoster">
                            <img src="admin/<?php echo $data['host_img']; ?>" alt="" />
                            <ul>
                                <li class="nm-text-light">Organized by:</li>
                                <li class="nm-text-pink"><?php echo $data['host_name']; ?></li>
                            </ul>
                            <div class="clearfix"></div>
                            <a href="single.php?eventId=<?php echo $data['id']; ?>" class="nm-btn nm-btn-color-block">View Details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!---pagination--->
            <?php
            $p_query = "SELECT nm_event_up.*, nm_eve_category.category, nm_eve_category.cat_id "
                    . "FROM nm_event_up, nm_eve_category "
                    . "WHERE nm_event_up.title LIKE '%$search%'"
                    . "AND nm_event_up.eve_category = nm_eve_category.cat_id";
            $q_result = $db->select($p_query);
            $total_rows = mysqli_num_rows($q_result);
            $total_pages = ceil($total_rows / $per_page_post);
            if ($total_rows <= $per_page_post) {
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="http://localhost/events/" aria-label="">
                                <span aria-hidden="true">No more events. Back to Home</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } else { ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="search.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="search.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="search.php?page=<?php echo $total_pages; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>
            <!---pagination--->

        </div>
        <!---Content Area--->

        <!-- Sidebar Start -->
        <?php include 'inc/sidebar.php'; ?>
        <!-- Sidebar End -->

    </div>
</div>

<?php include 'inc/footer.php'; ?>