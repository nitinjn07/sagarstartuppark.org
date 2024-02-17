<nav class="navbar navbar-expand navbar-theme">
    <a class="sidebar-toggle d-flex me-2">
        <i class="hamburger align-self-center"></i>
    </a>
    <h4 class="text-white"> Welcome : <?=$startup->startup_name;?> </h4> &nbsp;&nbsp;&nbsp;
    <h4 class="text-white"> Current Stage <i class="fa fa-flag text-success"></i> :
        <?= strtoupper(str_replace("_"," ",$startup->im_stage));?> </h4>
    <?php
    $onboard = $this->db->get_where('onboard_seat',array('startupid'=>$startup->id))->row(); 
    if($onboard)
    {
   ?>
    &nbsp;&nbsp;&nbsp;

    <h4 class="text-white"> On Boarding: <?= @date("d-m-Y",strtotime($onboard->on_board_date));?></i> :
    </h4>

    <h4 class="text-white"> Tentative Graduate: <?= @date("d-m-Y",strtotime($onboard->graduate_date));?></i>
    </h4>
    <?php 
    }
    ?>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown ms-lg-2">
                <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown"
                    data-bs-toggle="dropdown" aria-expanded="true">
                    <i class="align-middle fas fa-bell"></i>
                    <span class="indicator"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown"
                    data-bs-popper="none">
                    <div class="dropdown-menu-header">
                        <?= $this->db->get_where('notification',array('startupid'=>$startup->id,'is_viewed'=>0))->num_rows( ); ?>
                        New Notifications
                    </div>
                    <div class="list-group">
                        <?php
                         $not = $this->db->get_where('notification',array('startupid'=>$startup->id,'is_viewed'=>0))->result();
                          foreach($not as $n)
                          {
                        ?>
                        <a href="<?=base_url().$n->link;?>?viewed=<?=$n->id;?>" class="list-group-item">
                            <div class="row g-0 align-items-center">
                                <div class="col-2">
                                    <i class="ms-1 text-danger fas fa-fw fa-bell"></i>
                                </div>
                                <div class="col-10">

                                    <div class="text-muted small mt-1"><?=$n->message;?></div>

                                </div>
                            </div>
                        </a>
                        <?php
                          } 
                        ?>

                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="#" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>


        </ul>
    </div>
</nav>