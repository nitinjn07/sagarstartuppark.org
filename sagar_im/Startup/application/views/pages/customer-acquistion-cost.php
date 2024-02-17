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
                                    <div class="card-header bg-warning">
                                        <h3 class="text-center text-white float-start">Customer Acquisition Cost</h3>
                                        <a href="<?=base_url();?>StartupMetrics"
                                            class="btn btn-danger btn-lg float-end">Back</a>
                                    </div>
                                    <div class="card-body">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Year</th>
                                                    <th>Cost of Sale</th>
                                                    <th>Total Expense</th>
                                                    <th>Total Customer</th>
                                                    <th>CAC</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $cac = $this->db->order_by('id','desc')->get_where('cac',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                
                                                $i=1;
                                                foreach($cac as $c)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$c->year;?></td>

                                                    <td><?=number_format($c->cost_of_sale);?></td>
                                                    <td><?=number_format($c->total_exp);?></td>
                                                    <td><?=number_format($c->new_customer);?></td>
                                                    <td><?=number_format($c->cac);?></td>
                                                    <td><a class="btn btn-danger"
                                                            href="<?=base_url();?>StartupMetrics/delCAC?id=<?=$c->id;?>"
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

        </div>
    </main>

    <?=include('common/footer.php');?>