<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        VC Funding
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Funding/SaveVC" method="post">
                                    <div class="form-group">
                                        <label for="">Select Startup <span class="text-danger">*</span></label>
                                        <select name="startup_id" class="form-control">
                                            <option value="">Select Startup</option>
                                            <?php
                                           $startup = $this->db->get_where('startup',array('startup_type'=>'Physical','is_graduate'=>0,'delstatus'=>1))->result(); 
                                           foreach($startup as $s)
                                           {
                                        ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php 
                                           }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">How much amount you get? <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="vc_amount" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">VC Name <span class="text-danger">*</span></label>
                                        <input type="text" name="vc_name" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pre Money Valuation <span class="text-danger">*</span></label>
                                        <input type="number" name="pre_money" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Money Valuation <span class="text-danger">*</span></label>
                                        <input type="number" name="post_money" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="vc_date" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Save Now" />
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Startup Name</th>
                                            <th>VC Amount</th>
                                            <th>VC Name</th>
                                            <th>Pre Money Valuation</th>
                                            <th>Post Money Valuation</th>
                                            <th>VC Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $vc = $this->db->get('vc_funding')->result();
                                          $i=1;
                                          foreach($vc as $v)
                                          {
                                             $st = $this->db->get_where('startup',array('id'=>$v->startup_id))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$st->startup_name;?></td>
                                            <td><?=$v->vc_amount;?></td>
                                            <td><?=$v->vc_name;?></td>
                                            <td><?=$v->pre_money;?></td>
                                            <td><?=$v->post_money;?></td>
                                            <td><?=$v->vc_date;?></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>