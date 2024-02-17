<?php 
 $evt = $this->db->get_where('events',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <img src="<?=base_url('../uploads/event/').$evt->event_banner;?>" id="event_img" />
    </div>
    <div class="col-md-12">
        <h2 class="pt-3"><?=$evt->event_title;?></h2>
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

        <br />
        <p class="mt-3"><?=$evt->event_description;?></p>

        <table class="table table-bordered mt-3">
            <tr>
                <td>Start Date & Time</td>
                <td><?=$evt->start_evt;?></td>
            </tr>
            <tr>
                <td>End Date & Time</td>
                <td><?=$evt->end_evt;?></td>
            </tr>
            <tr>
                <td>Event Link</td>
                <td><a href="<?php $evt->event_link;?>" target="_blank" class="btn btn-info">Click Here</a></td>
            </tr>
            <tr>
                <td>Event Location</td>
                <td>
                    <?php
                      $country = $this->db->get_where('countries',array('id'=>$evt->country))->row(); 
                      $state = $this->db->get_where('states',array('id'=>$evt->state))->row(); 
                      $city = $this->db->get_where('cities',array('id'=>$evt->city))->row(); 
                    ?>
                    <?=$evt->event_venue.",".$city->name.",".$state->name.",".$country->name;?>
                </td>
            </tr>

        </table>


    </div>
</div>