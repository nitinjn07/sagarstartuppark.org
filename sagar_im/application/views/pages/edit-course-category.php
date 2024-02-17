
<?php 
   $videodb = $this->load->database('videodb', TRUE);
  $category = $videodb->get_where('course_category',array('id'=>$param))->row();
?>
<h2>Edit Course Category</h2>
<form action="<?=base_url();?>ManageCategory/updateCourseCategory" method="post"
enctype="multipart/form-data" id="invester_reg">

<div class="form-group mt-2 mb-2">
   <input type="hidden" name="catid" value="<?=$category->id; ?>">
<label>Course Type</label>
<select name="typeid" class="form-control">
<option value=""> Choose Course Type </option>

<?php
$videodb = $this->load->database('videodb', TRUE);
$course_type =  $videodb->get_where('course_type',array('status'=>1))->result();
foreach($course_type as $ct)
{
?>
<option value="<?=$ct->id;?>" <?php if($ct->id==$category->tid){ echo "selected"; } ?>><?=$ct->type;?></option>

<?php }
?>
</select>
</div>
<div class="form-group mt-2 mb-2">
<label>Category Name</label>
<input type="text" name="category_name" value="<?=$category->category_name;?>" placeholder="Enter Category" class="form-control"/>

</div>
<div class="form-group mt-2 mb-2">
<label>Slug</label>
<input type="text" class="form-control" name="slug" value="<?=$category->slug;?>" placeholder="ex abcd-pqrs" />
</div>
<div class="form-group mt-2 mb-2">
<input type="submit" class="btn btn-primary" value="Update" />
</div>

</form>