<?php include('header.php'); ?>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Manage Incubator</h3>

          <div class="card-tools">
             <a id="downloadLink" onclick="exportF(this)" class="btn btn-success text-white">Export Data <i class="fa fa-file-excel"></i> </a>
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
                         <th>name</th>
                         <th>Email</th>
                          <th>Mobile</th>
                         <th>Support</th>
                         <th>State</th>
                         <th>City</th>
                         <th>Mentoring</th>
                         <th>Status</th>
                         <th>Web</th>
                     </tr>
                   </thead>

                   <tbody>
                   
                   <?php  $i=1;foreach($mentor as $st){ ?>
                   
                   <tr>
                      <td><?=$i++;?></td>
                      <td><?=$st->name;?></td>
                       <td><?=$st->email;?></td>
                      <td><?=$st->phone;?></td>
                      <td><?=$st->technical_support;?></td>
                      <td><?=$st->state;?></td>
                      <td><?=$st->city;?></td>
                      <td><?=$st->mentoring;?></td>
                      <td><?=$st->status;?></td>
                      <td>
                          <?php if($st->website != '' || $st->website != null){ ?>

                            <a href="<?= $st->website; ?>" target="_blank" class="btn btn-sm btn-info" >
                              <i class="fa fa-eye"></i>
                            </a>

                          <?php } else { ?>

                            Not Found

                          <?php } ?>

                      <!-- <a href="<?=base_url();?>Incubator/deleteData?delid=<?=$st->id;?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
                      
                      
                      <?php if($st->status=='pending') { ?>
                      
                          <a href="<?=base_url();?>Incubator/ApprovedData?approvedID=<?=$st->id;?>" class="btn btn-success" title="Approved Now"><i class="fa fa-check"></i></a>
                     
                      <?php  } else { ?>
                       
                          <a href="<?=base_url();?>Incubator/NotApprovedData?notapprovedID=<?=$st->id;?>" class="btn btn-danger" title="Not Approved Now"><i class="fa fa-times"></i></a>      
                                       
                      <?php  } ?> -->
                      
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
