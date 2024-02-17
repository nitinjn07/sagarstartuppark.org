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
             <a href="<?= base_url(); ?>Export_file/hackthon_list" class="btn btn-success text-white">Export Data <i class="fa fa-file-excel"></i> </a>
              <!--<a onclick="window.print()" class="btn btn-warning">Print <i class="fa fa-print" aria-hidden="true"></i></a>-->
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
              
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                     <tr>
                         <th>ID</th>
                         <th>Startup Name</th>
                          <th>Founder</th>
                         <th>Mobile</th>
                         <th>Email</th>
                         <th>City</th>
                         <th>Idea</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php  $i=1;  foreach($hackfest as $st) { ?>
                     <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $st->startupname; ?></td>
                         <td><?= $st->foundername; ?></td>
                        <td><?= $st->mobileno; ?></td>
                        <td><?= $st->emailid; ?></td>
                        <td><?= $st->cityname; ?></td>
                        <td><?= $st->idea; ?></td>
                        <td>

                            <a href="<?= base_url('../sparkhackathon2021/uploads/presentation/').$st->startupfile; ?>" target="_blank" class="btn btn-sm btn-info" >
                              View File
                            </a>
                          
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
