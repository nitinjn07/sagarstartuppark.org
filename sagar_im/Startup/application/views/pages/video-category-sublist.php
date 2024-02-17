<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        <?php
                            $jicvid = $this->load->database('videodb', TRUE);  
                              $course_category = $jicvid->get_where('course_category',array('id'=>$_GET['cid'],'status'=>1))->row();
                              
                              echo $course_category->category_name;
                            ?>
                    </h1>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <ul class="list-group">


                            <div id="accordion">
                                <?php 
                          
                          $course_sub_category = $jicvid->get_where('course_sub_category',array('cid'=>$_GET['cid'],'status'=>1))->result();
                          $i=1;
                          foreach($course_sub_category as $csc)
                          {
                        ?>
                                <div class="card">
                                    <div class="card-header" style="border-bottom:10px solid green;">

                                        <a class="btn " data-bs-toggle="collapse" href="#collapse<?=$i;?>"
                                            style="font-size:25px;">
                                            <?=$csc->sub_cat_name;?>
                                        </a>


                                        <i class="fa fa-video"></i>
                                        (<?=$jicvid->get_where('video_upload',array('subid'=>$csc->id,'status'=>1))->num_rows();?>)

                                    </div>
                                    <div id="collapse<?=$i;?>" class="collapse" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <?php
                                                  $video=$jicvid->get_where('video_upload',array('subid'=>$csc->id,'status'=>1))->result(); 
                                                  foreach($video as $v)
                                                  {
                                                ?>
                                                <div class="col-md-4">
                                                    <div class="card shadow">
                                                        <div class="card-header">
                                                            <h3 class="p-3 text-center"><?=$v->title;?></h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <iframe src="<?=$v->main_video;?>" width="100%"
                                                                height="280px">

                                                            </iframe>

                                                        </div>
                                                        <div class="card-footer"
                                                            style="border-bottom:10px solid green;">
                                                            <p><?=$v->description;?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                 }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $i++;
                          } 
                            ?>



                            </div>
                    </div>




                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>