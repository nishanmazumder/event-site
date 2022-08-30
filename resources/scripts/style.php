<?php

if (file_exists(__DIR__ . "/../../../vendor/autoload.php")) {
	require_once __DIR__ . "/../../../vendor/autoload.php";
} else {
	echo "Autoloader not found!";
}
use App\Model\Database;
use App\Model\Format;
$db = new Database();
$fm = new Format();



$query = "SELECT * FROM nm_eve_color WHERE id = 1";
$result = $db->select($query);

if ($result) {
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>

        <style>
            .nm-bg {
                background: #222222;
            }
            .nm-nav-item li:hover {
                border-bottom: 2px solid  <?php echo $data['eve_color']; ?> !important;
            }
            .nm-nav-item li a {
                color: #e0dddd;
            }
            .nm-nav-item li a:hover {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-icon {
                color: #e0dddd;
            }
            .nm-icon:hover {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-about-img i {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-about-img-border {
                border: 2px solid <?php echo $data['eve_color']; ?> !important;
            }
            #nmAboutVideo .modal-body{
                background: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-text-pink {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-btn:hover{
                color: #fff;
                background:  <?php echo $data['eve_color']; ?> !important;
                border: 1px solid  <?php echo $data['eve_color']; ?> !important;
            }
            .nm-btn-color {
                color: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
                background: transparent !important;
            }
            .nm-btn-color-block{
                background: <?php echo $data['eve_color']; ?> !important;
                color: #fff !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-btn-color-block:hover {
                background: transparent !important;
                color: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-line {
                background: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-line-middle {
                background: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-line-des {
                background: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-line-sidebar {
                background: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-eve-price ul li {
                border-top: 1px solid <?php echo $data['eve_color']; ?>80 !important;
            }
            .nm-eve-time {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-eve-location i {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-eve-hoster ul li:last-child {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-eve-price h3 {
                background: <?php echo $data['eve_color']; ?> !important;
                color: #E0DDDD;
            }
            .nm-eve-price h1 {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-ticket-list .nm-btn:hover {
                color: <?php echo $data['eve_color']; ?> !important;
                background: transparent !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }

            .nm-ticket-list .nm-btn {
                color: #E0DDDD !important;
                background: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-accordion button:hover, .nm-accordion i:hover {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-accordion button, .nm-accordion i {
                color: #fff;
            }
            .nm-contact-details i {
                color: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            footer {
                background-color: #222222;
            }

            /***Sidebar***/
            .nm-sidebar-category ul li a:hover {
                color: <?php echo $data['eve_color']; ?> !important;
            }

            /***Checkout***/
            .nm-check-form {
                background: #ddd9;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-check-form table {
                background: <?php echo $data['eve_color']; ?> !important;
                color: #fff;
            }
            .nm-check-form button {
                background: <?php echo $data['eve_color']; ?> !important;
                color: #fff;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-check-form button:hover {
                background: transparent !important;
                color: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }

            /***Footer***/
            .nm-mailchimp .nm-input::placeholder {
                color: <?php echo $data['eve_color']; ?> !important;
            }

            /***Single***/
            .nm-single-block-ticket {
                background: <?php echo $data['eve_color']; ?> !important;

            }
            .nm-single-eve-category i {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .nm-single-eve-category a {
                color: <?php echo $data['eve_color']; ?> !important;
            }
            .single-block-btn .nm-btn {
                background: #fff !important;
                color: <?php echo $data['eve_color']; ?> !important;
                border: 1px solid #fff !important;
            }

            /***Category***/
            .nm-section-category .page-link{
                color: <?php echo $data['eve_color']; ?> !important;
            }

            /***Profile***/
            .nm-profile-details {
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            .nm-profile-block{
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
            /***Success***/
            .nm-success{
                border: 1px solid <?php echo $data['eve_color']; ?> !important;
            }
        </style>

        <?php
    }
} else {
    echo '<span class="text-success">Opps Something wrong !</span>';
}
?>