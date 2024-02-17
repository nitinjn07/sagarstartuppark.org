<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Send Email to Customer
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>SNo.</th>
                                        <th>File Name</th>
                                        <th>CSV Files</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                  $sid = $_GET['startupid'];
                                  $customer=$this->db->get_where('mvp_customer',array('startupid'=>$sid))->result(); 
                                  $i=1;
                                  foreach($customer as $c)
                                  {
                                 ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$c->file_name;?></td>
                                        <td><?=$c->file_location;?></td>
                                        <td><a href="<?=base_url();?>LaunchMVP/sendEmailCustomerNow?id=<?=$c->id;?>"
                                                class="btn btn-success">Send Now</a></td>
                                    </tr>

                                    <?php
                                    $i++;
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