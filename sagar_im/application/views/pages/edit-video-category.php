<?php 
  $category = $this->db->get_where('online_video_category',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>OnlineVideoCategory/updateCategory" method="post" enctype="multipart/form-data"
    id="mentor_registration">

    <div class="row mb-3 mt-3">
        <div class="col-12">
            <label class="pt-2 "> Category Name<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$category->title;?>" class="form-control" placeholder="Category Name"
                name="cat_name" />
            <input type="hidden" name="catid" value="<?=$category->id?>" />
        </div>
        <div class="col-12">
            <label class="pt-2 "> Category Description<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$category->description;?>" class="form-control" placeholder="Category Name"
                name="cat_desc" />
        </div>
        <div class="col-12">
            <label class="pt-2 "> Category Tags<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$category->cat_tags;?>" class="form-control" placeholder="Category Tags"
                name="cat_tags" />
        </div>

        <div class="col-12">
            <img src="<?=base_url('uploads/videocategory/').$category->image;?>" width="100px" height="80px" />
            <label class="pt-2 ">Image <span class='text-success'>*</span></label>
            <input type="file" class="form-control" name="cat_img" />
        </div>
        <div class="col-12 d-grid">
            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Update" />
        </div>
    </div>

</form>