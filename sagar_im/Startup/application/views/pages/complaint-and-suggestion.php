<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Do you have a compliment, complaint or suggestion about our services?
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">

                            <div class="card-body">

                                <form action="<?=base_url();?>ComplaintAndSuggestion/Ccs" method="post">
                                    <div class="form-group py-2 my-1">
                                        <label for="">I have a ? <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="" class="radio-inline">Compliment <input type="radio"
                                                name="type_of_review" value="Compliment" required /></label>
                                        <label for="" class="radio-inline">Complaint
                                            <input type="radio" name="type_of_review" value="complaint"
                                                required /></label>
                                        <label for="" class="radio-inline">Suggestion <input type="radio"
                                                name="type_of_review" value="suggestion" required /></label>

                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="">Description of your: Compliment/Complaint/Suggestion <span
                                                class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control" name="review" required></textarea>
                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="">First Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="fname" required />
                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="">Last Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="lname" required />
                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="">Email ID <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <div class="form-group py-2 my-1">
                                        <label for="">Mobile Number <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="mobile" required />
                                    </div>
                                    <div class="form-group py-2 my-2">
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