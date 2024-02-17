<?php 
  $vid = $this->db->get_where('video_listing',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>VideoListing/updateVideo" method="post" enctype="multipart/form-data"
    id="mentor_registration">

    <div class="row mb-3 mt-3">
        <div class="col-12">
            <input type="hidden" name="vidid" value="<?=$vid->id;?>" />
            <label class="pt-2 "> Category<span class='text-danger'>*</span></label></label>
            <select name="cid" id="" class="form-control">
                <option value="">Select Category</option>
                <?php
                                                   $category=$this->db->get_where('online_video_category',array('delstatus'=>1))->result(); 
                                                   foreach($category as $c)
                                                   {                                                   
                                                ?>
                <option value="<?=$c->id;?>" <?php
                  if($vid->vid_cid==$c->id){echo "selected"; } 
                ?>><?=$c->title;?></option>
                <?php 
                                                   }
                                                ?>
            </select>
        </div>
        <div class="col-12">
            <label class="pt-2 "> Video Title<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$vid->video_title;?>" class="form-control" placeholder="Video Title"
                name="video_title" required />
        </div>
        <div class="col-12">
            <label class="pt-2 "> Video Link<span class='text-danger'>*</span></label></label>
            <input type="url" value="<?=$vid->vid_link;?>" class="form-control" placeholder="Category Name"
                name="vid_link" required />
        </div>

        <div class="col-12">
            <img src="<?=base_url('uploads/videothumbnail/').$vid->vid_img;?>" width="100px" height="100px" />
            <label class="pt-2 ">Video Thumbnail <span class='text-success'>*</span></label>
            <input type="file" class="form-control" name="vid_img" />
        </div>
        <div class="col-12 d-grid">
            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Update" />
        </div>
    </div>

</form>