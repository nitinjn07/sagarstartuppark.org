<?php include('header.php'); ?>
  <div class="content-wrapper">

    <section class="content-header">
    
    </section>

    
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Manage Invester</h3>

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
                         <th>Company</th>
                          <th>Invester</th>
                         <th>Mobile</th>
                         <th>Email</th>
                         <th>Funded</th>
                         <th>State</th>
                         <th>City</th>
                         <th>Amount</th>
                         <th>Type</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php  $i=1;  foreach($investors as $st) { ?>
                     <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $st->compay_name; ?></td>
                         <td><?= $st->name; ?></td>
                        <td><?= $st->mobile; ?></td>
                        <td><?= $st->email; ?></td>
                        <td><?= $st->company_funded; ?></td>
                        <td><?= $st->state; ?></td>
                        <td><?= $st->city; ?></td>
                        <td><?= $st->total_amount_invested; ?></td>
                        <td><?= $st->type_of_invester; ?></td>
                        <td><?= $st->status; ?></td>
                        <td>


                          <?php if($st->linkedin_url != '' || $st->linkedin_url != null){ ?>

                            <a href="<?= $st->linkedin_url; ?>" target="_blank" class="btn btn-sm btn-info" >
                              <i class="fa fa-eye"></i>
                            </a>

                          <?php } else { ?>

                            Not Found

                          <?php } ?>
                          
                        
                        <!-- <a href="<?=base_url();?>Invester/deleteData?delid=<?=$st->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
                        
                        
                        <?php  if($st->status=='pending') { ?>
                        
                            <a href="<?=base_url();?>Invester/ApprovedData?approvedID=<?=$st->id;?>" class="btn btn-sm btn-success" title="Approved Now"><i class="fa fa-check"></i></a>
                        
                        <?php } else { ?>
                         
                            <a href="<?=base_url();?>Invester/NotApprovedData?notapprovedID=<?=$st->id;?>" class="btn btn-sm btn-warning" title="Not Approved Now"><i class="fa fa-times"></i></a>      
                                         
                        <?php } ?> -->
                        
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
