<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Accept Screening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Screening/ScreeningProcess" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="startupid" value="<?=$_GET['startupid'];?>" />
                                    <input type="hidden" name="scheduleid" value="<?=$_GET['scheduleid'];?>" />
                                    <div class="form-group mt-2 mb-2">
                                        <label class="mt-2 mb-2">Startup Type</label>
                                        <select class="form-control" name="type" required>
                                            <option value="">Select Startup Type</option>
                                            <option value="Physical">Physical</option>
                                            <option value="Virtual">Virtual</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label class="mt-2 mb-2">Startup Stage</label>
                                        <select class="form-control" name="stages" required>
                                            <option value="">Select Startup Stages</option>
                                            <option value="concept_ideation">Concept/Ideation</option>
                                            <option value="customer_discovery">Customer Discovery</option>
                                            <option value="idea_validation">Idea Validation</option>
                                            <option value="minimum_viable_product">Minimum Viable Product</option>
                                            <option value="product_market_fit">Product/Market Fit</option>
                                            <option value="growth_establishment_and_scale_up">Growth Establishment and
                                                Scale Up</option>
                                            <option value="maturity_and_possible_exit">Maturity and Possible Exit
                                            </option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label class="mt-2 mb-2">Incubation Period</label>
                                        <select class="form-control" name="period" required>
                                            <option value="">Select Incubation Period</option>
                                            <option value="6">6 Month</option>
                                            <option value="9">9 Month</option>
                                            <option value="12">12 Month</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label class="mt-2 mb-2">Upload Review PDF</label>
                                        <input type="file" class="form-control" name="screening_doc" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label class="mt-2 mb-2">Remark</label>
                                        <textarea class="form-control" name="remark"
                                            placeholder="Write remark by screening committee" required></textarea>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Submit Now" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>