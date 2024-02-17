<?php 
  $kratask = $this->db->get_where('tempkra_task',array('id'=>$param))->row();

  $task_info=$this->db->get_where('kra_module_task',array('id'=>$kratask->taskid))->row();
  $module_info=$this->db->get_where('kra_module',array('id'=>$kratask->moduleid))->row();
  $kra=$this->db->get_where('set_kra',array('id'=>$kratask->kraid))->row();
  $team = $this->db->get_where('team_member',array('startup_id'=>$task_info->startupid))->row();
   
  
  
?>
<div class="row">
    <div class="col-md-12">
        <h3>Review The Task</h3>
        <table class="table">
            <tr>
                <th>SNo.</th>
                <th>Module</th>
                <th>Task</th>


            </tr>

            <tr>
                <td>1.</td>
                <td><?=$module_info->module_name;?></td>
                <td><?=$task_info->task_name;?></td>


            </tr>
        </table>
        <form action="<?=base_url();?>KraModule/ReviewTask" method="post">
            <div class="form-group py-2">
                <label for="">
                    <h5>4.Who will do this task</h5>
                </label>
                <select class="form-control" name="teamid">
                    <option value="">Select Task</option>

                    <option value="<?=$team->id;?>" selected><?=$team->name;?></option>
                    <?php
                      $member=$this->db->get_where('team_member',array('startup_id'=>$task_info->startupid))->result(); 
                      foreach($member as $m)
                      {
                    ?>
                    <option value="<?=$m->id;?>"><?=$m->name;?></option>

                    <?php 
                      }
                    ?>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">

                <label for="" class="py-2">Review Date</label>
                <input type="date" name="review_date" class="form-control py-2" value="<?=@$kratask->review_date;?>"
                    required />
                <input type="hidden" name="taskid" value="<?=$kratask->id;?>" />
                <input type="hidden" name="kraid" value="<?=$kra->id;?>" />
            </div>
            <div class="form-group">

                <label for="" class="py-2">Review By</label>
                <input type="text" name="review_by" value="<?=@$kratask->review_by;?>" class="form-control py-2"
                    required />

            </div>
            <div class="form-group">

                <label for="" class="py-2">Comment</label>
                <textarea name="comment" class="form-control" placeholder="Write Comment for this task"
                    required><?=$kratask->comment;?></textarea>

            </div>
            <div class="form-group">

                <label for="" class="py-2">Task Status</label>
                <select name="task_status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="open" <?php if($kratask->task_status=='open'){echo "selected";}?>>Open</option>
                    <option value="closed" <?php if($kratask->task_status=='closed'){echo "selected";}?>>Closed</option>
                    <option value="workinprogress"
                        <?php if($kratask->task_status=='workinprogress'){echo "selected";}?>>Work In Progress</option>
                    <option value="assigned" <?php if($kratask->task_status=='assigned'){echo "selected";}?>>Assigned
                    </option>
                    <option value="cancelled" <?php if($kratask->task_status=='cancelled'){echo "selected";}?>>Cancelled
                    </option>

                </select>

            </div>
            <div class="form-group pt-3">
                <input type="submit" class="btn btn-primary" value="Save & Lock" />
            </div>
        </form>
    </div>
</div>