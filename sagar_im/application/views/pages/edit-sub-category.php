
<?php 
   $videodb = $this->load->database('videodb', TRUE);
  $subcat = $videodb->get_where('course_sub_category',array('id'=>$param))->row();
?>
<h2>Edit Sub Category</h2>
<form action="<?=base_url();?>ManageCategory/addSubCategory" method="post"
                                    enctype="multipart/form-data" id="invester_reg">
                                  
                                      <div class="form-group mt-2 mb-2">
                                        <label>Course Type</label>
                                        <select name="typeid" class="form-control" id="coursetype">
                                            <option value=""> Choose Course Type </option>
                                            
                                              <?php
                                              
                                           $course_type =  $videodb->get_where('course_type',array('status'=>1))->result();

                                           foreach($course_type as $ct)
                                           {
                                    ?>
                                            <option value="<?=$ct->id;?>" <?php if($ct->id==$subcat->tid){ echo "selected"; }?>><?=$ct->type;?></option>
                                            
                                        <?php }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Category</label>
                                        <select class="form-control" name="cid" id="catid">

                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Sub Category</label>
                                        
                                        <input type="text" class="form-control" name="subcat" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>

                                </form>

                              
