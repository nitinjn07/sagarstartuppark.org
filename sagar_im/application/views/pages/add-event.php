<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<style>
.add {
    display: none;
}

.remove {
    display: none;
}
</style>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Event
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Event/addEvent" method="post"
                                    enctype="multipart/form-data" id="mou_upload">

                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="pt-2 ">Event Type <span class="text-danger">(*)</span></label>
                                            <select class="form-control" name="evt_type" required>
                                                <option value="">Select</option>
                                                <option value="domestic">Domestic</option>
                                                <option value="global">Global</option>
                                                <option value="event_at_incubation">Event at Incubation Center</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Event Title <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" placeholder="Name of Event"
                                                name="evt_title" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Start Event Date & Time <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="datetime-local" class="form-control"
                                                placeholder="Event Start Date & Time" name="start_evt" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">End Event Date & Time <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="datetime-local" class="form-control"
                                                placeholder="Event End Date & Time" name="end_evt" required />
                                        </div>

                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <label class="form-label">Country<span class="text-danger">*</span></label>
                                            <select name="country" id="country" class="form-control">
                                                <option value="">Select Country</option>
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
                                                <option value="">Select State</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">City<span class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="">Select City</option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label for="">Event Description</label>
                                            <textarea name="evt_description" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Event Tags (Use Comma for Separation)</label>
                                            <textarea name="evt_tags" class="form-control" required></textarea>
                                        </div>
                                        <div class="col py-4">
                                            <label for="">Registration Fees</label>
                                            <input type="radio" name="reg_fees" value="1" required /> Yes
                                            <input type="radio" name="reg_fees" value="0" required /> No
                                        </div>
                                        <div class="col">
                                            <label for="">Event Mode</label>
                                            <select name="evt_mode" id="event_mode" class="form-control" required>
                                                <option value="">Select Event Mode</option>
                                                <option value="Physical">Physical</option>
                                                <option value="Virtual">Virtual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col" id="link">
                                            <label class="pt-2 "> Event Link (Registration Link/Information) <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="url" class="form-control" placeholder="Event Link"
                                                name="evt_link" required />
                                        </div>
                                        <div class="col" id="venue">
                                            <label class="pt-2 "> Event Venue <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" placeholder="Event Venue"
                                                name="evt_venue" required />
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label class="pt-2 ">Event Banner</label>
                                            <input type="file" class="form-control" name="evt_banner" required />
                                        </div>

                                        <div class="col">
                                            <label class="pt-2 ">Event Image <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="file" class="form-control" name="evt_img" required />
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

        <script>
        $(document).ready(function() {

            $('#link').hide();
            $('#venue').hide();

            $('#event_mode').on('change', function() {
                var mode = $('#event_mode').val();

                if (mode == 'Physical') {
                    $('#venue').show();
                    $('#link').hide();
                }
                if (mode == '') {
                    $('#link').hide();
                    $('#venue').hide();
                }
                if (mode == 'Virtual') {
                    $('#venue').hide();
                    $('#link').show();
                }

            });
        });
        </script>