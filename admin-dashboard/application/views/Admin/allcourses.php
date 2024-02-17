  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Courses</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr>
                    <th>ID</th>
                    <th>CourseName</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>LiveID</th>
                    <th>LivePass</th>
                    <th>LiveURL</th>
                    <th>LiveDate</th>
                    <th>LiveTime</th>
                    <th>Summary</th>
                    <th>Syllabus</th>
                    <th>Image</th>
                    <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                <?php 
                  foreach($courses as $c)
                  {
                ?>
                 <tr>
                  <td><?=$c->cid;?></td>
                   <td><?=$c->cname;?></td>
                   <td><?=$c->ctype;?></td>
                   <td><?=$c->cprice;?></td>
                   <td><?=$c->liveid;?></td>
                   <td><?=$c->livepass;?></td>
                   <td><?=$c->liveurl;?></td>
                   <td><?=$c->livedate;?></td>
                   <td><?=$c->livetime;?></td>
                   <td><?=$c->summary;?></td>
                   <td><?=$c->syllabus;?></td>
                   <td><img src="<?=base_url('uploads/').$c->img; ?>" width="50px" height="50px"/></td>
                   <td>
                     <a href="" class="btn btn-warning btn-sm">Edit</a>
                     <a href="<?=base_url();?>AllCourses/deleteCourses?delid=<?=$c->cid;?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete data');">Delete</a>
                   </td>
                 </tr>
               <?php } ?>
               </tbody>
             </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <?php include('footer.php'); ?>

