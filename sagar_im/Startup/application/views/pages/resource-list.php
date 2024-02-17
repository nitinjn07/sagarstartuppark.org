<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Free Resource List
                    </h1>
                </div>
                <div class="row">
                    <?php
                     $res = $this->db->get_where('resource_category',array('delstatus'=>1))->result(); 
                     if($res)
                     {
                     foreach($res as $r)
                     {
                    ?>
                    <div class="col-xxl-2">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><?= $r->cat_name;?></h3>
                            </div>
                            <div class="card-body">
                                <img src="<?=base_url('../uploads/resource_category/').$r->cat_image;?>" width="100%"
                                    height="80px" />

                            </div>
                            <div class="card-footer text-center">
                                <a href="<?=base_url();?>Resources/ResourceSoftwareList?catid=<?=$r->id;?>"
                                    class="btn btn-primary">Check
                                    the list</a>

                            </div>
                        </div>
                    </div>
                    <?php 
                     }
                    }
                    else 
                    {
                        echo "No Category Found";
                    }
                    ?>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>