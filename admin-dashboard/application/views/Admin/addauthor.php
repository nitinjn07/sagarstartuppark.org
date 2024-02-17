    <?php include('header.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Author</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Author</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
     <div class="col-md-4">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New Author</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        
            <form action="<?= base_url(); ?>AddAuthor/saveAuthor" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="">Author Name</label>
                     <input type="text" class="form-control" name="authorName">
                 </div>                               
                 <div class="form-group">
                     <label for="">Photo</label>
                     <input type="file" class="form-control" name="authorPhoto">
                 </div>
                  <div class="form-group">
                     <label for="">LinkedIn Page</label>
                     <input type="text" class="form-control" name="linkedinPage">
                 </div>
                  <div class="form-group">
                     <label for="">Designation</label>
                     <input type="text" class="form-control" name="designation">
                 </div>
                 
                 <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-block" value="Save">
                 </div>
            </form>
          
        </div>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
    </div>
    <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                  <h2>All Author</h2>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="example1">
                    <thead>
                      <tr>
                        <th>Author Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>linkdinUrl</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($author as $c) 
                        {
                      ?>
                       <tr>
                         <td><img src="<?=base_url('uploads/author/').$c->photo;?>" width="50px" height="50px"></td>
                         <td><?=$c->name;?></td>
                           <td><?=$c->designation;?></td>
                             <td><?=$c->linkedin;?></td>
                         <td>

                          <a href="<?=base_url();?>AddAuthor/deleteauthor?delid=<?=$c->aid;?>" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                          <a href="" class="btn btn-primary "><i class="fa fa-edit"></i></a>

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




      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <?php include('footer.php'); ?>
