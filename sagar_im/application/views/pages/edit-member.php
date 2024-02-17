<?php 
  $member = $this->db->get_where('screning_committe',array('id'=>$param))->row();
?>
<form action="<?= base_url();?>Screening/UpdateScreeningMember?id=<?=$member->id;?>" method="post">
    <div class="form-group">
        <label class="pt-2 pb-2">Member Name <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="name" placeholder="Enter Member Name"
            value="<?=$member->name;?>" required />
    </div>
    <div class="form-group">
        <label class="pt-2 pb-2">Member Email <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="email" placeholder="Enter Member Email" required"
            value="<?=$member->email;?>" />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Member Contact <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="contact" placeholder="Enter Member Contact" required
            value="<?=$member->contact;?>" />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Designation <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="designation" placeholder="Enter Member Designation" required
            value="<?=$member->designation;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>