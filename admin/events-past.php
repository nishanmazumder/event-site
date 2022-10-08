<!--Header section start-->
<?php include("inc/header.php"); ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include("inc/navigation.php"); ?>
<!--Left navigation-->


<!--Main section start-->
<div class="col-lg-10 col-md-10 col-sm-10 nm_content_bg">
    <nav aria-label="breadcrumb nm-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav>
    <!--Content main area-->
    <div class="nm_main_content_area">
        <div class="nm_main_content">
            <!--Content-->
            <input class="nm-search-table" type="text" id="nmSearchInput" onkeyup="tableSearch()" placeholder="Search Item">
            <table class="table table-fixed" id="myTable">
                <!--Table head-->
                <thead class="header nm_mamin_tbl_hdr" id="header">
                    <tr class="sticky-row">
                        <th scope="col">Sl.</th>
                        <th scope="col">Author</th>
                        <th scope="col">Auth. Image</th>
                        <th scope="col">Ev. Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="nm_tbl_body scrollable-area">
                    <?php
                    $per_page_post = 10;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_page = ($page - 1) * $per_page_post;

                    $query = "SELECT * FROM nm_event_up WHERE status = '0' ORDER BY eve_time DESC LIMIT $start_page, $per_page_post";
                    $result = $db->select($query);
                    $i = 1;
                    if ($result) {
                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr class = "nm_deep">
                                <th scope = "row"><?php echo $i++ ?></th>
                                <td><?php echo $data['host_name']; ?></td>
                                <td><img src="<?php echo $data['host_img']; ?>" alt=""></td>
                                <td><?php echo $fm->textLimit($data['title'], 30); ?></td>
                                <td><img src="<?php echo $data['eve_img']; ?>" alt=""></td>
                                <td>
                                    <?php echo $fm->dateFormat($data['eve_time']); ?> <span><?php echo $fm->timeFormat($data['eve_time']); ?></span>
                                </td>
                                <td><?php echo $data['location']; ?></td>
                                <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "Data not found";
                    }
                    ?>
                </tbody>
            </table>
            <!--Content-->
        </div>
    </div>

    <?php

    $p_query = "SELECT * FROM nm_event_up WHERE status = '0' ORDER BY eve_time DESC";
    $q_result = $db->select($p_query);
    $total_rows = $q_result->rowCount();
    $total_pages = ceil($total_rows / $per_page_post);

    if ($total_rows <= $per_page_post) {
        ?>
        <span class="text-center" style="display: block; margin: 0px auto;">No more data</span>
    <?php } else { ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="events-past.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="events-past.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="events-past.php?page=<?php echo $total_pages; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php } ?>
    <!---pagination--->

</div><!-----end------>

</div>
</div>
</section>
<!--Main section end-->

<div class="clearfix"></div>

<!--Footer section strat-->
<?php include("inc/footer.php"); ?>