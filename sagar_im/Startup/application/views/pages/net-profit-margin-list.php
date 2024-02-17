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
                                        <h3 class="text-center text-white float-start">Net Profit Margin List</h3>
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
                                                    <th>Operating Profit</th>
                                                    <th>Total Sales</th>
                                                    <th>OPM</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $net_profit_margin = $this->db->order_by('id','desc')->get_where('net_profit_margin',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                $i=1;
                                                foreach($net_profit_margin as $cr)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$cr->year;?></td>
                                                    <td><?=$cr->month;?></td>
                                                    <td><?=number_format($cr->net_profit);?></td>
                                                    <td><?=number_format($cr->total_revenue);?></td>
                                                    <td><?=number_format($cr->npm);?></td>
                                                    <td><a class="btn btn-danger"
                                                            href="<?=base_url();?>StartupMetrics/delNetProfitMargin?id=<?=$cr->id;?>"
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