<?php include_once 'includes/header.php';?>
    <!-- =========================
        Contact from Section
    ============================== -->
	<section id="contact-us">
	    <div class="container">
	    	<div class="row">
				<div class="col-12 p0">
					<div class="page-location">
						<ul>
							<li><a href="#">
								Home<span class="divider">/</span>
							</a></li>
							<li><a class="page-location-active" href="#">
								Contact Us
								<span class="divider">/</span>
							</a></li>
						</ul>
					</div>
				</div>
	    	</div>
	    	<div class="contact-us-content">
		       <!--  <div class="row">
					<div class="col-md-12">
						<div id="map"></div>
					</div>
		        </div> -->
				<div class="row">
					<div class="col-12 col-md-6 col-lg-9 col-xl-9">
						<div class="contact-from">
							<div class="contact-description">
								<h4 class="contact-description-title">Tell us about yourself</h4>
								<p class="contact-description-content">Your email address will not be published. Required fields are marked *</p>
							</div>
							<form id="contact_us_form">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="name" class="col-form-label">Name</label>
										<input type="text" class="form-control" id="name" placeholder="Name" required >
									</div>
									<div class="form-group col-md-6">
										<label for="email" class="col-form-label">Email</label>
										<input type="email" class="form-control" id="email" placeholder="Email" required>
									</div>
									<div class="form-group col-md-12">
										<label for="message" class="col-form-label">Your Message</label>
										<textarea required class="form-control" 
										id="message"></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary wd-contact-btn">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-3 col-xl-3">
						<div class="contact-address-area">
							<h4 class="contact-address-title">Address</h4>
							<p class="contact-address-content">Your email address will not be published.
							Required fields are marked *</p>
							<div class="contact-address">
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										Demo Address
									</div>
								</div>
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										<p><a href="tel:+012345689">+012 345 689</a></p>
										<p><a href="tel:+012345689">+012 345 689</a></p>
									</div>
								</div>
								<div class="media radius-icon-area">
									<div class="radius-icon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<div class="media-body radius-content">
										<p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
										<p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</section>

  

    <!-- =========================
        Footer Section
    ============================== -->
    <?php include_once 'includes/footer.php';?>
    <script>
    document.getElementById('message').innerHTML = document.getElementById('message').innerHTML.trim();
</script>