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
                              $type = $jicvid->get_where('course_type',array('status'=>1))->row();
                              
                              echo $type->type;
                            ?>
                    </h1>
                </div>
                <div class="row" style="margin-top:250px;">


                    <?php 
                          
                          $course_category = $jicvid->get_where('course_category',array('tid'=>$_GET['tid'],'status'=>1))->result();
                          foreach($course_category as $cc)
                          {
                        ?>
                    <div class="col-2" id="coursetype">
                        <div class="card">
                            <div class="card-body">
                                <a class="h3"
                                    href="<?=base_url();?>VideoList/VideoCategorySublist?cid=<?=$cc->id;?>"><?=$cc->category_name;?></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                          }
                        ?>




                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>