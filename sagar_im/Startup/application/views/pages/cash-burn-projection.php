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
                                        <h3 class="text-center text-white">Cash Burn Projection</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateCashProjection"
                                                    method="post">
                                                    <div class="form-group">
                                                        <label for="">Year <span class="text-danger">*</span></label>
                                                        <select name="year" class="form-control my-2">
                                                            <option value="">Select Year</option>
                                                            <?php
                                                              for($i=2023; $i>=2000; $i--)
                                                              {
                                                             ?>
                                                            <option value="<?=$i;?>"><?=$i;?></option>
                                                            <?php
                                                              } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Month <span class="text-danger">*</span></label>
                                                        <select name="month" class="form-control">
                                                            <option value="">Select Year</option>
                                                            <option value="JAN">JAN</option>
                                                            <option value="FEB">FEB</option>
                                                            <option value="MAR">MAR</option>
                                                            <option value="APR">APR</option>
                                                            <option value="MAY">MAY</option>
                                                            <option value="JUN">JUN</option>
                                                            <option value="JUL">JUL</option>
                                                            <option value="AUG">AUG</option>
                                                            <option value="SEP">SEP</option>
                                                            <option value="OCT">OCT</option>
                                                            <option value="NOV">NOV</option>
                                                            <option value="DEC">DEC</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Cash Burn Projection<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="burn_projection" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Net Burn<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="net_burn" />
                                                    </div>


                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cac_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $sale = $this->db->limit(1)->order_by('id','desc')->get_where('cash_burn_projection',array('startup_id'=>$startup->id,'year'=>date('Y')))->row();
                                                 if($sale)
                                                 {   echo "<h2>".date('Y')."</h2><br/>";
                                                     echo "<h1>Burn Projection:- ₹".number_format($sale->burn_projection)."</h1>";
                                                     echo "<h1> Net Burn:- ₹".number_format(round($sale->net_burn))."<h1>";
                                                 }
                                                  
                                                 ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="<?=base_url();?>StartupMatrix" class="btn btn-warning">Go Back</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Burn Projection</th>
                                                    <th>Net Burn</th>
                                                    <th>Generated Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $burn_projection = $this->db->order_by('id','desc')->get_where('cash_burn_projection',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                 
                                                $i=1;
                                                foreach($burn_projection as $bp)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$bp->year;?></td>
                                                    <td><?=$bp->month;?></td>
                                                    <td><?=number_format($bp->burn_projection);?></td>
                                                    <td><?=number_format($bp->net_burn);?></td>
                                                    <td><?=$bp->created_date;?></td>
                                                    <td><a class="btn btn-danger"
                                                            href="<?=base_url();?>StartupMetrics/delBurnProjection?id=<?=$bp->id;?>"
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