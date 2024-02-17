<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Template
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>TemplateList/addTemplate" method="post"
                                    enctype="multipart/form-data" id="mentor_registration">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Category<span
                                                    class='text-danger'>*</span></label></label>
                                            <select name="cid" id="" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php
                                                   $category=$this->db->get_where('template_category',array('delstatus'=>1))->result(); 
                                                   foreach($category as $c)
                                                   {                                                   
                                                ?>
                                                <option value="<?=$c->id;?>"><?=$c->title;?></option>
                                                <?php 
                                                   }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Template Name<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Category Name"
                                                name="template_name" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Description<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Template Description"
                                                name="description" required />
                                        </div>

                                        <div class="col">
                                            <label class="pt-2 ">Template File<span
                                                    class='text-success'>*</span></label>
                                            <input type="file" class="form-control" name="template_file" required />
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
                                            <th>Category</th>
                                            <th>Template Name</th>
                                            <th>Description</th>
                                            <th>Download</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $template = $this->db->get_where('template_listing',array('delstatus'=>1))->result(); 
                                         $i=1;
                                          foreach($template as $t)
                                         {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?php
                                                  $catname= $this->db->get_where('template_category',array('id'=>$t->template_catid))->row(); 
                                                  echo $catname->title;
                                                ?></td>
                                            <td><?=$t->template_name;?></td>
                                            <td><?=$t->description;?></td>
                                            <td>
                                                <a href="<?=base_url('uploads/template_file/').$t->template_file;?>"
                                                    target="_blank"><i class="fa fa-file"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>TemplateList/deleteTemplateListing?delid=<?=$t->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a class="btn btn-warning" href="javascript:void(0);"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-template-listing/<?= $t->id; ?>')"><i
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