<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Events : <?=strtoupper($_GET['type']);?>
                    </h1>
                </div>
                <div class="row pt-3" id="event_page">
                    <?php
                      $event = $this->db->order_by('id','desc')->get_where('events',array('event_type'=>$_GET['type'],'event_status'=>'publish '))->result(); 
                      foreach($event as $evt)
                      {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="<?=base_url('../uploads/event/').$evt->event_banner;?>" id="event_img" />
                                <div class="event_price">
                                    <p class="text-white h2"><?php 
                                    $date = explode(" ",$evt->start_evt);
                                    echo date('d-m-Y',strtotime($date[0]));
                                    ?></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3>
                                    <a href='#'
                                        onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-full-event/<?= $evt->id; ?>')"><?=$evt->event_title;?></a>
                                </h3>
                                <br />
                                <span class="text-white bg-dark p-2 h5 my-1">Event Type: <?=$evt->event_mode;?></span>
                                <span class="text-white bg-warning p-2 h5 my-1">Registration Fees: <?php 
                                                            if($evt->reg_fees==0)
                                                            {
                                                                echo "Free";
                                                            }
                                                            else 
                                                            {
                                                                echo "No";
                                                            }
                                                           ?></span>

                                <p class="pt-3"><?= substr($evt->event_description,1,100)."[...]"; ?> </p>
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