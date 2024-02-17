<form action="<?=base_url();?>AcceptedApplication/AddFounder" method="post">
    <div class="form-group">
        <label class="pt-2 pb-2">Startup ID<span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="startup_id" value="<?=$param;?>" readonly />
    </div>
    <div class="form-group">
        <label class="pt-2 pb-2">Founder Name <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderName" placeholder="Founder Name" required />
    </div>
    <div class="form-group">
        <label class="pt-2 pb-2">Email <span class='text-danger'>(*)</span></label>
        <input type="email" class="form-control pb-2" name="founderEmail" required" />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Contact <span class='text-danger'>(*)</span></label>
        <input type="number" minlength="10" maxlength="10" class="form-control pb-2" name="founderMobile" required />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Gender <span class='text-danger'>(*)</span></label>
        <select class="form-control" name="founderGender">
            <option>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Background <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderBackground" required />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Education <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderEducation" required />
    </div>
    <div class="form-group mt-2 mb-2">
        <input type="submit" class="btn btn-primary" value="Add">
    </div>
</form>