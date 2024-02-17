<?php 
  $tid = $this->db->get_where('template_listing',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>TemplateList/updateTemplate" method="post" enctype="multipart/form-data"
    id="mentor_registration">

    <div class="row mb-3 mt-3">
        <div class="col-12">
            <input type="hidden" name="template_catid" value="<?=$tid->id;?>" />
            <label class="pt-2 "> Category<span class='text-danger'>*</span></label></label>
            <select name="cid" id="" class="form-control">
                <option value="">Select Category</option>
                <?php
                                                   $category=$this->db->get_where('template_category',array('delstatus'=>1))->result(); 
                                                   foreach($category as $c)
                                                   {                                                   
                                                ?>
                <option value="<?=$c->id;?>" <?php
                  if($tid->template_catid==$c->id){echo "selected"; } 
                ?>><?=$c->title;?></option>
                <?php 
                                                   }
                                                ?>
            </select>
        </div>
        <div class="col-12">
            <label class="pt-2 "> Template Name<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$tid->template_name;?>" class="form-control" placeholder="Category Name"
                name="template_name" required />
        </div>
        <div class="col-12">
            <label class="pt-2 "> Description<span class='text-danger'>*</span></label></label>
            <input type="text" value="<?=$tid->description;?>" class="form-control" placeholder="description"
                name="description" required />
        </div>

        <div class="col-12">
            <a href="<?=base_url('uploads/template_file/').$tid->template_file;?>" class="btn btn-info"><i
                    class="fa fa-file"></i></a>
            <label class="pt-2 ">Template File <span class='text-success'>*</span></label>
            <input type="file" class="form-control" name="template_file" />
        </div>
        <div class="col-12 d-grid">
            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Update" />
        </div>
    </div>

</form>