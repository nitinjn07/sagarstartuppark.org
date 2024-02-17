<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Upload Customer
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="<?=base_url();?>LaunchMVP/SaveCustomerCSV"
                                    enctype="multipart/form-data">
                                    <div class="form-group py-2">
                                        <label for="">File Name</label>
                                        <input type="text" name="file_name" placeholder="" class="form-control" />
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="">Upload CSV File</label>
                                        <input type="file" name="csv_file" class="form-control" />
                                    </div>
                                    <div class="form-group py-2">

                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>File Name</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php
                                      $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                                      $file = $this->db->get_where('mvp_customer',array('delstatus'=>1,'startupid'=>$startup->id))->result();
                                      $i=1;
                                      foreach($file as $f)
                                      {
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$f->file_name;?></td>
                                        <td><a href="<?=base_url();?>LaunchMVP/DeleteCustomerCSV?id=<?=$f->id;?>"><i
                                                    class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php 
                                      } 
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>