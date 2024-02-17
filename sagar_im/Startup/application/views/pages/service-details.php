<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <?php
                  $id = $_GET['service_id']; 
                  $s = $this->db->get_where('services',array('id'=>$id))->row();
                ?>
                <div class="header">
                    <h1 class="header-title">
                        <?=$s->service_name;?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <p> <?=$s->service_description;?></p>
                            </div>
                            <div class="card-footer">
                                <a href="<?=base_url(); ?>ServiceDetails/ServiceRequest?service_id=<?=$s->id;?>"
                                    class="btn btn-success">APPLY
                                    FOR
                                    THIS SERVICE</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>