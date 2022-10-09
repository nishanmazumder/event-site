<?php

/*
|--------------------------------------------------------------------------
| Initialization
|--------------------------------------------------------------------------
|
| Load all configuration, global var, class, models
|
*/

if (file_exists(__DIR__ . "/../../../app/init.php")) {
    require_once __DIR__ . "/../../../app/init.php";
} else {
    echo "Initialization not found " . basename(__FILE__);
}


/*
|--------------------------------------------------------------------------
| Header
|--------------------------------------------------------------------------
|
| @package event-site
|
*/
?>

<!doctype html>
<html lang="en">

<head>
    <?php include DIR . '/resources/scripts/meta.php'; ?>
    <?php include DIR . '/resources/scripts/css.php'; ?>
    <?php include DIR . '/resources/scripts/style.php'; ?>
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
                    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>

                        <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>admin/<?php echo $data['nm_logo']; ?>" alt="Logo" class="nm-logo" /></a>
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
                            <a class="nav-link" href="<?php echo BASE_URL; ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmAbout">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmEvents">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmTickets">Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmFaq">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmJoin">Join</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>#nmContact">Contact</a>
                        </li>
                    </ul>

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
                                <?php if (!empty($userName)) { ?>
                                    <li><a href="<?php echo BASE_URL . 'public/web/profile.php'; ?>" class="nm-transparent"><i class="nm-icon" style="font-size: 16px;">Hi <?php echo $userName; ?> </i></a></li>
                                <?php } else {
                                ?>
                                    <li><a href="<?php echo BASE_URL . 'public/web/login.php'; ?>" class="nm-transparent nm-btn nm-btn-color-block" style="padding: 4px 10px">Upload</a></li>
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