<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Update Mentor
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                  $country = $this->db->get_where('countries',array('id'=>$mentor->country))->row();
                                   $state = $this->db->get_where('states',array('id'=>$mentor->state))->row();
                                    $city = $this->db->get_where('cities',array('id'=>$mentor->city))->row();
                                ?>
                                <form action="<?=base_url();?>Mentor/updateMentor?editid=<?=$mentor->id;?>"
                                    method="post" enctype="multipart/form-data">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Mentor Name </label>
                                            <input type="text" class="form-control" value="<?=$mentor->name;?>"
                                                placeholder="Mentor Name" name="name" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID</label>
                                            <input type="text" class="form-control" value="<?=$mentor->email;?>"
                                                placeholder="Email ID" name="email" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number</label>
                                            <input type="text" class="form-control" value="<?=$mentor->mobile;?>"
                                                placeholder="Mobile Number" name="mobile" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">
                                            <label class="form-label">Country<span class="text-danger">*</span></label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="<?=@$country->id;?>" selected><?=@$country->name;?>
                                                </option>
                                                <?php 
                                                  $country = $this->db->get_where('countries')->result();
                                                  foreach($country as $c)
                                                  {
                                                 ?>
                                                <option value="<?=$c->id;?>"><?=$c->name;?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">State<span class="text-danger">*</span></label>
                                            <select name="state" id="state" class="form-control">
                                                <option value="<?=$state->id;?>" selected><?=$state->name;?></option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">City<span class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="<?=$city->id;?>" selected><?=$city->name;?></option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL</label>
                                            <input type="text" class="form-control" value="<?=$mentor->linkedin_url;?>"
                                                name="linkedin" placeholder="LinkedIn URL" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Experiece</label>
                                            <input type="number" class="form-control" name="exp"
                                                placeholder="Mentorship Experiece"
                                                value="<?=$mentor->no_of_mentor_year;?>" />
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">

                                            <label class="pt-2">Experties In</label>
                                            <br />
                                            <label> <input type="checkbox" class="m-2" name="is_legal_expert" value="1"
                                                    <?php if($mentor->is_legal_expert==1){ echo "checked"; }?> />Legal
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_finance_expert"
                                                    <?php if($mentor->is_finance_expert==1){ echo "checked"; } ?>
                                                    value="1" />Finance
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_account_expert"
                                                    value="1"
                                                    <?php if($mentor->is_account_expert==1){ echo "checked"; } ?> />Account
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_marketing_expert"
                                                    value="1"
                                                    <?php if($mentor->is_marketing_expert==1){ echo "checked"; } ?> />Marketing
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_it_expert" value="1"
                                                    <?php if($mentor->is_it_expert==1){ echo "checked"; } ?> />IT
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2"
                                                    name="is_digital_marketing_expert" value="1"
                                                    <?php if($mentor->is_digital_marketing_expert==1){ echo "checked"; } ?> />Digital
                                                Marketing
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2"
                                                    name="is_business_strategy_expert" value="1"
                                                    <?php if($mentor->is_business_strategy_expert==1){ echo "checked"; } ?> />Business
                                                Strategy
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_startup_expert"
                                                    value="1"
                                                    <?php if($mentor->is_startup_expert==1){ echo "checked"; } ?> />Startup
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_softskill_expert"
                                                    value="1"
                                                    <?php if($mentor->is_softskill_expert==1){ echo "checked"; } ?> />Soft
                                                Skill
                                                Expert</label>


                                            <label> <input type="checkbox" class="m-2" name="is_hr" value="1"
                                                    <?php if($mentor->is_hr==1){ echo "checked"; } ?> />HR</label>

                                            <label> <input type="checkbox" class="m-2" name="is_social_media" value="1"
                                                    <?php if($mentor->is_social_media==1){ echo "checked"; } ?> /Social
                                                    Media</label>

                                                <label> <input type="checkbox" class="m-2" name="is_ipr" value="1"
                                                        <?php if($mentor->is_ipr==1){ echo "checked"; } ?> />IPR</label>
                                                <label> <input type="checkbox" class="m-2" name="is_global_expansion"
                                                        value="1"
                                                        <?php if($mentor->is_global_expansion==1){ echo "checked"; } ?> />Glopal
                                                    Expansion
                                                    Expert</label>

                                                <label> <input type="checkbox" class="m-2" name="is_funding_expert"
                                                        value="1"
                                                        <?php if($mentor->is_funding_expert==1){ echo "checked"; } ?> />Funding
                                                    Expert</label>

                                                <label> <input type="checkbox" class="m-2" name="is_sales_expert"
                                                        value="1"
                                                        <?php if($mentor->is_sales_expert==1){ echo "checked"; } ?> />Sales
                                                    Expert</label>

                                                <label> <input type="checkbox" class="m-2" name="is_cloud_technlogy"
                                                        value="1"
                                                        <?php if($mentor->is_cloud_technlogy==1){ echo "checked"; } ?> />Cloud
                                                    Technology</label>

                                                <label> <input type="checkbox" class="m-2" name="is_export" value="1"
                                                        <?php if($mentor->is_export==1){ echo "checked"; } ?> />Export</label>

                                                <label> <input type="checkbox" class="m-2" name="is_content" value="1"
                                                        <?php if($mentor->is_content==1){ echo "checked"; } ?> />Content
                                                </label>

                                                <label> <input type="checkbox" class="m-2" name="is_story_telling"
                                                        value="1"
                                                        <?php if($mentor->is_story_telling==1){ echo "checked"; } ?> />Stroy
                                                    telling </label>

                                                <label> <input type="checkbox" class="m-2" name="is_product_development"
                                                        value="1"
                                                        <?php if($mentor->is_product_development==1){ echo "checked"; } ?> />Product
                                                    Development </label>



                                                <label> <input type="checkbox" class="m-2" name="is_other" value="1"
                                                        <?php if($mentor->is_other==1){ echo "checked"; } ?> />Other</label>



                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Describe about you</label>
                                            <textarea class="form-control"
                                                name="summary"><?=$mentor->summary;?></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?php
                                              if($mentor->user_pic_url)
                                              { 
                                            ?>
                                            <img src="<?=base_url('uploads/mentor/').$mentor->user_pic_url; ?>"
                                                width="50px" />
                                            <?php } ?>
                                            <label class="pt-2 ">Mentor Photo </label>
                                            <input type="file" class="form-control" name="profile" />
                                        </div>
                                        <div class="col">
                                            <?php
                                             if($mentor->mou_path) 
                                             {
                                            ?>
                                            <a href="<?=base_url('uploads/mou/').$mentor->mou_path; ?>" /><i
                                                class="fa fa-file"> </i></a>
                                            <?php }?>
                                            <label class="pt-2 ">MoU ( in Pdf)</label>
                                            <input type="file" class="form-control" name="mou" />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block"
                                                value="Update" />
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>