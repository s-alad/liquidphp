<?php include("../headers.php");

?>
<!-- end Header Area -->
<main style="background-color: #272727; padding-top: 120px;">

	<!-- google map start -->
	<div class="map-area container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24189.14348947979!2d-74.25039902287786!3d40.72587625037916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3acc433f2e4d1%3A0x50cac0d62e5a555f!2sIrvington%2C%20NJ%2007111%2C%20USA!5e0!3m2!1sen!2s!4v1608707944216!5m2!1sen!2s" width="100%" height="500px" frameborder="0" style="border:0;filter: grayscale(100%) invert(92%) contrast(83%);" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	<!-- google map end -->



	<div class="col-md-12 text-center contact-after-map">
		<p class="mt-01 text-white">Liquid Barrier currently represents clients across the United States, and in Canada, Dubai (UAE), Ghana (West Africa), and the United Kingdom.</p>
	</div>

	<!-- contact area start -->
	<div class="contact-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 order-2 order-lg-1">
					<div class="contact-message">
						<h2 class="h1 contact-title" style="padding-bottom: 15px !important;">Contact Us</h2>
						<form id="contact-form" action="" method="post" class="contact-form">
							<?php send_message(); ?>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input name="name" placeholder="Name *" type="text" required class="placeholdercolor">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input name="cell" placeholder="Cell # " type="text" class="placeholdercolor">
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input name="email" placeholder="Email *" type="text" required class="placeholdercolor">
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<input name="subject" placeholder="Subject *" type="text" class="placeholdercolor">
								</div>
								<div class="col-12">
									<div class="contact2-textarea text-center">
										<textarea placeholder="Message *" name="message" class="form-control2" required="" class="placeholdercolor"></textarea>
									</div>
									<div class="contact-btn">
										<button class="btn btn-all" style="color: white !important;" name="submit" type="submit">Send message</button>
									</div>
								</div>
								<div class="col-12 d-flex justify-content-center">
									<p class="form-messege"></p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 order-1 order-lg-2">
					<div class="contact-information">
						<h2 class="h1  contact-title" style="padding-bottom: 15px !important;">Follow Us</h2>

						<ul>
							<li class="text-white"><i class="  fa fa-fax"></i> Address : Irvington, NJ</li>
							<li class="text-white"><i class="fa fa-envelope-o"></i> Email: writing@liquidbarriersolutions.com</li>
							<li class="text-white"><i class="fa fa-phone"></i> 201-303-5541</li>
							<li class="text-right" style="border: none !important; padding-bottom: 0px !important; margin-bottom: 4px; height: 25px; color: white;">
                                <a href="https://www.facebook.com/liquidbarrier/" class="nav-i" style="position: relative; width: 32px;">
									<i class=" text-white fa fa-facebook" style="font-size: 18px; left: 0; position: relative;"></i>
								</a>
								<div style="position: relative; top: 3px !important;">Facebook: liquidbarrier</div>
							</li>
							<li class="text-right" style="border: none !important; padding-bottom: 0px !important; margin-bottom: 4px; height: 25px; color: white;">
                                <a href="https://www.twitter.com/"class="nav-i" style="position: relative; width: 32px;">
									<i class="  text-white fa fa-twitter" style="font-size: 18px; left: 0; position: relative;"></i>
								</a>
								<div style="position: relative; top: 3px !important;">Twitter: @liquidbarrier</div>
							</li>
							<li class="text-right" style="border: none !important; padding-bottom: 0px !important; margin-bottom: 4px; height: 25px; color: white;">
                                <a href="https://www.instagram.com/liquidbarrier/"class="nav-i" style="position: relative; width: 32px;">
									<i class="  text-white fa fa-instagram" style="font-size: 18px; left: 0; position: relative;"></i>
								</a>
								<div style="position: relative; top: 3px !important;">Instagram: @liquidbarrier</div>
							</li>
							<li class="text-right" style="border: none !important; padding-bottom: 0px !important; margin-bottom: 4px; height: 25px; color: white;">
                                <a href="https://www.linkedin.com/company/liquidbarrier/"class="nav-i" style="position: relative; width: 32px;">
									<i class=" text-white fa fa-linkedin" style="font-size: 18px; left: 0; position: relative;"></i>
								</a>
								<div style="position: relative; top: 3px !important;">Linkedin: liquidbarrier</div>
							</li>
						</ul>
						<div class="text-white mt-40" style="float:left;padding:10px;"><a href="https://on.sprintful.com/frank-bryant" target="_blank" style="color: white !important;" class="btn btn-all">Schedule a free writing consultation</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact area end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible bg-danger">
	<i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<!-- footer section start -->
<?php include("../footer.php") ?>
