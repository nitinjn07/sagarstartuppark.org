<?php if($this->session->flashdata('Success') != ''){ ?>


<div class="alert alert-success alert-dismissible" id="notification1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php 
    echo $this->session->flashdata('Success');
    ?>
</div>

<?php } ?>


<?php if($this->session->flashdata('Failed') != ''){ ?>

<div class="alert alert-danger alert-dismissible" id="notification2">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php 
    echo $this->session->flashdata('Failed');
 
    ?>
</div>

<?php } ?>