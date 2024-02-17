<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Online Video Category
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>VideoListing/addVideo" method="post"
                                    enctype="multipart/form-data" id="mentor_registration">

                                    <div class="row mb-3 mt-3">
                                        <div class="col-12">
                                            <label class="pt-2 "> Video Title<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Video Title"
                                                name="vid_title" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Category<span
                                                    class='text-danger'>*</span></label></label>
                                            <select name="cid" id="" class="form-control">
                                                <option value="">Select Category</option>
                                                <?php
                                                   $category=$this->db->get_where('online_video_category',array('delstatus'=>1))->result(); 
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
                                            <label class="pt-2 "> Video Link<span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="url" class="form-control" placeholder="Category Name"
                                                name="vid_link" required />
                                        </div>

                                        <div class="col">
                                            <label class="pt-2 ">Video Thumbnail <span
                                                    class='text-success'>*</span></label>
                                            <input type="file" class="form-control" name="vid_img" required />
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
                                            <th>Video Title</th>
                                            <th>Video Image</th>
                                            <th>Video Link</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $video = $this->db->get_where('video_listing',array('delstatus'=>1))->result(); 
                                         $i=1;
                                          foreach($video as $v)
                                         {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?= $v->video_title;?></td>
                                            <td><img src="<?=base_url('uploads/videothumbnail/').$v->vid_img;?>"
                                                    width="100px" height="80px" /></td>
                                            <td><?=$v->vid_link;?></td>
                                            <td>
                                                <?php
                                                  $catname= $this->db->get_where('online_video_category',array('id'=>$v->vid_cid))->row(); 
                                                  echo $catname->title;
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>VideoListing/deleteVideoListing?delid=<?=$v->id;?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a class="btn btn-warning" href="javascript:void(0);"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-video-listing/<?= $v->id; ?>')"><i
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