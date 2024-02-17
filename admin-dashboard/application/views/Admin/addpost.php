    <?php include('header.php'); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ADD POST</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ADD Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
     <div class="col-md-6">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New Post</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        
            <form action="<?= base_url(); ?>AddPost/savePost" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                     <label for="">Select Category</label>
                     <select name="cid" class="form-control">
                       <option value="">Select Category</option>
                        <?php 
                           foreach($category as $c)
                           {
                            ?>

                          <option value="<?=$c->cid;?>"><?=$c->cname;?></option>
                            <?php
                           }
                        ?>
                     </select>
                 </div>
                
                
                 <div class="form-group">
                     <label for="">Post Title</label>
                     <input type="text" class="form-control" name="title">
                 </div>
                  <div class="form-group">
                     <label for="">Feature Post</label>
                     <input type="file" class="form-control" name="feature_post">
                 </div>
                 <div class="form-group">
                     <label for="">Summary</label>
                     <textarea type="text" class="editor" name="summary"> </textarea>
                 </div>
                 <div class="form-group">
                     <label for="">Content</label>
                     <textarea type="text" class="editor" name="content"> </textarea>
                 </div>
                 <div class="form-group">
                     <label for="">Post Date</label>
                     <input type="date" class="form-control" name="postdate">
                 </div>
                  <div class="form-group">
                     <label for="">Tags</label>
                     <input type="text" class="form-control" class="tags" name="tags" />
                 </div>
                 <div class="form-group">
                     <label for="">Author Name</label>
                    <select name="aid" class="form-control">
                       <option value="">Select Author</option>
                        <?php 
                           foreach($author as $c)
                           {
                            ?>

                          <option value="<?=$c->aid;?>"><?=$c->name;?></option>
                            <?php
                           }
                        ?>
                     </select>
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
    <div class="col-md-6">
           <div class="card">
               <div class="card-header">
                  <h2>All Categories</h2>
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="example1">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Title</th>
                       
                          <th>Date</th>
                           <th>Author Name</th>
                        
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($post as $p) 
                        {
                      ?>
                       <tr>
                         <td><img src="<?=base_url('uploads/blog/').$p->image;?>" width="50px" height="50px"></td>
                         <td><?=$p->title;?></td>
                         
                           <td><?=$p->date;?></td>
                            <td><?=$p->name;?></td>
                             <td>
                               <a href="<?=base_url();?>AddPost/deletePost?delid=<?=$p->pid;?>" class="btn btn-danger "><i class="fa fa-trash"></i></a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?=$p->pid;?>">
             <i class="fa fa-edit"></i>
                </button>
                        
                        <div class="modal" id="update<?=$p->pid;?>">
                        <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Update Blog</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                        <form action="<?= base_url();?>AddPost/updatePost?updateid=<?=$p->pid;?>" method="post" enctype="multipart/form-data">
                
                
                 <div class="form-group">
                     <label for="">Post Title</label>
                     <input type="text" class="form-control" name="title" value="<?=$p->title;?>">
                 </div>
                 
                 <img src="<?=base_url('uploads/blog/').$p->image;?>" width="80px" height="50px"/>
                 <div class="form-group">
                     <label for="">Summary</label>
                     <textarea type="text" class="editor" name="summary"> <?=$p->summary;?></textarea>
                 </div>
                 <div class="form-group">
                     <label for="">Content</label>
                     <textarea type="text" class="editor" name="content"> <?=$p->content;?></textarea>
                 </div>
               
                 
                
                 <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-block" value="Save">
                 </div>
            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                        </div>
                        </div>
                         
                             </td>
                         <td>

                          

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
