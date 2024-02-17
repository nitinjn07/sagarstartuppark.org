<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Hey There! Ready to upload
                    </h1>
                </div>
                <form action="<?php echo base_url();?>ManageVideo/uploadVideo" id="startupform" method="post">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <label>Course Type :</label>
                                            <select class="form-control" name="tid" id="coursetype" required>
                                                <option value="">Select Course Type</option>


                                                <?php
                                               $videodb = $this->load->database('videodb', TRUE);
                                           $course_type =  $videodb->get_where('course_type',array('status'=>1))->result();
                                           foreach($course_type as $ct)
                                           {
                                    ?>
                                                <option value="<?=$ct->id;?>"><?=$ct->type;?></option>

                                                <?php }
                                        ?>
                                            </select>
                                        </div>

                                        <div class="col-xxl-4">
                                            <label>Category :</label>
                                            <select class="form-control" name="cid" id="coursecat" required>
                                                <option value="">Select Course Category</option>
                                            </select>
                                        </div>
                                        <div class="col-xxl-4">
                                            <label>Sub Category :</label>
                                            <select class="form-control" name="sid" id="coursesubcat" required>
                                                <option value="">Select Sub Category</option>
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
                                                    placeholder="Type here..." id="name" required="true" />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" placeholder="Type here..." required="true"
                                                    class="form-control"></textarea>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Requirement</label>
                                                <textarea name="requirement" placeholder="Type here..." required="true"
                                                    class="form-control"> </textarea>


                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>This course is for:</label>
                                                <textarea name="this_course_is_for" placeholder="Type here..."
                                                    required="true" class="form-control"></textarea>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>What you learn</label>
                                                <textarea name="what_you_learn" placeholder="Type here..."
                                                    required="true" class="form-control"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Intro Video Link</label>
                                                <input class="form-control" type="text" id="formFile" name="intro_video"
                                                    required="true">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Main Vide Link</label>
                                                <input class="form-control" type="text" id="formFile" name="main_video"
                                                    required="true">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Document File Link</label>
                                                <input class="form-control" type="text" id="formFile" name="doc_file"
                                                    required="true">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mx-auto mt-4">
                                            <input type="submit" class="btn btn-primary" value="Save Video" />
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