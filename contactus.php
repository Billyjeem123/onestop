<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Contact Us | Onestop Procurement</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<meta property="og:url" content="https://onestopprocurement.com" />
		<meta property="og:site_name" content="Onestop | Procurement" />
		<link rel="shortcut icon" href="assets/favicon.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <!-- Jquery-Ajax-Cdn -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>
        <!-- Jquery-Ajax-Cdn -->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Header Section-->
			<div class="mb-0" id="home">
				<!--begin::Wrapper-->
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
					<?php include_once("header.php"); ?>
					<!--begin::Landing hero-->
					<div class="d-flex flex-column flex-center w-100 min-h-250px min-h-lg-350px px-9">
						<!--begin::Heading-->
						<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
							<!--begin::Title-->
							<h1 class="text-white lh-base fw-bolder fs-2x fs-lg-3x mb-15">We Build Outstanding Solutions
							<br />for our 
							<span style="background: linear-gradient(to right,#788BBD 0%, #788BBD 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">Customers on achieving business goals</span>
							</span></h1>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Clients-->
						<div class="d-flex flex-center flex-wrap position-relative px-5">
							
							<!--begin::Client-->
							<!--
								<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
									<img src="assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="" />
								</div>
							-->
							<!--end::Client-->
						</div>
						<!--end::Clients-->
					</div>
					<!--end::Landing hero-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Header Section-->
			<!--begin::Contact Us-->
            <div class="mb-n10 mb-lg-n10 z-index-2">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mb-17">
                        <!--begin::Title-->
                        <h3 class="fs-2hx mb-5" id="contact_us" data-kt-scroll-offset="{default: 100, lg: 150}" style="color:#2B3187;">Get In Touch With Us</h3>
                        <!--end::Title-->
                        <!--begin::Text-->
                        <div class="fs-3" style="font-size:17px;font-weight:600px;">Contact our sales team to learn more about our services or schedule a demo.<br/>
Please complete the online form or email <a href="mailto:sales@onestopprocurement.com">sales@onestopprocurement.com</a> to speak to our sales<br/>
team, and a representative will reach out to you.

                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Row-->
                    <div class="row w-100 gy-10 mb-md-20 container">
                      <div class="col-md-3">
                      </div>
                      <!-- begin::col -->
                      <div class="col-md-6" style="background: #fff !important; box-shadow:  0 10px 5px 0 #cccccc; border:1px solid #2B3187;">
                          <h1 class=" text-dark mb-10 text-center" id="contact_us">Send Us a Message</h1>
                          <!-- begin::Form -->
                          <div class="" id="eee"></div>
                          <form class="" method="post" id="frm">
                              <!-- begin::Form-group -->
                              <span></span>
                              <div class="form-group mb-5">
                                  <label for="name" class="form-label">Full Name</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="Eg. John Doe" />
                              </div>
                              <!-- end::Form-group -->
                              <!-- begin::Form-group -->
                              <div class="form-group mb-5">
                                  <label for="number" class="form-label">Phone Number</label>
                                  <input type="number" class="form-control" name="number" id="number" placeholder="Eg. +234 0000001" style="-moz-appearance: textfield">
                              </div>
                              <!-- end::Form-group -->
                              <!-- begin::Form-group -->
                              <div class="form-group mb-5">
                                  <label for="email" class="form-label">Email Address</label>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Eg. example@gmail.com" />
                              </div>
                              <!-- end::Form-group -->
                              
                              <!-- begin::Form-group -->
                              <div class="form-group mb-5">
                                  <label for="text-box" class="form-label">Message</label>
                                  <textarea class="form-control" name="message" id="message" id="text-box" rows="6" placeholder="Write us a message"></textarea>
                              </div>
                              <!-- end::Form-group --><br/>
                              <!-- begin::Form-group -->
                              <div class="form-group send mb-5">
                                  <!-- <input type="submit" class="btn btn-success form-control d-block" id="send" value="Send Message " /> -->
                                  <button type="submit" name="contact"   class="btn btn-success form-control d-block" id="send">Send Message </button>
                              </div>
                              <!-- end::Form-group -->
                          </form>
                          <!-- end::Form -->
                      </div>
                      <!-- end::col -->
                      <div class="col-md-3">
                      </div>
                    </div>
                    <!--end::Row-->

                </div>
                <!-- ---------------------------------------------------------- -->
                <!-- ---------------------------------------------------------- -->
                <!-- ---------------------------------------------------------- -->
                <!--end::Container-->
                <br><br><br>
            </div>
            <!--end::Contactus-->
			<script type="text/javascript">
  jQuery('#frm').validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
      number: {
        required: true,
      },
      message: {
        required: true,
      },
    },
    messages: {
      name: "Enter your full Name",
      email: {
        required: "Enter your  email address",
        email: "Enter a  valid email address",
      },
      number: {
        required: "Enter your Phone number",
        number: "Only Number is Allowed"
      },
      message: {
        required: " Leave us a message"
      },
    },
    submitHandler: function(form) {
      var dataparam = $('#frm').serialize();

      // alert(dataparam);

      $.ajax({
        type: 'POST',
        async: true,
        url: 'email.php',
        data: dataparam,
        datatype: 'json',
        cache: true,
        global: false,
        beforeSend: function() {
          $("#send").html('Sending <img id="" src="https://res.cloudinary.com/sivadass/image/upload/v1498134389/icons/loader.gif" alt="loading">');

        },
        success: function(data) {
        
          $("#eee").html(
          '<div class="alert alert-success text-center"> Message Delivered Sucessfully ' + data + ' </div>'
        );
        setTimeout(function(){
					$(' #eee').load('contact.php #eee');
				}, 3000);
          $("#frm")[0].reset();
        },
        complete: function() {
          $('#loader').hide();
          $("#send").html('Send Message ');
        }

     
        
      });
    }
  });
</script>
			<!--begin::Testimonials Section-->
			<div class="mt-20 mb-n20 position-relative z-index-2">
				<!--begin::Container-->
				<div class="container">				
					<!--begin::Highlight-->
					<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #1B184F 0%, #2B3187 100%);">
						<!--begin::Content-->
						<div class="my-2 me-5">
							<!--begin::Title-->
							<div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">Start With Onestop Procurement,
							<span class="fw-normal">Win in your Business!</span></div>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Join us as we create comprehensive approach to anticipate, identify and
								monitor the portfolio of risks impacting businesses globally.
							</div>
							<!--end::Description-->
						</div>
						<!--end::Content-->
						<!--begin::Link-->
						<a href="vendor/register" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Get Started</a>
						<!--end::Link-->
					</div>
					<!--end::Highlight-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Testimonials Section-->
<?php include_once("footer.php"); ?>			