<?php include('header.php'); ?>
<div class="content-wrapper">
  
  <section class="content-header">
    
  </section>
  
  <section class="content">
    <div class="row">
     
     <div class="col-md-4">
      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold text-uppercase">Manage Services</h3>
        </div>
        
        <div class="card-body">
        
          <?php if(isset($_GET['service_id'])){ 

            $service = $this->db->get_where('services', array('id'=>$_GET['service_id']))->result();

            foreach($service as $r) {  ?>

            <form action="<?= base_url(); ?>AddServices/update_services/<?= $r->id; ?>" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="">Service Name</label>
                     <input type="text" class="form-control" name="service_name" value="<?= $r->service_name; ?>">
                 </div>
                 
                  <div class="form-group">
                     <label for="">Description</label>
                     <textarea  class="editor" name="content"><?= $r->content; ?></textarea>
                 </div>
                
                 <div class="form-group">
                     <label for="">Service Image</label>
                     <input type="file" class="form-control" name="image" onchange="readURL(this)">
                     <img src="<?= base_url().$r->image; ?>" id="blah" width="auto" height="100px" >
                 </div>
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                 </div>
            </form>

          <?php } } else { ?>
            
            <form action="<?= base_url(); ?>AddServices/saveService" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="">Service Name</label>
                     <input type="text" class="form-control" name="service_name">
                 </div>
                 
                  <div class="form-group">
                     <label for="">Description</label>
                     <textarea  class="editor" name="content"></textarea>
                 </div>
                
                 <div class="form-group">
                     <label for="">Service Image</label>
                     <input type="file" class="form-control" name="image" onchange="readURL(this)">
                     <img src="<?= base_url() ?>uploads/services/default.jpg" id="blah" width="auto" height="100px" >
                 </div>
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                 </div>
            </form>
         
          <?php } ?>
          
        </div>
        
      </div>
    </div>
    
    <div class="col-md-8">
       <div class="card">
           <div class="card-header">
              <p class="card-title font-weight-bold text-uppercase">List of Services</p>
           </div>
           <div class="card-body">
              <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $a = 1; foreach($services as $s)  {  ?>
                   <tr>
                    <td><?= $a++; ?></td>
                     <td><?= $s->service_name; ?></td>
                     <td><?= $s->content; ?></td>
                     <td><img src="<?= base_url().$s->image; ?>" width="100px" height="50px"></td>
                     <td><a href="<?= base_url();?>AddServices/deleteService?delid=<?=$s->id;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                     <a href="<?= base_url().'AddServices?service_id='.$s->id; ?>" class="btn btn-warning btn-sm" ><i class="fa fa-edit"></i></a>

                     </td>
                   </tr>
                   <?php 
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