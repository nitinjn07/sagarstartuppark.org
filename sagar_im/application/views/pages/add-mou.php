<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add MoU
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>MoU/addMou" method="post" enctype="multipart/form-data"
                                    id="mou_upload">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">MoU Sign with <span
                                                    class="text-danger">(*)</span></label>
                                            <select class="form-control" name="type_of_org">
                                                <option value="">Select</option>
                                                <option value="investor">Investor</option>
                                                <option value="academic_institute">Academic Institute</option>
                                                <option value="mentors">Mentors</option>
                                                <option value="startup_enabler">Startup Enablers/Companies</option>
                                                <option value="others">Others</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Name of Organization <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" placeholder="Name of Organisation"
                                                name="name_of_org" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" placeholder="Mobile Number"
                                                name="mobile_no" />
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Country <span class="text-danger">(*)</span></label>
                                            <select name="country" class="countries form-control" id="countryId">
                                                <option value="">Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> State <span class="text-danger">(*)</span></label>
                                            <select name="state" class="states form-control" id="stateId"="true">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> City <span class="text-danger">(*)</span></label>
                                            <select name="city" class="cities form-control" id="cityId"="true">
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">MoU Start Date <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="date" class="form-control" placeholder="Start Date"
                                                name="start_date" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">MoU End Date <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="date" class="form-control" placeholder="End Date"
                                                name="end_date" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Respective Person Name <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="person_name"
                                                placeholder="Person Name" />
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2 ">MoU Doc <span class="text-danger">(*)</span></label>
                                            <input type="file" class="form-control" name="mou_doc" />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Add" />
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