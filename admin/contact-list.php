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
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="nm_tbl_body scrollable-area">
                    <tr class="nm_deep">
                        <th scope="row">1</th>
                        <td>Why?</td>
                        <td>Why?</td>
                        <td>Why?Why?Why?Why?Why?Why?</td>
                        <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                    </tr>
                    
                    <tr class="nm_deep">
                        <th scope="row">1</th>
                        <td>Why?</td>
                        <td>Why?</td>
                        <td>Why?Why?Why?Why?Why?Why?</td>
                        <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                    </tr>
                </tbody>
            </table>
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