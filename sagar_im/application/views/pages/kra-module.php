<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        KRA MODULE
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if(isset($_GET['editid']))
                                {
                                    $id = $_GET['editid'];
                                    $kra_mod=$this->db->get_where('kra_module',array('delstatus'=>1,'id'=>$id))->row();
                            ?>
                                <form action="<?=base_url();?>KraModule/Update" method="post">
                                    <div class="form-group">
                                        <label for="" class="py-2">Module Name</label>
                                        <input type="hidden" name="moduleid" value="<?=$id;?>" />
                                        <input type="text" name="module_name" class="form-control"
                                            placeholder="Module Name" value="<?=$kra_mod->module_name;?>" required />

                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Update" />
                                    </div>
                                </form>
                                <?php
                                } 
                                else 
                                {
                              ?>
                                <form action="<?=base_url();?>KraModule/Save" method="post">
                                    <div class="form-group">
                                        <label for="" class="py-2">Module Name</label>
                                        <input type="text" name="module_name" class="form-control"
                                            placeholder="Module Name" required />

                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>
                                </form>
                                <?php } ?>



                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered" id="datatables-buttons">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Module Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                  $module = $this->db->get_where('kra_module',array('delstatus'=>1))->result(); 
                                  $i=1;
                                  foreach($module as $m)
                                  {

                                  
                                ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$m->module_name;?></td>
                                            <td>
                                                <a href="<?=base_url();?>KraModule/delete?delid=<?=$m->id?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="<?=base_url();?>KraModule?editid=<?=$m->id;?>"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>

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