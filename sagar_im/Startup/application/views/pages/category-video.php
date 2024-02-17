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
                        $cat = $this->db->get_where('online_video_category',array('delstatus'=>1,'id'=>$_GET['cid']))->row(); 
                        echo $cat->title;
                        ?>

                    </h1>
                </div>
                <div class="row">
                    <?php 
                     $video = $this->db->get_where('video_listing',array('vid_cid'=>$_GET['cid']))->result();
                     foreach($video as $v)
                     {
                    ?>
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?=$v->video_title;?></h3>
                            </div>
                            <div class="card-body text-center">
                                <iframe src="<?=$v->vid_link;?>" width="100%" height="250px" frameborder="0"></iframe>
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