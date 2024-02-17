<?php 
  $schedule = $this->db->get_where('screening_schedule',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>Screening/scheduleUpdate?id=<?=$schedule->id;?>" method="post">
    <div class="row">
        <div class="col-md-6">
            <label>Title</label>
            <input type="text" value="<?=$schedule->title;?>" class="form-control" name="title"
                placeholder="Enter Title" required />
        </div>
        <div class="col-md-6">
            <label>Schedule Date</label>
            <input type="date" value="<?=$schedule->screening_date;?>" class="form-control" name="schedule_date"
                placeholder="Enter Title" required />
        </div>
    </div>
    <div class="row">

        <div class="col-md-6" class="table-responsive" style="height:600px; overflow:scroll;">
            <h4 class="mt-3 bg-primary p-1 text-white">Select Startups</h4>
            <table class="table">
                <tr>
                    <th>Checkbox</th>
                    <th>Startup Name</th>

                </tr>
                <?php 
                  $st_info = explode("|",$schedule->startup_id);

                                            $startup = $this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>0))->result();
                                            foreach($startup as $st)
                                            {
                                        ?>
                <tr>
                    <td><input type="checkbox" name="startup[]" value="<?=$st->id;?>"
                            <?php if(in_array($st->id, $st_info)){ echo "checked"; }; ?> />
                    </td>
                    <td><?= $st->startup_name; ?></td>
                </tr>
                <?php 
                                            }
                                            ?>
            </table>
        </div>
        <div class="col-md-6">
            <h4 class="mt-3 bg-primary p-1 text-white">Select Committee Member</h4>
            <table class="table">
                <tr>
                    <th>Checkbox</th>
                    <th>Member Name</th>

                </tr>
                <?php 
                 $mem_info = explode("|",$schedule->member_id);
                                            $member = $this->db->get_where('screning_committe',array('action'=>'accept','status'=>1))->result();
                                            foreach($member as $mem)
                                            {
                                        ?>
                <tr>
                    <td><input type="checkbox" name="member[]" value="<?=$mem->id;?>"
                            <?php if(in_array($mem->id, $mem_info)){ echo "checked"; }; ?> /></td>
                    <td><?= $mem->name; ?></td>
                </tr>
                <?php 
                                            }
                                            ?>
            </table>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 pt-3">
            <input type="submit" class="btn btn-primary btn-lg" value="Update" />
        </div>
    </div>

</form>