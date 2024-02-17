<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Find Startups
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header pt-3">
                                <form>
                                    <input type="text" class="form-control" placeholder="Search Startups" />
                                </form>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3 bg-light p-3 rounded">

                                        <h4>Filter By Startup Type</h4>

                                        <p><input type="checkbox" /> Physical</p>
                                        <p><input type="checkbox" /> Virtual</p>

                                        <hr />

                                        <h4>Filter By Startup Stage</h4>

                                        <p><input type="checkbox" /> Ideation</p>
                                        <p><input type="checkbox" /> Proof of Concept</p>
                                        <p><input type="checkbox" /> Beta Launched</p>
                                        <p><input type="checkbox" /> Early Revenues</p>
                                        <p><input type="checkbox" /> Steady Revenues</p>
                                        <p><input type="checkbox" /> Others</p>

                                        <h4>Filter By Startup Category</h4>

                                        <p><input type="checkbox" /> Healthcare</p>
                                        <p><input type="checkbox" /> Agriculture</p>
                                        <p><input type="checkbox" /> Information Technology</p>
                                        <p><input type="checkbox" /> Citizen Services</p>
                                        <p><input type="checkbox" /> Social Welfaire & Developement</p>
                                        <p><input type="checkbox" /> Transportation</p>
                                        <p><input type="checkbox" /> Other</p>

                                    </div>
                                    <div class="col-md-9">



                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>