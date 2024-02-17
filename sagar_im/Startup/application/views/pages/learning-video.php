<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Learning
                    </h1>
                </div>
                <div class="row">
                    <form action="" method="post" style="z-index: 10;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="search" class="form-control p-3" name="search"
                                        placeholder="Search Video" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-lg py-3 w-100">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php if(isset($_POST['search']) && $_POST['search'] != ''){ ?>

                    <div class="row">

                        <?php  $jicvid = $this->load->database('videodb', TRUE); 
                                $video=$jicvid->like('title', $_POST['search'])->get_where('video_upload',array('status'=>1))->result();
                                if(!empty($video)){ 
                                  foreach($video as $v)  { ?>

                        <div class="col-md-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="text-center"><?=$v->title;?></h3>
                                </div>
                                <div class="card-body p-0">
                                    <p class="px-1"><?= substr( $v->description, 0, 20); ?>...</p>
                                    <iframe src="<?=$v->main_video;?>" width="100%" height="280px">

                                    </iframe>

                                </div>
                            </div>
                        </div>

                        <?php  } } else { ?>

                        <h1 class="text-center py-5">Data Is Empty</h1>

                        <?php } ?>

                    </div>

                    <?php } else{ ?>

                    <div class="col-md-12 mt-5">
                        <div class="row" style="margin-top:100px;">
                            <?php 
                              $jicvid = $this->load->database('videodb', TRUE);  
                              $course_type = $jicvid->get_where('course_type',array('status'=>1))->result();
                              foreach($course_type as $ct)
                              {
                            ?>
                            <div class="col-md-3" id="coursetype">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?=base_url();?>VideoList/VideoCategoryList?tid=<?=$ct->id;?>"
                                            class="h2"><?=$ct->type;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                              }
                            ?>
                        </div>

                    </div>

                    <?php } ?>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>