<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Resource Category
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['editid']))
                                  { 
                                    $edit = $this->db->get_where('resource_category',array('id'=>$_GET['editid']))->row();
                                ?>
                                <form action="<?=base_url();?>Resources/updateCategory?uid=<?=$edit->id;?>"
                                    method="post" enctype="multipart/form-data">

                                    <div class="form-group my-2">
                                        <label>Category Name</label>
                                        <input type="text" name="cat_name" class="form-control py-2"
                                            placeholder="Category Name" value="<?=$edit->cat_name;?>" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Category Image</label>
                                        <br />
                                        <br />
                                        <img src="<?=base_url('uploads/resource_category/').$edit->cat_image;?>"
                                            width="50px" height="50px" />
                                        <br />
                                        <input type="file" name="cat_image" class="form-control py-2" />
                                    </div>

                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Update Category" />
                                    </div>
                                </form>
                                <?php 
                                  }
                                  else 
                                  {
                                ?>
                                <form action="<?=base_url();?>Resources/saveCategory" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group my-2">
                                        <label>Category Name</label>
                                        <input type="text" name="cat_name" class="form-control py-2"
                                            placeholder="Category Name" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Category Image</label>
                                        <input type="file" name="cat_image" class="form-control py-2" />
                                    </div>

                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save Category" />
                                    </div>
                                </form>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Category Image</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                      $category = $this->db->get_where('resource_category',array('delstatus'=>1))->result();
                                      $i=1;
                                      foreach($category as $c)
                                      {
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><img src="<?=base_url('uploads/resource_category/').$c->cat_image;?>"
                                                    width="50px" height="50px" /></td>
                                            <td>
                                                <?=$c->cat_name;?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>Resources/deleteCategory?delid=<?=$c->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="<?=base_url();?>Resources/Category?editid=<?=$c->id;?>"
                                                    class="btn btn-success"><i class="fa fa-edit"></i></a>
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