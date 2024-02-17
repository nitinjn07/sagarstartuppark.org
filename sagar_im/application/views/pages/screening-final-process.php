<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Screening Final Process
                    </h1>
                </div>
                <div class="row">
                    <?php
              $scr = $this->db->get_where('screening_schedule',array('id'=>$_GET['id']))->row(); 
              $startup = explode("|",$scr->startup_id);
              foreach($startup as $s)
              {
                   $st = $this->db->get_where('startup',array('id'=>$s))->row();
            ?>
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <?php
                                   if($st->logo!="")
                                   {
                                ?>
                                        <img src="<?=base_url('uploads/logo/').$st->logo;?>" class="img-fluid" />
                                        <?php
                                   } 
                                   else 
                                   {
                                 ?>
                                        No Image
                                        <?php 
                                   }
                                ?>

                                    </div>
                                    <div class="col-md-9">
                                        <h2><?= $st->startup_name; ?></h2>
                                        <p><?= $st->product_service_summary; ?></p>
                                        <a href="javascript:void(0)"
                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-startup/<?= $st->id; ?>')">View
                                            Details</a>
                                        <br /><br />
                                        <?php 
                                            $status = $this->db->get_where('startup',array('is_screened'=>1,'id'=>$st->id));
                                            if($status->num_rows()==0)
                                            {
                                        ?>
                                        <a class="btn btn-success"
                                            href="<?=base_url();?>Screening/accept_screening_process?startupid=<?=$st->id;?>&&scheduleid=<?=$scr->id;?>">Accept</a>

                                        <a class="btn btn-danger"
                                            href="<?=base_url();?>Screening/reject_screening_process?startupid=<?=$st->id;?>&&scheduleid=<?=$scr->id;?>">Reject</a>
                                        <?php 
                                            }
                                            else 
                                            {

                                                $detail = $this->db->get_where('screening_status',array('startup_id'=>$st->id))->row();
                                          ?>
                                        <table class='table table-bordered table-striped'>
                                            <tr>
                                                <td>Screening Status</td>
                                                <td><?=$detail->screening_status;?></td>
                                            </tr>
                                            <tr>
                                                <td>Screening Date</td>
                                                <td><?=$detail->datetime;?></td>
                                            </tr>
                                            <tr>
                                                <td>Screening Done By</td>
                                                <td>
                                                    <?php
                                                
                                                     $scheduleid = $detail->scheduleid;
                                                     $sch_detail = $this->db->get_where('screening_schedule',array('id'=>$scheduleid))->row();
                                                     $member = $this->db->get_where('screning_committe',array('id'=>$sch_detail->member_id))->row();
                                                     echo $member->name." | ".$member->contact." | ".$member->email;
                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Screening Remark</td>
                                                <td><?=$detail->screening_remark;?></td>
                                            </tr>
                                            <tr>
                                                <td>Incubation Period</td>
                                                <td><?=$detail->incubation_period;?></td>
                                            </tr>
                                            <tr>
                                                <td>Stage</td>
                                                <td><?= strtoupper(str_replace("_"," ",$detail->stage));?></td>
                                            </tr>
                                            <tr>
                                                <td>Startup Type</td>
                                                <td><?=$detail->startup_type;?></td>
                                            </tr>
                                        </table>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>