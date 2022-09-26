<?php
/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/
if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Load all essential classes...
|
*/
use App\Model\Session;
use App\Model\Database;
use App\Model\Format;
use App\Model\UserLogin;
Session::init();
$db = new Database();
$fm = new Format();

if (!isset($_SESSION['user_id'])) {
     //header('Location: index.php');
    echo "<script>window.location='index.php';</script>";
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $login = new UserLogin();
    $login->user_logout();
}

// $userId = $_SESSION['user_id'];
$userId = Session::get('user_id');
$userName = Session::get('user_name');
$userRole = Session::get('user_role');
?>


<!doctype html>
<html lang="en">
    <head>
        <!--META-->
        <?php include("scripts/meta.php"); ?>
        <!--CSS-->
        <?php include("scripts/css.php"); ?>

    </head>

    <body>
        <!--Header section start-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" /></a>
                <img class="nm_sm_small nm_notification" src="img/icon1.png" alt="" />
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown nm_display_none_mob">
                            <a class="nav-link dropdown-toggle nm_spc_border_both" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo "Hello" . " " .$userName; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Activity log</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Swich user</a>
                                <a class="dropdown-item" href="inc/header.php?action=logout">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item nm_display_none_mob nm_notification_li">

                            <?php
                            $query = "SELECT id FROM nm_contact WHERE status = 0";
                            $result = $db->select($query);
                            ?>

                            <a class="nav-link" href="mail-list.php">
                                <i class="fa fa-bell fa-2x text-warning"></i>
                                <span class="badge badge-warning align-top">
                                    <?php
                                    if ($result) {
                                        $newMail = mysqli_num_rows($result);
                                        echo $newMail;
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </span>
                            </a>

                        </li>
                        <li class="nav-item nm_display_hide">
                            <a class="nav-link" href="#"><img src="img/menuicon1.png" alt="" /><span class="nm_menu_item">Dashboard</span></a>
                        </li>
                        <li class="nav-item nm_display_hide">
                            <a class="nav-link" href="#"><img src="img/menuicon2.png" alt="" /><span class="nm_menu_item nm_mar_left_68">New Lead</span></a>
                        </li>
                        <li class="nav-item nm_display_hide">
                            <a class="nav-link" href="#"><img src="img/menuicon3.png" alt="" /><span class="nm_menu_item">Lead</span></a>
                        </li>
                        <li class="nav-item nm_display_hide">
                            <a class="nav-link" href="#"><img src="img/menuicon4.png" alt="" /><span class="nm_menu_item">Settings</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="nm_menu_item nm_mar_left_70">Activity log</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="nm_menu_item nm_mar_left_70">Settings</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="nm_menu_item nm_mar_left_70">Swich user</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span class="nm_menu_item nm_mar_left_70">Logout</span></a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 nm_display_none_mob nm_notification_li">
                        <input class="form-control mr-sm-2 nm_search nm_src_bg" type="search" placeholder="" aria-label="Search">
                    </form>
                </div>
            </nav>
        </header>
        <!--Header section end-->