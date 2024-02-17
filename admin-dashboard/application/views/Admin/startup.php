<?php include('header.php'); ?>
  <div class="content-wrapper">

    <section class="content-header">
      
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Manage startup</h3>

          <div class="float-right">
             <a href="<?= base_url(); ?>Export_file/index" class="btn btn-success text-white">Export Data <i class="fa fa-file-excel"></i> </a>
              <a onclick="window.print()" class="btn btn-warning">Print <i class="fa fa-print" aria-hidden="true"></i></a>
          </div>
        </div>
        
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
            
             <?php if(isset($_GET['status'])) {

                     if($_GET['status']=='success'){ ?> 

                      <div class="alert alert-success">
                        Successfully Updated
                      </div>

                <?php }  else if($_GET['status']=='failed') { ?>

                      <div class="alert alert-danger">
                        Failed Updated
                      </div>

                  <?php } } ?>
              
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                         <th>ID</th>
                         <th>Start-up</th>
                         <th>Mobile</th>
                         <th>Email</th>
                         <th>City</th>
                         <th>Product Service Summary</th>
                         <th>Type</th>
                         <th>Web</th>
                     </tr>
                   </thead>
                   
                   <tbody>
                     <?php $i=1;  foreach($startups as $st) {  ?>
                   
                       <tr>
                          <td><?= $i++;?></td>
                          <td><?= $st->startup_name;?></td>
                          <td><?= $st->mobile;?></td>
                          <td><?= $st->email;?></td>
                          <td><?= $st->city;?></td>
                          <td><?= $st->product_service_summary; ?></td>
                          <td><?= $st->type_of_business;?></td>
                          <td>

                              <?php if($st->website_address != '' || $st->website_address != null){ ?>

                                <a href="<?= $st->website_address; ?>" target="_blank" class="btn btn-sm btn-info" >
                                  <i class="fa fa-eye"></i>
                                </a>

                              <?php } else { ?>

                                Not Found

                              <?php } ?>
                              
                              
                              <!-- 
                              <a href="<?=base_url();?>startup/deleteData?delid=<?=$st->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
                              

                              
                              <?php if($st->status=='pending'){ ?>

                                <a href="<?=base_url();?>startup/ApprovedData?approvedID=<?=$st->id;?>" class="btn btn-sm btn-success" title="Approved Now"><i class="fa fa-check"></i></a>
                              
                              <?php } else { ?>
                               
                                  <a href="<?=base_url();?>startup/NotApprovedData?notapprovedID=<?=$st->id;?>" class="btn btn-sm btn-danger" title="Not Approved Now"><i class="fa fa-times"></i></a>      
                                               
                              <?php } ?> -->

                          </td>
                       </tr>
                       
                       <?php } ?>

                   </tbody>

               </table>
               
          </div>
          
        </div>
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>



    </section>
    <!-- /.content -->
  </div>

  <?php include('footer.php'); ?>
