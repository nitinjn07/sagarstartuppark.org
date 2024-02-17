<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add New Service
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Services</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['editid']))
                                  {
                                     $id  = $_GET['editid'];
                                     $res = $this->db->get_where('services',array('id'=>$id))->row();
                                 ?>
                                <form action="<?=base_url();?>Services/ServiceUpdate" id="myform" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" name="serviceid" value="<?=$res->id;?>" />
                                        <label for="">Service Name</label>
                                        <input type="text" value="<?= $res->service_name; ?>" class="form-control"
                                            name="service_name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Description</label>
                                        <textarea id="editor" name="description"
                                            required><?= $res->service_description; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="service_icon" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <img src="<?=base_url('uploads/service_icon/').$res->service_img;?>"
                                            width="50px" height="50px" />
                                    </div>
                                    <div class="form-group">

                                        <input type="submit" id="addservice" value="Update Service"
                                            class="btn btn-primary btn-block mt-3" />
                                    </div>
                                </form>
                                <?php
                                  } 
                                  else 
                                  {
                                 ?>
                                <form action="<?=base_url();?>Services/NewServices" id="myform" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Service Name</label>
                                        <input type="text" class="form-control" name="service_name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Service Description</label>
                                        <textarea id="editor" name="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="service_icon" class="form-control" required />
                                    </div>
                                    <div class="form-group">

                                        <input type="submit" id="addservice" class="btn btn-primary btn-block mt-3" />
                                    </div>
                                </form>
                                <?php
                                  }
                                ?>


                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" id="datatables-buttons">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Service Image</th>
                                            <th>Service Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = $this->db->get_where('services',array('status'=>1))->result(); 
                                        $i=1;
                                        foreach($res as $r)
                                        {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><img src="<?=base_url('uploads/service_icon/').$r->service_img;?>"
                                                    width="50px" height="50px" />
                                            </td>
                                            <td><?=$r->service_name;?></td>
                                            <td>
                                                <a href="<?=base_url();?>Services/DeleteService?delid=<?=$r->id;?>"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash btn btn-danger"></i></a>
                                                <a href="<?=base_url(); ?>Services?editid=<?=$r->id;?>"><i
                                                        class="fa fa-edit btn btn-warning"></i></a>
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
        window.onload = function() {
            document.getElementById('addservice').onclick = function() {
                document.getElementById('myform').submit();
                return false;
            };
        };
        </script>
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