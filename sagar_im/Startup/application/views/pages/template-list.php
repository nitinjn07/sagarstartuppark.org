<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
s
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Downloadable Documents/Templates
                    </h1>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form class="form-inline" action="<?=base_url();?>TemplateList" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search Here"
                                                    name="search_term" />
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <input type="submit" value="Search" class="btn btn-primary" />
                                            </div>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="card" id="accordionExample">
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['search_term']))
                                  {
                                ?>
                                <div class="accordion">
                                    <?php $download = $this->db->get_where('template_category',array('delstatus'=>1))->result(); foreach($download as $d) {  ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?=$d->id;?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?=$d->id;?>" aria-expanded="true"
                                                aria-controls="collapse<?=$d->id;?>">
                                                <?=strtoupper($d->title);?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?=$d->id;?>" class="accordion-collapse collapse show"
                                            aria-labelledby="heading<?=$d->id;?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <?php  $tp = $this->db->like('template_name',$_GET['search_term'])->get_where('template_listing',array('template_catid'=>$d->id))->result(); foreach($tp as $t) { ?>

                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-header text-center">
                                                                <h3><?php echo $t->template_name; ?></h3>
                                                                <p><?=$t->description;?></p>
                                                            </div>
                                                            <div class="card-body">


                                                                <!-- <a href='#'
                                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/template-download-concent/<?= $t->id; ?>')">
                                                                    <i
                                                                        class="fa fa-download btn btn-primary w-100 py-2"></i>
                                                                </a> -->
                                                                <a href='<?=base_url('../uploads/template_file/').$t->template_file;?>'
                                                                    download>
                                                                    <i
                                                                        class="fa fa-download btn btn-primary w-100 py-2"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php   } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>

                                <?php
                                  } 
                                  else 
                                  {
                                ?>
                                <div class="accordion">
                                    <?php $download = $this->db->get_where('template_category',array('delstatus'=>1))->result(); foreach($download as $d) {  ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading<?=$d->id;?>">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?=$d->id;?>" aria-expanded="true"
                                                aria-controls="collapse<?=$d->id;?>">
                                                <?=strtoupper($d->title);?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?=$d->id;?>" class="accordion-collapse collapse"
                                            aria-labelledby="heading<?=$d->id;?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <?php  $tp = $this->db->get_where('template_listing',array('template_catid'=>$d->id))->result(); foreach($tp as $t) { ?>

                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-header text-center">
                                                                <h3><?php echo $t->template_name; ?></h3>
                                                                <p><?=$t->description;?></p>
                                                            </div>
                                                            <div class="card-body">

                                                                <a href='<?=base_url('../uploads/template_file/').$t->template_file;?>'
                                                                    download>
                                                                    <i
                                                                        class="fa fa-download btn btn-primary w-100 py-2"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php   } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  } ?>
                                </div>
                                <?php 
                                  } 
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>