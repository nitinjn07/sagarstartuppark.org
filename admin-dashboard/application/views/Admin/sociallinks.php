<?php include('header.php'); ?>

<div class="content-wrapper">
 
  <section class="content-header">
    
  </section>


  <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-uppercase font-weight-bold">Manage Social Links</h3>
        </div>
        
        <form action="<?=base_url();?>SocialLinks/UpdateSocial" method="post">
          <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                     <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?=$social->facebook;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control" name="twt" value="<?=$social->twitter;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" class="form-control" name="youtube" value="<?=$social->youtube;?>"/>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?=$social->instagram;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" value="<?=$social->linkedin;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Whatsapp</label>
                        <input type="text" class="form-control" name="whatsapp" value="<?=$social->whatsapp;?>"/>
                     </div>
                  </div>
             </div>

           </div>

           <div class="card-footer">
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Links">
              </div>
           </div>
           
        </form>
      </div>
    
  </section>

</div>
<?php include('footer.php'); ?>

