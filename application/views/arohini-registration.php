<?php include 'header.php';?>
<style>
#indu {
    height: 100px;
    margin-bottom: 80px;
}
</style>

<?php  $about = $this->Model->selectDataWhere('aboutus',array('id'=>1))->row();  ?>


<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');"
    alt="Incubation Center in Madhya Pradesh">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" id="indu">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">

                <h2 class="text-white text-left">आरोहिण</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;आरोहिणी</h1>
                <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
            </div>

        </div>
    </div>
</section>


<!-- start section -->
<section id="about" class="bg-light-gray pb-5">
    <div class="container">
        <div class="row">

            <div class="col-md-12" style="text-align:justify;">
                <div class='text-center'>

                    <a href="#"><img
                            src="<?=base_url('assets/images/arohini.png');?>" /></a>
                    <a href="<?=base_url();?>Arohini/ArohiniRegistration" target="_blank"
                        class="btn btn-warning mt-2">Register
                        Now</a>
                </div>


                <h4>Training Schedule</h4>
                <p>
                    Aarohini is an initiative of Women Entrepreneurship Development Cell under the Sagar Smart City
                    Limited SPARK Incubation Centre. Its goal is to provide training to women who are college graduates,
                    undergraduates, homemakers, or diploma holders in the essentials of starting and running a
                    successful business.
                </p>
                <p>
                    Aarohini will choose 20-25 women with the potential to become entrepreneurs and give them a 12-week
                    training program. This training will include a mix of classroom learning, hands-on practice, and
                    discussions about real-world business situations.
                </p>
                <h4>About the Programme</h4>
                <p>Many women face challenges when it comes to managing a business and dealing with aspects like
                    handling customers, communication, finding financial support, applying for loans, and promoting
                    their products or services. Access to better advice and training can benefit women who run small
                    family businesses or those who want to start their own. This training program is completely free and
                    will be led by knowledgeable experts. During this program, women participants will learn how to
                    choose the right business idea for them, understand the steps to start and manage a business, and
                    develop the knowledge and skills needed to run a successful business.
                </p>
                <h4>Eligibility</h4>

                <ul class='list-group'>
                    <li class='list-group-item'>Graduated/Undergraduate/Home Maker/SHG</li>
                    <li class='list-group-item'>No Age Limit</li>
                    <li class='list-group-item'>Women Only</li>

                </ul>

                <h4 class="pt-4">Programme Structure</h4>

                <ul class="list-group">
                    <li class='list-group-item'>Discovering your Passion and Purpose</li>
                    <li class='list-group-item'>Initial Financial Planning</li>
                    <li class='list-group-item'>Digital Literacy and Online Presence </li>
                    <li class='list-group-item'>Market Research and Competitive Analysis</li>
                    <li class='list-group-item'>Marketing and Customer Relationships</li>
                    <li class='list-group-item'>Marketing Essentials</li>
                    <li class='list-group-item'>Financial Management and Funding</li>
                    <li class='list-group-item'>Legal and Regulatory Compliances</li>
                    <li class='list-group-item'>Networking and Community Building</li>
                    <li class='list-group-item'>Time Management and Work-Life Balance</li>
                    <li class='list-group-item'>Leveraging Open and Generative AI</li>
                    <li class='list-group-item'>Expansion and Way Forward</li>
                </ul>

                <h4 class="pt-4">Methodology</h4>

                <ul class="list-group">
                    <li class='list-group-item'>Lecture</li>
                    <li class='list-group-item'>Interaction</li>
                    <li class='list-group-item'>Case Studies</li>
                    <li class='list-group-item'>Experience sharing and interaction with entrepreneurs</li>

                </ul>


                <h4 class="pt-4">Expected Outcome</h4>
                <p>With the Inputs provided in the form of Knowledge, Information and Experience sharing, the
                    participants will be able to conceive ideas, develop the idea into a product/ service, evaluate the
                    project and implement the entrepreneurial venture. </p>


                <h4>Certificate of Participation</h4>

                <p>Sagar Smart City Limited SPARK Incubation Centre will issue a certificate of participation on
                    Successful conclusion of the program.</p>

                <table class="table">
                    <tr>
                        <td class='bg-danger text-white'>Course Fees</td>
                        <td>It is a free course</td>
                    </tr>
                    <tr>
                        <td class='bg-success text-white'>Venue</td>
                        <td>incubation building old RTO Campus behind MSME Sagar, Madhya Pradesh </td>
                    </tr>
                    <tr>
                        <td class='bg-primary text-white'>Registration</td>
                        <td><a href="<?=base_url();?>Arohini/ArohiniRegistration" target="_blank"
                                class="btn btn-warning">Register Now</a></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->

<!-- end section -->
<?php include 'footer.php';?>