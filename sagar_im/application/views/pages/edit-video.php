<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Edit Video
                    </h1>
                </div>
                <?php
                  if(isset($_GET['editid']))
                  {
                    $videodb = $this->load->database('videodb', TRUE);
                    $where =array('id'=>$_GET['editid']);
                    $videodb = $this->load->database('videodb', TRUE); 
                    $videolist = $videodb->get_where('video_upload',$where)->row();
                  } 
                ?>
                <form action="<?php echo base_url();?>ManageVideo/UpdateVideo" id="startupform" method="post">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <label>Course Type :</label>
                                            <input type="hidden" value="<?=$videolist->id;?>" name="videolistid" />
                                            <select class="form-control" name="tid" id="coursetype" id="typeid"
                                                required>
                                                <option value="">Select Course Type</option>


                                                <?php
                                               
                                           $course_type =  $videodb->get_where('course_type',array('status'=>1))->result();
                                           foreach($course_type as $ct)
                                           {
                                    ?>
                                                <option value="<?=$ct->id;?>"
                                                    <?php if($videolist->tid==$ct->id){echo "selected";}?>>
                                                    <?=$ct->type;?></option>

                                                <?php }
                                        ?>
                                            </select>
                                        </div>

                                        <div class="col-xxl-4">
                                            <label>Category :</label>
                                            <select class="form-control" name="cid" id="coursecat" required>
                                                <option value="">Select Course Category</option>
                                                <option value="<?=$videolist->cid;?>" selected>
                                                    <?php 
                                                     $cat = $videodb->get_where('course_category',array('id'=>$videolist->cid))->row();
                                                     echo $cat->category_name;
                                                   ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-xxl-4">
                                            <label>Sub Category :</label>
                                            <select class="form-control" name="sid" id="coursesubcat" required>
                                                <option value="">Select Sub Category</option>
                                                <option value="<?=$videolist->subid;?>" selected>
                                                    <?php 
                                                     $subcat = $videodb->get_where('course_sub_category',array('id'=>$videolist->subid))->row();
                                                     echo $subcat->sub_cat_name;
                                                   ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--row internal-->
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-12">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title"
                                                    class="form-control form-control--focused"
                                                    placeholder="Type here..." id="name" required="true"
                                                    value="<?=$videolist->title;?>" />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" placeholder="Type here..." required="true"
                                                    class="form-control"><?=$videolist->description;?></textarea>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Requirement</label>
                                                <textarea name="requirement" placeholder="Type here..." required="true"
                                                    class="form-control"><?=$videolist->requirement;?></textarea>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>This course is for:</label>
                                                <textarea name="this_course_is_for" placeholder="Type here..."
                                                    required="true"
                                                    class="form-control"><?=$videolist->this_course_is_for;?></textarea>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>What you learn</label>
                                                <textarea name="what_you_learn" placeholder="Type here..."
                                                    required="true"
                                                    class="form-control"><?=$videolist->what_you_learn;?></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Intro Video Link</label>
                                                <input class="form-control" type="text" id="formFile" name="intro_video"
                                                    required="true" value="<?=$videolist->intro_video;?>">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Main Vide Link</label>
                                                <input class="form-control" type="text" id="formFile" name="main_video"
                                                    required="true" value="<?=$videolist->main_video;?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Document File Link</label>
                                                <input class="form-control" type="text" id="formFile" name="doc_file"
                                                    required="true" value="<?=$videolist->doc_file;?>">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mx-auto mt-4">
                                            <input type="submit" class="btn btn-primary" value="Update Information" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </form>
            </div>
    </div>
</div>

</div>
</div>
</main>

<?=include('common/footer.php');?>
<script type="text/javascript">
$(document).ready(function() {


    $('#coursetype').on('change', function() {

        var typid = $('#coursetype').val();

        $.ajax({
            type: "POST",
            url: '<?=base_url();?>ManageCategory/getCategory',
            data: {
                "typeid": typid
            },
            success: function(data) {
                $('#coursecat').html(data);
            }
        });

    });


    $('#coursecat').on('change', function() {

        var cid = $('#coursecat').val();

        $.ajax({
            type: "POST",
            url: '<?=base_url();?>ManageCategory/getSubCategory',
            data: {
                "cid": cid
            },
            success: function(data) {
                $('#coursesubcat').html(data);

            }
        });

    });





});
</script>