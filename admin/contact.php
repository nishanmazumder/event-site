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
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input name="nm_location" type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input name="nm_phone" type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="nm_mail" type="email" class="form-control" id="" placeholder="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 no-gutters">
                        <label for="" class="col-sm-12 col-form-label">Map Link</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="nm_map_link" id="summernote" cols="" rows=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button name="nm_submit" type="submit" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </form>
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
<?php include("inc/footer.php"); ?>