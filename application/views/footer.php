        <!-- start footer -->

        <div class="row p-0">
            <div class="col-md-12 text-center">

                <div class="bg-dark p-4 text-white">
                    <?php
             $ip= $_SERVER['REMOTE_ADDR'];
             $data= array('ip_address'=>$ip);
            $this->db->insert('counter_table',$data);
            $q = $this->db->Query('select * from counter_table');
            $totalvisit = $q->num_rows()+5300;
             
             
            ?>
                    <b>Total Visits: <?php echo $totalvisit; ?></b>
                </div>

            </div>
        </div>

        <footer>


            <div class="footer-bottom padding-one-top padding-six-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-2 text-center text-sm-left">
                            <a href="<?=base_url();?>Home" class="footer-logo">
                                <img src="<?=base_url();?>assets/images/logo.png"
                                    data-at2x="<?=base_url();?>assets/images/logo.png" alt="Sagar"></a>
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-left">
                            <p><a href="<?=base_url();?>Faq">FAQ</a><br /><a
                                    href="<?=base_url();?>About">About</a><br /><a
                                    href="<?=base_url();?>Privacy">Privacy Policy</a>
                                <br /><?= $this->db->get_where('contact_details', array('id'=>1))->row()->copyright; ?>
                            </p>

                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right last-paragraph-no-margin">
                            <div class="row">

                                <?php $sl = $this->db->get_where('sociallinks', array('id'=>1))->row(); ?>

                                <ul class="social">
                                    <li><a href="<?=base_url();?>Search" target="_blank"><i
                                                class="fa fa-search"></i></a></li>
                                    <li><a href="<?= $sl->facebook; ?>" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?= $sl->instagram; ?>" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="<?= $sl->linkedin; ?>" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li><a href="<?= $sl->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="<?= $sl->youtube; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>

                            </div>
                            <div class="row">
                                <p>Powered by <a href="https://incubationmasters.com/" target="_blank"
                                        class=" font-weight-500">Incubation Masters</a></p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 text-center">

                <p style="font-size: 10px;"><i>The images used in the website and in the social media handles are only
                        symbolic, the actual images will replace them once the incubation center is fully
                        constructed.</i></p>
            </div>
        </footer>
        <?php include('search_bar.php');?>
        <?php include('js.php');?>
        <script>
$(document).ready(function() {
    $('#datatable').DataTable();
    $('#datatable1').DataTable();
    $('#datatable2').DataTable();
});
        </script>
        <script>
$(document).ready(function() {

    $('#country').on('change', function() {

        var country_id = $('#country').val();

        $.ajax({
            data: {
                country_id: country_id
            },
            url: "<?=base_url();?>GetCountryStateCity/getState",
            type: 'GET',
            success: function(data) {
                $("#state").html(data);

            }
        });


    });

    $('#state').on('change', function() {

        var state_id = $('#state').val();

        $.ajax({
            data: {
                state_id: state_id
            },
            url: "<?=base_url();?>GetCountryStateCity/getCity",
            type: 'GET',
            success: function(data) {
                $("#city").html(data);

            }
        });


    });

});
        </script>
        </body>

        </html>