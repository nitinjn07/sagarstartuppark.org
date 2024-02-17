<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Manage Categories
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h2>Course Type</h2>

                                <form action="<?=base_url();?>ManageCategory/addCourseType" method="post"
                                    enctype="multipart/form-data" id="invester_reg">

                                    <div class="form-group mt-2 mb-2">
                                        <label>Course Type</label>
                                        <input type="text" class="form-control" name="coursetype"
                                            placeholder="Enter Course Type" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            placeholder="ex: abcd-pqrs" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($course_type as $ct)
                                           {
                                    ?>
                                    <tr>
                                        <td><?=$ct->type;?></td>
                                        <td><?=$ct->slug;?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm"
                                                onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-course-type/<?= $ct->id; ?>')"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="<?=base_url();?>ManageCategory/deleteCourseType?id=<?= $ct->id; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete');"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                         ?>
                                </table>
                                <p id=" pagination"><?php echo $links; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h2>Category</h2>
                                <form action="<?=base_url();?>ManageCategory/addCategory" method="post"
                                    enctype="multipart/form-data" id="invester_reg">

                                    <div class="form-group mt-2 mb-2">
                                        <label>Course Type</label>
                                        <select name="typeid" class="form-control">
                                            <option value=""> Choose Course Type </option>

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
                                    <div class="form-group mt-2 mb-2">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" placeholder="Enter Category"
                                            class="form-control" />

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" name="slug"
                                            placeholder="ex abcd-pqrs" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Course Type</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($course_category as $cc)
                                           {
                                    ?>
                                    <tr>
                                        <td><?php 
                                            $type = $videodb->get_where('course_type',array('id'=>$cc->tid))->row();
                                            echo  $type->type;
                                         ?></td>

                                        <td>
                                            <?=$cc->category_name;?>
                                        </td>
                                        <td><?=$cc->slug;?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="btn btn-warning btn-sm"
                                                onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-course-category/<?= $cc->id; ?>')"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="<?=base_url();?>ManageCategory/deleteCourseCategory?id=<?= $cc->id; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete');"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                ?>
                                </table>
                                <p id=" pagination"><?php echo $links; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <h2>Sub Category</h2>
                                <form action="<?=base_url();?>ManageCategory/addSubCategory" method="post"
                                    enctype="multipart/form-data" id="invester_reg">

                                    <div class="form-group mt-2 mb-2">
                                        <label>Course Type</label>
                                        <select name="typeid" class="form-control" id="coursetype">
                                            <option value=""> Choose Course Type </option>

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
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Course Type</th>
                                        <th>Category Name</th>
                                        <th>SubCategory Name</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($course_sub_category as $csc)
                                           {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php 
                                            $type = $videodb->get_where('course_type',array('id'=>$csc->tid))->row();
                                            echo  $type->type;
                                         ?>
                                        </td>
                                        <td>
                                            <?php 
                                            $category = $videodb->get_where('course_category',array('id'=>$csc->cid))->row();
                                            echo  $category->category_name;
                                         ?>
                                        </td>
                                        <td>
                                            <?=$csc->sub_cat_name;?>
                                        </td>
                                        <td>
                                            <?=$csc->slug;?>
                                        </td>
                                        <td>

                                            <a href="<?=base_url();?>ManageCategory/deleteSubCategory?id=<?= $csc->id; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure to delete');"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                ?>
                                </table>
                                <p id=" pagination"><?php echo $links; ?></p>
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
                        $('#catid').html(data);
                    }
                });

            });

        });
        </script>