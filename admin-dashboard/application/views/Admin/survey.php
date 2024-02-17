<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('header.php'); ?>
  <div class="content-wrapper">

    <section class="content-header">
      
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Survey Details</h3>

        </div>
        
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
            
              
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Mobile</th>
                         <th>Suggession</th>
                         <th>Action</th>
                     </tr>
                   </thead>
                   
                   <tbody>
                     <?php $i=1; $survey = $this->db2->get('feedback')->result();  foreach($survey as $st) {  ?>
                   
                       <tr>
                          <td><?= $i++;?></td>
                          <td><?= $st->name;?></td>
                          <td><?= $st->email;?></td>
                          <td><?= $st->contact;?></td>
                          <td><?= $st->suggession; ?></td>
                          <td>

                              Pending
                              

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
