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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
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

                    $query = "SELECT * FROM nm_contact WHERE status = 2 ORDER BY id DESC LIMIT $start_page, $per_page_post";
                    $result = $db->select($query);
                    $i = 1;

                    if ($result) {
                        while ($data = $result->fetch_assoc()) {
                            ?>
                            <tr class="">
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $fm->textLimit($data['msg'], 50); ?></td>
                                <td><a href="mail-replay.php?mailid=<?php echo $data['id']; ?>">Replay</a> || <a href="#">Delete</a></td>
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

    <!---pagination--->
    <?php
    $p_query = "SELECT * FROM nm_contact WHERE status = 2 ORDER BY id DESC";
    $q_result = $db->select($p_query);
    $total_rows = mysqli_num_rows($q_result);
    $total_pages = ceil($total_rows / $per_page_post);

    if ($total_rows <= $per_page_post) {
        ?>
        <span class="text-center" style="display: block; margin: 0px auto;">No more data</span>
    <?php } else { ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="mail-draft.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="mail-draft.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="mail-draft.php?page=<?php echo $total_pages; ?>" aria-label="Next">
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