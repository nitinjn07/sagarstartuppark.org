<?php include('header.php'); ?>

<div class="content-wrapper">

<section class="content-header">
  
</section>

<section class="content">

    <div class="row">

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-uppercase">Manage Slider</h3>
            </div>
                
            <div class="card-body">

              <?php if(isset($_GET['status'])) {

                     if($this->session->flashdata('success') != ''){ ?> 

                      <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                      </div>

                <?php }  else if($this->session->flashdata('failed')) { ?>

                      <div class="alert alert-danger">
                         <?= $this->session->flashdata('failed'); ?>
                      </div>

                  <?php } } ?>

            
            <?php if(isset($_GET['edit_id'])){ 

                $data = $this->db->get_where('slider', array('id'=>$_GET['edit_id']))->result();

                foreach($data as $e) { ?>
                   <form action="<?=base_url();?>Slider/updateSlider?updateId=<?= $e->id; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="<?= $e->title; ?>" />
                         </div>
                         <div class="form-group">
                            <label>Summary</label>
                            <textarea class="editor" name="summary" rows="3"><?= $e->summary; ?></textarea>
                         </div>
                         <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="sliderimg" class="form-control" onchange="readURL(this);" />
                            <img src="<?= base_url().$e->path; ?>" class="img img-thumbnail mt-1" id="blah" width="auto" style="height: 150px;" />
                         </div>
                         <div class="form-group">
                             <input type="submit" class="btn btn-primary btn-block" value="Update">
                         </div>
                   </form>

            <?php } } else { ?>

                   <form action="<?=base_url();?>Slider/uploadSlider" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" />
                         </div>
                         <div class="form-group">
                            <label>Summary</label>
                            <textarea class="editor" name="summary" rows="3"></textarea>
                         </div>
                         <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="sliderimg" class="form-control" onchange="readURL(this);" />
                            <img src="<?= base_url(); ?>uploads/slider/defualt.png" class="img img-thumbnail mt-1" id="blah" width="auto" style="height: 150px;" />
                         </div>
                         <div class="form-group">
                             <input type="submit" class="btn btn-primary btn-block" value="Add">
                         </div>
                   </form>

            <?php } ?>
            
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-uppercase">List of Slider</h3>
            </div>
            <div class="card-body">
               <table class="table table-bordered" id="example1">
                 <thead>
                   <tr>
                       <th>No.</th>
                       <th>Title</th>
                       <th>Summary</th>
                       <th>Image</th>
                       <th>Action</th>
                   </tr>
                 </thead>
                 
                 <tbody>
                  
                  <?php $i=1; foreach($slider as $s) { ?>
                  
                   <tr>
                      <td><?=$i;?></td>
                      <td><?=$s->title;?></td>
                      <td><?=$s->summary;?></td>
                      <td><img src="<?=base_url().$s->path;?>" width="auto" height="50px"/></td>
                      <td>
                          <a href="<?=base_url();?>Slider/deletSlider?slideid=<?= $s->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash" onclick="return confirm('Are you sure to delete?');"></i></a>
                        
                          <a href="<?= base_url(); ?>Slider?edit_id=<?= $s->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                      </td>
                   </tr>
                   <?php
                   $i++;
                     } 
                   ?>
                 </tbody>
               </table>
              </div>
           </div>
        </div>

    </div>

</section>

</div>

<?php include('footer.php'); ?>

