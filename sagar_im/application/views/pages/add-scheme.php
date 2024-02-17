<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Schemes / Policy
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['editid']))
                                  { 
                                    $edit = $this->db->get_where('scheme',array('id'=>$_GET['editid']))->row();
                                ?>
                                <form action="<?=base_url();?>Scheme/updateScheme?uid=<?=$edit->id;?>" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group my-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control py-2"
                                            value="<?=$edit->title;?>" placeholder="Title" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Scheme Description</label>
                                        <input type="text" name="description" class="form-control py-2"
                                            placeholder="Description" value="<?=$edit->description;?>" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Scheme Document</label>
                                        <a href="<?=base_url('uploads/scheme/').$edit->document;?>" target="_blank"><img
                                                src="<?=base_url('assets/pdficon.png');?>" width="20px"
                                                height="25px" /></a>
                                        <input type="file" name="document" class="form-control py-2" />
                                    </div>

                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save Scheme" />
                                    </div>
                                </form>
                                <?php 
                                  }
                                  else 
                                  {
                                ?>
                                <form action="<?=base_url();?>Scheme/saveScheme" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group my-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control py-2"
                                            placeholder="Category Name" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Scheme Description</label>
                                        <input type="text" name="description" class="form-control py-2"
                                            placeholder="Category Name" />
                                    </div>
                                    <div class="form-group my-2">
                                        <label>Scheme Document</label>
                                        <input type="file" name="document" class="form-control py-2" />
                                    </div>

                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save Scheme" />
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Scheme</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                      $scheme = $this->db->get_where('scheme',array('delstatus'=>1))->result();
                                      $i=1;
                                      foreach($scheme as $s)
                                      {
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><a href="<?=base_url('uploads/scheme/').$s->document;?>"
                                                    target="_blank"><img src="<?=base_url('assets/pdficon.png');?>"
                                                        width="20px" height="25px" /></a></td>
                                            <td>
                                                <?=$s->title;?>
                                            </td>
                                            <td>
                                                <?=$s->description;?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>Scheme/deleteScheme?delid=<?=$s->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="<?=base_url();?>Scheme?editid=<?=$s->id;?>"
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