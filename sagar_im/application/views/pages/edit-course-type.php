
<?php 
   $videodb = $this->load->database('videodb', TRUE);
  $type = $videodb->get_where('course_type',array('id'=>$param))->row();
?>
<h2>Edit Course Type</h2>
<form action="<?=base_url();?>ManageCategory/updateCourseType" method="post"
enctype="multipart/form-data" id="invester_reg">

<div class="form-group mt-2 mb-2">
<input type="hidden" name="typeid" value="<?=$param;?>">    
<label> Course Type</label>
<input type="text" class="form-control" name="coursetype" value="<?=$type->type;?>"/>

</div>
<div class="form-group mt-2 mb-2">
<label>Slug</label>
<input type="text" class="form-control" name="slug" value="<?=$type->slug;?>"/>
</div>
<div class="form-group mt-2 mb-2">
<input type="submit" class="btn btn-primary" value="Save" />
</div>

</form>