<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content" style="z-index: 10">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row mt-5">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="text-center text-white float-start">Monthly Recurring Revenue</h3>
                                        <a href="<?=base_url();?>StartupMetrics"
                                            class="btn btn-danger btn-lg float-end">Back</a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>No of Active Account</th>
                                                    <th>ARPA</th>
                                                    <th>MRR</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $mrr = $this->db->order_by('id','desc')->get_where('mrr',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                $i=1;
                                                foreach($mrr as $m)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$m->year;?></td>
                                                    <td><?=$m->month;?></td>
                                                    <td><?=number_format($m->no_of_accounts);?></td>
                                                    <td><?=number_format($m->apra);?></td>
                                                    <td><?=number_format($m->mrr);?></td>
                                                    <td><a class="btn btn-danger"
                                                            href="<?=base_url();?>StartupMetrics/delMRR?id=<?=$m->id;?>"
                                                            onclick="return confirm('Are you sure to delete ?');"><i
                                                                class='fa fa-trash'></i></a></td>
                                                </tr>
                                                <?php 
                                                $i++;
                                                    }
                                                ?>
                                            </tbody>
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