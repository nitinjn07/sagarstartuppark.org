<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Change Startup Type
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <h3 class="text-center">Physical Startups</h3>
                                        <table class="table">
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Startup Name</th>
                                                <th>Transfer To Virtual</th>
                                            </tr>
                                            <?php 
                                              $i=1;
                                              $physical = $this->db->get_where('startup',array('delstatus'=>1,'is_graduate'=>0,'startup_type'=>'Physical'))->result();
                                              foreach($physical as $p)
                                              {
                                            ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?=$p->startup_name;?></td>

                                                <td>
                                                    <a href="<?=base_url();?>ChangeStartupType/changeType?startup_id=<?=$p->id;?>&&type=physical"
                                                        class="btn btn-danger">Move to Virtual >></a>
                                                </td>

                                            </tr>
                                            <?php 
                                               $i++;
                                              }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="text-center">Virtual Startups</h3>
                                        <table class="table">
                                            <tr>
                                                <th>Transfer To Physical</th>
                                                <th>SNo.</th>
                                                <th>Startup Name</th>


                                            </tr>
                                            <?php 
                                              $i=1;
                                              $virtual = $this->db->get_where('startup',array('delstatus'=>1,'is_graduate'=>0,'startup_type'=>'Virtual'))->result();
                                              foreach($virtual as $p)
                                              {
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="<?=base_url();?>ChangeStartupType/changeType?startup_id=<?=$p->id;?>&&type=virtual"
                                                        class="btn btn-success">
                                                        << Move to Physical</a>
                                                </td>
                                                <td><?=$i;?></td>
                                                <td><?=$p->startup_name;?></td>



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


                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>