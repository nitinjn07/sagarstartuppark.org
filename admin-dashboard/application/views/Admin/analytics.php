    <?php include('header.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Analytics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Analytics</li>
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
          <h3 class="card-title">Analytics</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="col-md-12">
            <form action="<?= base_url(); ?>Analytics/update" method="post" >
                  <?php
                         $sear = $this->Model->selectDataWhere('analytics',array('id'=>1))->row(); 
                       ?>

                
                
                 <div class="form-group">
                      <label> Google Analytics</label>
                     <textarea  class="editor" name="googleanalytics"><?=$sear->googleanalytics;?></textarea>
                 </div>

                 <div class="form-group">
                      <label> Google Search</label>
                     <textarea  class="editor" name="googlesearch"><?=$sear->googlesearch;?></textarea>
                 </div>

                 <div class="form-group">
                      <label>Google tag</label>
                     <textarea  class="editor" name="googletag"><?=$sear->googletag;?></textarea>
                 </div>

                 <div class="form-group">
                      <label>Google Tag2</label>
                     <textarea  class="editor" name="googletag2"><?=$sear->googletag2;?></textarea>
                 </div>
                 <div class="form-group">
                      <label>Google Map</label>
                     <textarea  class="editor" name="googlemap"><?=$sear->googlemap;?></textarea>
                 </div>
                 
                 <div class="form-group">
                    <input type="submit" class="btn btn-warning btn-block" value="Update">
                 </div>
            </form>
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
