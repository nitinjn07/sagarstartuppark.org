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
                  $stid = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
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
                                <form action="<?=base_url();?>ServiceDetails/SendRequest" method="post">
                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <input type="text" class="form-control" name="service_name"
                                            value="<?=$s->service_name;?>" readonly />
                                        <input type="hidden" name="service_id" value="<?=$s->id;?>" />
                                        <input type="hidden" name="startup_id" value="<?=$stid->id;?>" />
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <label for="" class="pt-2 pb-2">Why you need that service ?
                                            <span class="text-danger">*</span></label>
                                        <textarea name="why_need" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <label for="" class="pt-2 pb-2">What help is needed from JIC ? <span
                                                class="text-danger">*</span></label>
                                        <textarea name="what_help" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary mt-2 mb-2">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>