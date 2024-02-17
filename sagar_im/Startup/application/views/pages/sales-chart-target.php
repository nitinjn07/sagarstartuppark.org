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
                                        <h3 class="text-center text-white">Sales Target / Achieve</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateSaleTarget"
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
                                                        <label for="">Total Target Sale<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="target_sale" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Net Sale<span
                                                                class="text-danger">(Optional)</span></label>
                                                        <input type="number" class="form-control my-2" name="net_sale"
                                                             />
                                                    </div>


                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cac_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $sale = $this->db->limit(1)->order_by('id','desc')->get_where('sales_target',array('startup_id'=>$startup->id,'year'=>date('Y'),'status'=>1))->row();
                                                 if($sale)
                                                 {  
                                                     echo "<p>Last Update:</p>";
                                                     echo "<h2>".date('Y')."</h2><br/>";
                                                     echo "<h1>Target Sale:- ₹".number_format($sale->target_sale)."</h1>";
                                                     echo "<h1> Net Sale:- ₹".number_format(round($sale->net_sale))."<h1>";
                                                 }
                                                  
                                                 ?>
                                                <a href="<?=base_url();?>StartupMetrics" class="btn btn-warning">Go
                                                    Back</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Target Sale</th>
                                                    <th>Net Sale</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $sale = $this->db->order_by('id','desc')->get_where('sales_target',array('startup_id'=>$startup->id,'year'=>date('Y'),'status'=>1))->result();
                                                $i=1;
                                                foreach($sale as $s)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$s->year;?></td>
                                                    <td><?=$s->month;?></td>
                                                    <td><?=number_format($s->target_sale);?></td>
                                                    <td><?=number_format($s->net_sale);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delSalesTarget?id=<?=$s->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>

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