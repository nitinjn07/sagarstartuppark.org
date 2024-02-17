<?php include('header.php'); ?>
  <div class="content-wrapper">
   
    <section class="content-header">
      
    </section>

    
    <section class="content">
      <div class="row">
      <div class="col-md-4">
      
      <div class="card">
        <div class="card-header">
          <h3 class="card-title font-weight-bold text-uppercase">New Review</h3>
        </div>
        
        <div class="card-body">
          
            <form action="<?= base_url(); ?>AddReview/saveReview" method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="">Name</label>
                   <input type="text" class="form-control" placeholder="Enter Course Name" name="name">
               </div>
                 
               <div class="form-group">
                   <label for="">Relation</label>
                   <input type="text" class="form-control" placeholder="Enter Course Name" name="relation">
               </div>
              
                <div class="form-group">
                   <label for="">Rating</label><br/>
                   <label class="review"><input type="radio" name="rate" value="1">1</label>
                   <label class="review"><input type="radio" name="rate" value="2">2</label>
                   <label class="review"><input type="radio" name="rate" value="3">3</label>
                   <label class="review"><input type="radio" name="rate" value="4">4</label>
                   <label class="review"><input type="radio" name="rate" value="5">5</label>
               </div>
            
               <div class="form-group">
                   <label for="">Review</label>
                   <textarea  class="form-control" rows="3" name="review"></textarea>
               </div>
              
               <div class="form-group">
                   <label for="">Photo</label>
                   <input type="file" class="form-control" name="reviewPhoto">
               </div>
            
               <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="Add Review">
               </div>
          
            </form>
          </div>
          
        </div>
        </div>
        <div class="col-md-8">
        
          <div class="card">

            <div class="card-header">
              <p class="card-title font-weight-bold text-uppercase">List of reviews</p>
            </div>
            
            <div class="card-body">
              
               <table class="table table-bordered" id="example1">
                  <thead>
                    <tr>
                       <th>#</th>
                       <th>Image</th>
                       <th>Name</th>
                       <th>Relation</th>
                       <th>Rating</th>
                       <th>Review</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $a = 1; foreach($review as $r)  {  ?>
                    <tr>
                      <td><?= $a++; ?></td>
                       <td><img src="<?= base_url()."uploads/review/".$r->Photo;?>" width="50px" height="50px"></td>
                       <td><?=$r->Name;?></td>
                       <td><?=$r->Relation;?></td>
                       <td><?=$r->Rate;?></td>
                       <td><?=$r->Review;?></td>
                    
                       <td><a href="<?=base_url(); ?>AddReview/deleteReview?delid=<?=$r->id;?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?'); "><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php  }?>
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
