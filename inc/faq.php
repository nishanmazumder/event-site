<!-- FAQ Start -->
<div id="nmFaq" class="container-fluid nm-section nm-faq">
    <div class="row">
        <div class="col-md-12">
            <div class="nm-title wow fadeInDown">
                <h1>FAQ</h1>
                <div class="nm-line-middle"></div>
            </div>
            <div class="accordion nm-accordion  wow bounce" id="accordionExample">
                
               <?php 
                    $query = "SELECT * FROM nm_faq ORDER BY id";
                    $result = $db->select($query);

                    while($data = mysqli_fetch_assoc($result)){
                        
                        $id = $data['id'];
                ?>
                
                <div class="card">
                    <div class="card-header nm-bg" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#data<?php echo $id;?>" aria-expanded="true" aria-controls="data<?php echo $id;?>">
                                <?php echo $data['ques'];?>
                            </button>
                            <a href="#" data-toggle="collapse" data-target="#data<?php echo $data['id'];?>" class="float-right"><i class="fas fa-plus"></i></a>
                        </h2>
                    </div>

                    <div id="data<?php echo $id; ?>" class="collapse <?php if($id == 1){ echo "show";}?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body nm-text-light">
                            <?php echo $data['ans'];?>
                        </div>
                    </div>
                </div>

                
                 <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- FAQ End -->