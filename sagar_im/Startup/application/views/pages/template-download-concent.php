<?php 
  $template  = $this->db->get_where('template_listing',array('id'=>$param))->row();
  $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
  
?>
<div class="row">
    <div class="col-md-12">

        <h1><?=$template->template_name;?></h1>
        <p><?=$template->description;?></p>

        <form action="<?=base_url();?>TemplateList/DownloadTemplate" method="post">
            <div class="form-grup">
                <label for=""><input type="checkbox" name="confirm_download" id="" required>
                    This is a sample document for your knowledge and reference only. Please change this template as per
                    your need and incubation centre or the issuing agency bears no legal or financial responsibility for
                    this document.
                </label>
            </div>
            <div class="form-group">
                <input type="hidden" name="tid" value="<?=$template->id;?>">
                <input type="hidden" name="sid" value="<?=$startup->id;?>">
            </div>
            <div class="form-group my-4 text-center">
                <input type="submit" class="btn btn-primary" value="Download" />
            </div>

        </form>


    </div>
    <div class="col-md-12 text-center">

    </div>

</div>