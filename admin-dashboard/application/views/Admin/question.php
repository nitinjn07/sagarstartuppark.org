    <?php include('header.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Question</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
          <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Add Question</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
            <form action="<?= base_url(); ?>Question/saveQuestion" method="post">
                 <div class="form-group">
                     <label for="">Question</label>
                     <input type="text" class="form-control" placeholder="Enter Course Name" name="question">
                 </div>
                 
                 
                  <div class="form-group">
                     <label for="">Answer</label>
                     <textarea  class="form-control" name="answer"></textarea>
                 </div>
                 
                 <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-block" value="Save">
                 </div>
            </form>
          </div>
          
        </div>
        </div>
        <div class="col-md-8">
              <div class="card">
                   <div class="card-header">
                       <h4>All Question Data</h4>
                   </div>
                   <div class="card-body">
                        <table class="table table-bordered " id="example1">
                          <thead>
                            <tr>
                               <th>ID</th>
                               <th>Question</th>
                               <th>Answer</th>
                               <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                               foreach($qa as $q)
                               { 
                            ?>
                            <tr>
                               <td>#</td>
                               <td><?=$q->question;?></td>
                               <td><?=$q->answer;?></td>
                               <td><a href="<?= base_url(); ?>Question/deleteQuestion?delid=<?=$q->qid;?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></a></td>
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
