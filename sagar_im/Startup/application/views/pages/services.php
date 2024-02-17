<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content" style="z-index: 10" >
        <div class="container-fluid">
        
            <div class="row">

                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row mt-5">
                            <?php  $res = $this->db->get_where('services',array('status'=>1))->result(); 
                             
                             foreach($res as $r) { if($r->id==20) {  ?>
                             
                            <div class="col-md-2 col-6">
                                <a href="<?=base_url();?>ConferenceBookingRequest" target="_blank"><img
                                        src="<?=base_url('../uploads/service_icon/').$r->service_img;?>"
                                        class="img-fluid" alt="<?=$r->service_name; ?>" /></a>
                            </div>
                            
                            <?php } else { ?>
                            
                            <div class="col-md-2 col-6">
                                <a href="<?=base_url();?>ServiceDetails?service_id=<?=$r->id;?>" target="_blank"><img
                                        src="<?=base_url('../uploads/service_icon/').$r->service_img;?>"
                                        class="img-fluid" alt="<?=$r->service_name; ?>" /></a>
                            </div>

                            <?php  } } ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?=include('common/footer.php');?>