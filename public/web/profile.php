<?php
/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
|
| @package event-site
|
*/

// Header

if (file_exists(__DIR__ . "/inc/header.php")) {
    include __DIR__ . "/inc/header.php";
} else {
    echo "Header not found " . basename(__FILE__);
}
?>

<div class="container nm-section nm-profile">
    <div class="row nm-profile-details">
        <div class="col-md-12 nm-profile-header">
            <img src="img/prf1.png" alt="" />
            <h3 class="text-center">Hello <?php echo $userName; ?>!</h3>
            <div class="nm-line-middle"></div>
        </div>

        <div class="col-md-3 nm-profile-block">
            <div class="nav flex-column nav-pills" id="nm-user-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="nm-user-events-tab" data-toggle="pill" href="#nm-user-events" role="tab" aria-controls="nm-user-events" aria-selected="false">Your Events</a>
                <a class="nav-link" id="nm-user-trans-tab" data-toggle="pill" href="#nm-user-trans" role="tab" aria-controls="nm-user-trans" aria-selected="false">Your Transection</a>
                <a class="nav-link" id="nm-user-profile-tab" data-toggle="pill" href="#nm-user-profile" role="tab" aria-controls="nm-user-profile" aria-selected="true">Your Profile</a>
            </div>
        </div>
        <div class="col-md-9 nm-profile-block">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="nm-user-events" role="tabpanel" aria-labelledby="nm-user-events-tab">
                    <a href="#" class="nm-btn nm-btn-color-block float-right"><i class="fas fa-plus"></i>&nbsp;Add Events</a>
                    <div class="nm-clerfix"></div>
                    <table class="table table-fixed" id="myTable">
                        <!--Table head-->
                        <thead class="header nm_mamin_tbl_hdr" id="header">
                            <tr class="sticky-row">
                                <th scope="col">Sl.</th>
                                <th scope="col">Ev. Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Auth. Image</th>
                                <th scope="col">Image</th>
                                <th scope="col">Time</th>
                                <th scope="col">Location</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="nm_tbl_body scrollable-area">
                            <?php
                            if (isset($_GET['id'])) {
                                $eveId = $_GET['id'];

                                $eveDelQuery = "DELETE FROM nm_event_up WHERE id = '$eveId'";
                                $DelResult = $db->delete($eveDelQuery);

                                if ($DelResult) {
                                    echo '<span class="text-success">Events Deleted Successfully !</span>';
                                } else {
                                    echo '<span class="text-success">Problem !</span>';
                                }
                            }
                            ?>

                            <?php
                            $query = "SELECT * FROM nm_event_up WHERE status = '1' ORDER BY eve_time ASC";
                            $result = $db->select($query);
                            $i = 1;

                            if ($result) {
                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <tr class="nm_deep">
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $fm->textLimit($data['title'], 30); ?></td>
                                        <td><?php echo $data['host_name']; ?></td>
                                        <td><img src="admin/<?php echo $data['host_img']; ?>" alt=""></td>
                                        <td><img src="admin/<?php echo $data['eve_img']; ?>" alt=""></td>
                                        <td>
                                            <?php echo $fm->dateFormat($data['eve_time']); ?> <span><?php echo $fm->timeFormat($data['eve_time']); ?></span>
                                        </td>
                                        <td><?php echo $data['location']; ?></td>
                                        <td><a href="<?php BASE_URL; ?>/../../admin/events-update.php?id=<?php echo $data['id']; ?>" class="nm-btn nm-btn-color-block">Edit</a>&nbsp;<a href="?id=<?php echo $data['id']; ?>" class="nm-btn nm-btn-color-block" onclick="confirm('Are u sure want to delete?')">Delete</a></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "Data not found!";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nm-user-trans" role="tabpanel" aria-labelledby="nm-user-trans-tab">
                    <table class="table table-fixed" id="myTable">
                        <!--Table head-->
                        <thead class="header nm_mamin_tbl_hdr" id="header">
                            <tr class="sticky-row">
                                <th scope="col">Sl.</th>
                                <th scope="col">Product</th>
                                <th scope="col">Amount</th>
                                <th scope="col">C. ID</th>
                                <th scope="col">T. ID</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody class="nm_tbl_body scrollable-area">

                            <?php
                            $query = "SELECT customers.*, transactions.* FROM customers INNER JOIN transactions WHERE customers.id = transactions.customer_id ORDER BY transactions.created_at ASC";
                            $result = $db->select($query);
                            $i = 1;
                            if ($result) {
                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                    <tr class="nm_deep">
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $data['product']; ?></td>
                                        <td><?php echo $data['amount']; ?></td>
                                        <td><?php echo $data['customer_id']; ?></td>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['created_at']; ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "Data Not Found!";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nm-user-profile" role="tabpanel" aria-labelledby="nm-user-profile-tab">
                    <form action="" method="post">
                        <table class="table table-fixed" id="myTable">
                            <tbody class="nm_tbl_body scrollable-area">
                                <tr>
                                    <td>Your Name: Md Rashidul Azam</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Your Mail: arosh019@gmail.com</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Your Phone: +881910035835</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Your Address: 75, Sahalibag, Mirpur 1</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><a href="#">Change Details</a> || <a href="#">Change Password</a></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>">
                                        <button class="nm-btn nm-btn-color-block">Go to Home</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="POST">
                                        <button type="submit" name="nm_customer_logout" class="nm-btn nm-btn-color-block">Logout</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<?php
// Footer

if (file_exists(__DIR__ . "/inc/footer.php")) {
    include __DIR__ . "/inc/footer.php";
} else {
    echo "Footer not found " . basename(__FILE__);
}
?>