<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">

                <?php $stid = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row(); ?>

                <div class="header">
                    <h1 class="header-title">
                        Media Room Booking
                    </h1>
                </div>

                <div class="row">

                    <?php if($this->session->flashdata('failed') != ''){ ?>

                    <h4 class="alert alert-danger w-100 p-3">
                        <b><?= $this->session->flashdata('failed'); ?></b>
                    </h4>

                    <?php } ?>

                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <form id="myform" action="<?=base_url();?>MediaRoomBooking/SendRequest" method="post">
                                    <div class="form-group">
                                        <label>Booking Date <span class="text-danger">(*)</span></label>
                                        <input type="date" id="bookingdate" class="form-control" name="booking_date"
                                            required />

                                        <input type="hidden" name="startup_id" value="<?=$stid->id;?>" />
                                    </div>

                                    <div class="form-group pt-2 pb-2">
                                        <label for="" class="pt-2 pb-2">From Time: ( 24 Hours Format ) <span
                                                class="text-danger">(*)</span></label>
                                        <input type="time" name="from_time" class="form-control" required />
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <label for="" class="pt-2 pb-2">To Time: ( 24 Hours Format )<span
                                                class="text-danger">(*)</span></label>
                                        <input type="time" name="end_time" class="form-control" required />
                                    </div>
                                    <div class="form-group pt-2 pb-2">
                                        <label for="" class="pt-2 pb-2">Purpose for Booking <span
                                                class="text-danger">(*)</span></label>
                                        <textarea name="purpose" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="add_services" class="btn btn-primary mt-2 mb-2">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8" id="con">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Conference Hall</h3>
                            </div>
                            <div class="card-body">
                                <img src="<?=base_url('assets/img/conference.jpeg');?>" class="img-fluid" />
                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-8" id="dis">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Discussion Room</h3>
                            </div>
                            <div class="card-body">
                                <img src="<?=base_url('assets/img/discussion.jpeg');?>" class="img-fluid" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>

        <script>
        $(document).ready(function() {
            $('#con').hide();
            $('#dis').hide();
            $('#contype').on('change', function() {

                var type = $('#contype').val();

                if (type == 'Conference_Hall') {
                    $("#con").show(1000);
                    $("#dis").hide();
                }
                if (type == 'Discussion_Room') {
                    $("#dis").show(1000);
                    $("#con").hide();
                }

            });

        });
        </script>
        <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#bookingdate').attr('min', maxDate);
        });
        </script>