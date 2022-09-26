<?php // session_start(); ?>

<!--Header section start-->
<?php include __DIR__."/inc/header.php"; ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include __DIR__."/inc/navigation.php"; ?>
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
            <h1>Welcome <?php echo $userName; //echo $_SESSION['user_name'];?></h1>
            <!--Content-->
        </div>
    </div>
</div><!-----end------>

</div>
</div>
</section>
<!--Main section end-->

<div class="clearfix"></div>

<!--Footer section strat-->
<?php include __DIR__."/inc/footer.php"; ?>