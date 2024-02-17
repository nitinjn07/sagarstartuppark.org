<?php include('header.php'); ?>
  <div class="content-wrapper">

    <section class="content-header">
      
    </section>

    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Manage Mentor</h3>

           <div class="card-tools">
             <a  href="<?= base_url(); ?>Export_file/mentor" class="btn btn-success text-white">Export Data <i class="fa fa-file-excel"></i> </a>
              <!--<a onclick="window.print()" class="btn btn-warning">Print <i class="fa fa-print" aria-hidden="true"></i></a>-->
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
              <?php if(isset($_GET['status'])) {

                     if($this->session->userdata('success') != ''){ ?> 

                      <div class="alert alert-success">
                        Successfully Updated
                      </div>

                <?php }  else if($this->session->userdata('success') != '') { ?>

                      <div class="alert alert-danger">
                        Failed Updated
                      </div>

                  <?php } } ?>
              
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                     <tr>
                         <th>ID</th>
                         <th>name</th>
                         <th>Email</th>
                          <th>Mobile</th>
                         <th>State</th>
                         <th>City</th>
                         <th>Profile</th>
                         <th>Action</th>
                     </tr>
                   </thead>

                   <tbody>
                   <?php $i=1;   foreach($mentor as $st) { ?>
                     <tr>
                        <td><?= $i++;?></td>
                        <td><?= $st->name;?></td>
                         <td><?= $st->email;?></td>
                        <td><?= $st->mobile;?></td>
                        <td><?= $st->state;?></td>
                        <td><?= $st->city;?></td>
                        <td>
                        
                            <?php if($st->linkedin_url != ''){ ?>
                                <a href="<?= $st->linkedin_url; ?>" target="_blank" class="btn btn-sm btn-info"><i class="fab fa-linkedin"></i></a>
                            <?php } else {echo 'Not Found';} ?>
                          
                         <!-- <?php if($st->status=='pending') { ?>

                            <a href="<?= base_url();?>Mentor/ApprovedData?approvedID=<?= $st->id;?>" class="btn btn-sm btn-success" title="Approved Now"><i class="fa fa-check"></i></a>
                          
                          <?php  } else { ?>
                           
                              <a href="<?= base_url();?>Mentor/NotApprovedData?notapprovedID=<?= $st->id;?>" class="btn btn-sm btn-warning" title="Not Approved Now"><i class="fa fa-times"></i></a>      
                                           
                         <?php } ?> -->
                        
                        </td>
                        <td>
                           <a href="<?= base_url();?>Mentor/deleteData?delid=<?= $st->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                   
                   <?php  } ?>
                  </tbody>
               </table>
               
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
