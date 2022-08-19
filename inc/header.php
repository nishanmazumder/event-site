<?php
require_once 'vendor/autoload.php';
Session::init();
$db = new Database();
$fm = new Format();

$userName = Session::get('user');
$userId = Session::get('userId');
$userRole = Session::get('userRole');
?>

<!doctype html>
<html lang="en">
    <head>
        <?php include 'scripts/meta.php'; ?>
        <?php include 'scripts/css.php'; ?>
        <?php include 'scripts/style.php'; ?>
        <title><?php echo TITLE; ?></title>
    </head>

    <body>
        <!-- Header Start -->
        <header>
            <!--Navigation-->
            <div class="container-fluid nm-navigation">

                <nav id="NmNavigation" class="navbar fixed-top navbar-expand-lg nm-nav nm-bg">
                    <?php
                    $query = "SELECT nm_logo FROM nm_general WHERE id = 1";
                    $result = $db->select($query);

                    if ($result) {
                        while ($data = $result->fetch_assoc()) {
                            ?>

                            <a class="navbar-brand" href="<?php echo $base_url;?>"><img src="admin/<?php echo $data['nm_logo']; ?>" alt="Logo" class="nm-logo"/></a>
                            <?php
                        }
                    }
                    ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto nm-nav-item">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $base_url;?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmAbout">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmEvents">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmTickets">Tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmFaq">Faq</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmJoin">Join</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $base_url;?>#nmContact">Contact</a>
                            </li>
                        </ul>

                        <ul class="nm-header-icon">
                            <?php
                            $query_social = "SELECT * FROM nm_social WHERE id = 1";
                            $result_social = $db->select($query_social);

                            if ($result_social) {
                                while ($data_social = $result_social->fetch_assoc()) {
                                    ?>
                                    <li><a href="<?php echo $data_social['nm_face']; ?>" class="nm-transparent"><i class="fab fa-facebook-f nm-icon"></i></a></li>
                                    <li><a href="<?php echo $data_social['nm_twt']; ?>" class="nm-transparent"><i class="fab fa-twitter nm-icon"></i></a></li>
                                    <li><a href="<?php echo $data_social['nm_gog']; ?>" class="nm-transparent"><i class="fab fa-google-plus-g nm-icon"></i></a></li>
                                    <?php if (!empty($userName)) { ?>
                                        <li><a href="profile.php" class="nm-transparent"><i class="nm-icon" style="font-size: 16px;">Hi <?php echo $userName; ?> </i></a></li>
                                    <?php } else {
                                        ?>
                                        <li><a href="login.php" class="nm-transparent nm-btn nm-btn-color-block" style="padding: 4px 10px">Upload</a></li>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo '<span class="text-danger">Opps Something wrong !</span>';
                                }
                                ?>

                        </ul>
                    </div>
                </nav>
            </div>
            <!--Navigation autoplay-->
        </header>
        <!-- Header End -->
