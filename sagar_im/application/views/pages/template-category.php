<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Template Category
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>TemplateCategory/addCategory" method="post"
                                    enctype="multipart/form-data" id="mentor_registration">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Category Name<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Category Name"
                                                name="cat_name" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Category Description<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Category Name"
                                                name="cat_desc" required />
                                        </div>

                                        <div class="col">
                                            <label class="pt-2 ">Image <span class='text-success'>*</span></label>
                                            <input type="file" class="form-control" name="cat_img" required />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Add" />
                                        </div>
                                    </div>

                                </form>


                                <table id="datatables-buttons" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SNO.</th>
                                            <th>Category Image</th>
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $category = $this->db->get_where('template_category',array('delstatus'=>1))->result(); 
                                         $i=1;
                                          foreach($category as $cat)
                                         {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><img src="<?=base_url('uploads/template_category/').$cat->image;?>"
                                                    width="100px" height="80px" /></td>
                                            <td><?=$cat->title;?></td>
                                            <td><?=$cat->description;?></td>
                                            <td>
                                                <a href="<?=base_url();?>TemplateCategory/deleteCategory?delid=<?=$cat->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a class="btn btn-warning" href="javascript:void(0);"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-template-category/<?= $cat->id; ?>')"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                          $i++;
                                         }
                                         ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables with Buttons
            var datatablesButtons = $("#datatables-buttons").DataTable({
                responsive: true,
                buttons: ["copy", "print"],
                fixedHeader: true,
                bPaginate: false,
                bInfo: false
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
        });
        </script>