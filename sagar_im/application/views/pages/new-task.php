<?php 
  $k = $this->db->get_where('set_kra',array('id'=>$param))->row();
?>
<div class="row">
    <form method="post" action="<?=base_url();?>SetKRA/addKraTask">
        <div class="form-group col-md-12">
            <label>Task Name</label>
            <input type="text" class="form-control" name="taskname" />
            <input type="hidden" class="form-control" name="startupid" value="<?=$k->startupid;?>" />
            <input type="hidden" class="form-control" name="kraid" value="<?=$k->id;?>" />
        </div>
        <div class="form-group col-md-12">
            <label>Start Date</label>
            <input type="date" class="form-control" name="start_date" />
        </div>
        <div class="form-group col-md-12">
            <label>Tentative End Date</label>
            <input type="date" class="form-control" name="end_date" />
        </div>

        <div class="form-group col-md-12">
            <label>Help Need From Incubation Center</label>
            <textarea class="form-control" name="help_incubation"> </textarea>
        </div>
        <div class="form-group col-md-12">
            <label>Task Owner</label>
            <textarea class="form-control" name="task_owener"> </textarea>
        </div>
        <div class="form-group col-md-12">
            <label>Plan to complete this task</label>
            <textarea class="form-control" name="plan_to_complete"> </textarea>
        </div>
        <div class="form-group col-md-12">
            <label>Remark</label>
            <textarea class="form-control" name="remark"> </textarea>
        </div>
        <div class="form-group col-md-12 mt-4 mb-2">
            <input type="submit" class="btn btn-primary" />
        </div>
    </form>


</div>