  <?php include('header.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DASHBOARD</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
             $startup = $this->db->Query('select * from startup')->num_rows();
             $investor = $this->db->Query('select * from investor')->num_rows();
             $mentor = $this->db->Query('select * from mentor where delstatus = 1')->num_rows();
             $incubators = $this->db->Query('select * from incubators')->num_rows();
             
    ?>
    <!-- Main content -->
    <section class="content">

       <div class="row">
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?=$startup;?>
                </h3>

                <p>REGISTER STARTUPS</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?= base_url(); ?>Startup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3> <?=$incubators;?></h3>

                <p>REGISTER INCUBATORS</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?= base_url(); ?>Incubator" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$investor;?></h3>

                <p>REGISTER INVESTER</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?= base_url(); ?>Invester" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$mentor;?></h3>

                <p>REGISTER MENTOR</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="<?= base_url(); ?>Mentor" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
       </div>

    </section>
    <!-- /.content -->
  </div>
  <?php include('footer.php'); ?>

