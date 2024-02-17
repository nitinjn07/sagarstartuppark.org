<?php 
 if($param==1)
 {
?>
<form action="<?=base_url();?>StartupMetrics/UpdateMRR" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
            <option value="">Select Month</option>
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
        <label for="">Total Number of Customers <span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="no_of_active_account" required />
    </div>
    <div class="form-group">
        <label for="">ARPA ( Average Revenue Per Paying User) - Monthly
            Billing <span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="arpa" required />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="mrr_btn" />
    </div>
</form>
<?php 
 }
 if($param==2)
 {
?>
<form action="<?=base_url();?>StartupMetrics/updateCAC" method="post">
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
            <option value="">Select Month</option>
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
        <label for="">Cost of Sales<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="cost_sale" required />
    </div>
    <div class="form-group">
        <label for="">Total Expense for Acquisition<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="cost_marketing" required />
    </div>
    <div class="form-group">
        <label for="">New Customer Accuired<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="new_customer" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="cac_btn" />
    </div>
</form>
<?php 
 }
 if($param==3)
 {
 ?>
<form action="<?=base_url();?>StartupMetrics/updateCLV" method="post">
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
            <option value="">Select Month</option>
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
        <label for="">Customer Average Value of Sale<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="avg_sale" required />
    </div>
    <div class="form-group">
        <label for="">Average Number of Transaction<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="avg_transaction" required />
    </div>
    <div class="form-group">
        <label for="">Average Customer Life Span<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="avg_customer_lifespan" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="cac_btn" />
    </div>
</form>
<?php
 }
 if($param==4)
 {
 ?>
<form action="<?=base_url();?>StartupMetrics/updateGross" method="post">
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
            <option value="">Select Month</option>
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
        <label for="">Number of Goods Sold<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="sold_goods" required />
    </div>
    <div class="form-group">
        <label for="">Price Per Item<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="item_price" required />
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="cac_btn" />
    </div>
</form>
<?php
 }
 if($param==5)
 {
?>

<form action="<?=base_url();?>StartupMetrics/updateChurnRate" method="post">
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
            <option value="">Select Month</option>
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
        <label for="">Lost Customer<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="lost_customer" required />
    </div>
    <div class="form-group">
        <label for="">Total Customers (At the Start of Time Period)<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="total_customer" required />
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="cac_btn" />
    </div>
</form>
<?php
 }
 if($param==6)
 {
 ?>
<form action="<?=base_url();?>StartupMetrics/updateCashBurnRate" method="post">
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
        <label for="">Monthly Sales <span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="start_capital" required />
    </div>
    <div class="form-group">
        <label for="">Monthly Expense<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="end_capital" required />
    </div>



    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="cac_btn" />
    </div>
</form>
<?php
 }
 if($param==7)
 {
 ?>
<form action="<?=base_url();?>StartupMetrics/updateRevenue" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Gross Revenue<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="gross" required />
    </div>
    <div class="form-group">
        <label for="">Direct Expenses ( Related to Sales)<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="direct_expense" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>
<?php
 }
 if($param==8)
 {
 ?>
<form action="<?=base_url();?>StartupMetrics/updateGrossProfit" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Net Revenue <span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="net_revenue" required />
    </div>
    <div class="form-group">
        <label for="">Cost of Goods Sold<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="goods_sold" required />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>
<?php
 }
 if($param==9)
 {
?>
<form action="<?=base_url();?>StartupMetrics/updateOperatingProfit" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Revenue from core operation <span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="core_operation_revenue" required />
    </div>
    <div class="form-group">
        <label for="">Total Cost of Goods Sold Value<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="goods_sold_cost" required />
    </div>
    <div class="form-group">
        <label for="">Operating Expense<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="operating_exp" required />
    </div>
    <div class="form-group">
        <label for="">Depreciation Expense<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="depreciation_exp" required />
    </div>
    <div class="form-group">
        <label for="">Amortization Expense<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="amortization_exp" required />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>

<?php
 }
 if($param==10)
 {
?>
<form action="<?=base_url();?>StartupMetrics/updateGrossProfitMargin" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Total Gross Profit<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="gross_profit" required />
    </div>
    <div class="form-group">
        <label for="">Total Sales<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="total_sales" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>
<?php 
 }
 if($param==11)
 {
?>
<form action="<?=base_url();?>StartupMetrics/updateOperatingProfitMargin" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Operating Profit<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="operating_profit" required />
    </div>
    <div class="form-group">
        <label for="">Total Sales<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="total_sales" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>
<?php }
 if($param==12)
 {
?>
<form action="<?=base_url();?>StartupMetrics/updateNetProfitMargin" method="post">
    <div class="form-group">
        <label for="">Year <span class="text-danger">*</span></label>
        <select name="year" class="form-control">
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
        <label for="">Net Profit<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="net_profit" required />
    </div>
    <div class="form-group">
        <label for="">Total Revenue<span class="text-danger">*</span></label>
        <input type="number" class="form-control my-2" name="total_revenue" required />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary my-2" value="Calculate Now" name="revenue_btn" />
    </div>
</form>
<?php 
 }
?>