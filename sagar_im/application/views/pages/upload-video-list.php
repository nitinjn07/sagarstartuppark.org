<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Uploaded Video List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Type</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Intro Video </th>
                                            <th>Action</th>

                                        </tr>
                                        <?php 
                                        
                                        ?>

                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           $i=1;
                                           foreach($video as $v)
                                           {
                                            $videodb = $this->load->database('videodb', TRUE); 
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td>

                                                <?php
                                                $tid = $v->tid;
                                              
                                                $where = array('id'=>$tid);
                                                $ct = $videodb->get_where('course_type',$where)->row();
                                                echo $ct->type;
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                $cid = $v->cid;

                                              
                                              
                                                $where = array('id'=>$cid);
                                                $ct = $videodb->get_where('course_category',$where)->row();
                                                echo $ct->category_name;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $subid = $v->subid;                                            
                                              
                                                $where = array('id'=>$subid);
                                                $ct = $videodb->get_where('course_sub_category',$where)->row();
                                                echo $ct->sub_cat_name;
                                                ?>
                                            </td>
                                            <td>
                                                <?=$v->title;?>
                                            </td>
                                            <td>
                                                <?=$v->description;?>
                                            </td>
                                            <td>
                                                <a href="<?=$v->intro_video;?>" class='btn btn-success'
                                                    target="_blank">Watch Video</a>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>ManageVideo/deleteVideo?delid=<?=$v->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i> </a>
                                                <a href="<?=base_url();?>ManageVideo/editVideo?editid=<?=$v->id;?>"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i> </a>
                                            </td>

                                        </tr>

                                        <?php 
                                         $i++;
                                           }
                                        ?>

                                    </tbody>
                                </table>
                                <p id="pagination"><?php echo $links; ?></p>
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