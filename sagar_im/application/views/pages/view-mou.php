<?php 
  $mou = $this->db->get_where('mou',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <object data="<?=base_url('uploads/mou/').$mou->mou_doc;?>" type="application/pdf" width="100%" height="400px">
            <p>Alternative text - include a link <a href="<?=base_url('uploads/mou/').$mou->mou_doc;?>">to the PDF!</a>
            </p>
        </object>
    </div>

</div>