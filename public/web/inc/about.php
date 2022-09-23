<?php
if (file_exists(__DIR__ . "/../../../vendor/autoload.php")) {
	require_once __DIR__ . "/../../../vendor/autoload.php";
} else {
	echo "Autoloader not found! - about.php";
}
use App\Model\Database;
use App\Model\Format;
$db = new Database();
$fm = new Format();

?>

<!-- Content Start -->
<main>
    <!-- About Us Start -->
    <?php
        $query = "SELECT * FROM nm_about";
        $result = $db->select($query);

        if($result){
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
    ?>


    <div id="nmAbout" class="container-fluid nm-section nm-about">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow slideInLeft">
                <div class="nm-about-img-border">
                    <div class="nm-about-img" style="background-image: url('admin/<?php echo $data['image'];?>');">
                        <button type="button" class="" data-toggle="modal" data-target="#nmAboutVideo">
                            <i class="fas fa-play-circle nm-icon"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nmAboutVideo" tabindex="-1" role="dialog" aria-labelledby="nmAboutVideotitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="nm-contact-form-close">&times;</span>
                            </button>
                            <video playsinline="playsinline" muted="muted" loop="loop" controls>
                                <source src="admin/<?php echo $data['about_video'];?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow slideInRight">
                <div class="nm-about-details text-center nm-bg">
                    <h1 class="nm-text-pink"><?php echo $data['title'];?></h1>
                    <span class="nm-text-dark"><?php echo $data['sub_title'];?></span>
                    <p class="nm-text-dark"><?php echo $data['description'];?></p>
                    <a href="#" class="nm-btn nm-btn-default nm-btn-color">More details</a>
                </div>
            </div>
        </div>
    </div>
    <?php }}else{
        echo "no data found about";
    }?>
    <!-- About Us End -->