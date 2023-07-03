
<footer>
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <img src="assets/images/logoblack.png" alt="logo">
                    <p style="padding-top: 2.2rem;">912, Techno IT Park, New Link Rd, Borivali West, Mumbai - 400092</p> 
                    <div class="social_icon">
                        <!-- <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a> -->
                        <a title="Linked In" href="https://in.linkedin.com/company/credmudra"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <!--                     <div class="social-icons"></div> -->
                </div>
                <div class="col-md-6 col-lg-3">
                    <h3>Services</h3>
                    <ul class="m-0">
                        <li><a href="personal-loan.php">Personal Loan</a></li>
                        <li><a href="business-loan.php">Business Loan</a></li>
                        <li><a href="education-loan.php">Education Loan</a></li>   
                        <li><a href="debt-consolidation.php">Personal Loan for Debt Consolidation</a></li>
                        <li><a href="personal-loan-for-medical-emergency.php">Personal Loan for Medical Emergencies</a></li>
                        <li><a href="personal-loan-for-travel.php">Personal Loan for Travel</a></li>
                        <li><a href="personal-loan-for-two-wheeler.php">Personal Loan For Two Wheeler</a></li>
                        <li><a href="personal-loan-for-self-employed-professionals.php">Personal Loan For Self-Employed Professionals</a></li>
                        <li><a href="personal-loan-for-home-renovation.php">Personal Loan For Home Renovation</a></li>    
                        <li><a href="personal-loan-eligibility.php">Personal loan Eligibility</a></li>
                        <li><a href="personal-loan-interest-rate.php">Personal Loan Interest Rate</a></li>
                                        
                    </ul>
                </div>
                <div class="col-md-6 col-lg-2">
                    <h3>Our Company</h3>
                    <ul class="m-0">
                        <li><a href="about-us.php">About Us</a> </li>
                        <!--<li><a href="">We are hiring</a> </li> -->
                        <!--<li><a href="">Partner with us</a></li>-->
                        <li><a href="terms-and-conditions.php">Terms and Condition</a></li>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="blog">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h3>Join Our Newsletter</h3>
                    <div class="newsletter">
                        <div class="content">
                        <form action="" class="footer_subscriber_form" id="footer_subscriber_form">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                <span class="input-group-btn">
                                    <button class="btn" id="footer_subscriber_submit" type="submit">Subscribe Now</button>
                                </span>
                            </div>
                        </form>
                        <div class="footer_subscriber_thankyou thankyou_msg_subscriber" style="display:none">
                        <div class="thankyou_msg_svg_wrapper">			
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" preserveAspectRatio="xMidYMid meet">   
                        <g>
                            <circle class="circle" cx="50" cy="49.9999657" r="47.5"/>
                            <circle class="circle-dash" cx="50" cy="49.9999657" r="47.5"/>
                            <polyline class="check" points="28.6469955,52.0561066 42.2152748,65.6243896 71.3530045,36.4866562 	"/>
                            <polyline class="check-dash" points="28.6469955,52.0561066 42.2152748,65.6243896 71.3530045,36.4866562 	"/>
                        </g>
                        </svg>     
                        </div>
                            <h2>Thank You For Subscribe Us</h2>
                        </div>
                        </div>
                        <p>* Will send you weekly updates for your better finance management.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="hr-line">
            <p style="text-align: center;padding: 10px;">Copyright @ Credmudra 2023. All Rights Reserved.</p>
        </div>
</footer>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
    jQuery(document).ready(function() {
        jQuery(".footer_subscriber_thankyou").hide();
        // jQuery(".multi-spinner-container").hide();
        jQuery("#footer_subscriber_form").submit(function(e) {
            e.preventDefault();
            //jQuery(".multi-spinner-container").show();
            jQuery("#footer_subscriber_submit").html("Submitting <i style='font-size: 22px;vertical-align:middle;margin-left: 8px;' class='fa fa-refresh fa-spin' aria-hidden='true'></i>");
            jQuery("#footer_subscriber_submit").attr("disabled", true);
            var data = new FormData(this);
            data.append('subscriber', 'yes');
            jQuery.ajax({
                url: "subscriber_data_insert.php",
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    //console.log(response);
                    //var json_response = JSON.parse(response);
                    if (response.Result === 'Undeliverable') {
                        jQuery("form")[0].reset();
                        jQuery(".multi-spinner-container").hide();
                        jQuery("#subscribe_preview").html('<h4>Invalid Email, Please Insert Valid Email Id</h4>').fadeIn();

                    } else {
                        // view uploaded file.

                        jQuery("form")[0].reset();
                        //jQuery(".multi-spinner-container").hide();
                        jQuery(".footer_subscriber_thankyou").show();
                        jQuery(".footer_subscriber_form").hide();
                        jQuery("#subscribe_preview").hide();
                        jQuery("#footer_subscriber_submit").attr("disabled", false);
                        //alert('Thank You Your Message Sent!');
                    }
                },
                error: function(e) {
                    jQuery("#subscribe_preview").html(e).fadeIn();
                }
            });
        });

        jQuery("#page_subscriber_form").submit(function(e) {
            e.preventDefault();
            //jQuery(".multi-spinner-container").show();
            jQuery("#page_subscriber_submit").html("Submitting <i style='font-size: 22px;vertical-align:middle;margin-left: 8px;' class='fa fa-refresh fa-spin' aria-hidden='true'></i>");
            jQuery("#page_subscriber_submit").attr("disabled", true);
            var data = new FormData(this);
            data.append('subscriber', 'yes');
            jQuery.ajax({
                url: "subscriber_data_insert.php",
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    //console.log(response);
                    //var json_response = JSON.parse(response);
                    if (response.Result === 'Undeliverable') {
                        jQuery("form")[0].reset();
                        jQuery(".multi-spinner-container").hide();
                        jQuery("#subscribe_preview").html('<h4>Invalid Email, Please Insert Valid Email Id</h4>').fadeIn();

                    } else {
                        // view uploaded file.
                        jQuery("form")[0].reset();
                        //jQuery(".multi-spinner-container").hide();
                        jQuery(".page_subscriber_thankyou").show();
                        jQuery(".page_subscriber_form").hide();
                        jQuery("#subscribe_preview").hide();
                        jQuery("#page_subscriber_submit").attr("disabled", false);
                        //alert('Thank You Your Message Sent!');
                    }
                },
                error: function(e) {
                    jQuery("#subscribe_preview").html(e).fadeIn();
                }
            });
        });


 
  jQuery("#si_close").click(function(){
    jQuery(".header_notice").slideUp();
  });




    });
</script>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
  <script type='text/javascript'
    src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
  <script src='https://www.credmudra.com/wp-content/themes/credmudra/js/navigation.js?ver=1.0.0'
    id='credmudra-navigation-js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
</html>