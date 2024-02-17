<?php include('header.php'); ?>
<div class="content-wrapper">
  
   <section class="content-header">
      
    </section>

    <section class="content">

      <div class="card">
        
        <div class="card-header">
          <h3 class="card-title text-uppercase font-weight-bold">Search Engine</h3>
        </div>
        
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url(); ?>Searchengine/update" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <?php
                         $sear = $this->Model->selectDataWhere('searchengine',array('id'=>1))->row(); 
                       ?>
                       <label>Title</label>
                      <input type="text" name="title" class="form-control" value="<?=$sear->title;?>">
                 </div>

                 <div class="form-group">
                        <label>Page Name</label>
                      <input type="text" name="pagename" class="form-control" value="<?=$sear->pagename;?>">
                 </div>
                 <div class="form-group">
                      <label>URL</label>
                      <input type="url" name="url" class="form-control" value="<?=$sear->url;?>">
                 </div>
              

                 <div class="form-group">
                      <label>Description</label>
                     <textarea  class="editor" name="description"><?=$sear->description;?></textarea>
                 </div>
                 
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                 </div>
            </form>
          </div>
          
        </div>
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>




      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <?php include('footer.php'); ?>
