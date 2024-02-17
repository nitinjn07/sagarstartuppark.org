<?php include('header.php'); ?>

  <div class="content-wrapper">
    
    <section class="content-header">
      
      <div class="card">
        
        <div class="card-header">
          <h3 class="card-title">Manage About Us</h3>
        </div>
        
        <form action="<?= base_url(); ?>AboutUs/updateAbout" method="post" enctype="multipart/form-data">
        
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    
                     <?php
                         $about = $this->Model->selectDataWhere('aboutus',array('id'=>1))->row(); 
                       ?>
                    
                      <input type="text" name="title" class="form-control" value="<?=$about->title;?>">
                 </div>

                 <div class="form-group row">
                       
                      <div class="col-sm-6">
                          <input type="file" name="image" class="form-control" onchange="readURL(this);" />
                      </div>

                      <div class="col-sm-6">
                        <img src="<?=base_url().$about->image?>" class="img img-thumbnail mt-1" id="blah" width="auto" style="height: 200px;" />
                      </div>

                   </div>

                   <div class="form-group">
                       <textarea  class="editor" name="content"><?=$about->content;?></textarea>
                   </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            
             <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update About ">
             </div>

          </div>
        
        </form>
        
      </div>

    </section>
   
  </div>

<?php include('footer.php'); ?>