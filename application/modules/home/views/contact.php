
			<div class="container">
				<div id="home" class="headering scroll">

	<?php 
       $reply = str_replace('%20', ' ', $reply);
	    
	    if(isset($reply)){

	?>
	    <div class="well well-sm">
            Thank you <?php echo $reply?>  for commenting in our site
	    </div>

	<?php 
          } else{
    ?>
          <div class="well well-sm">

	    </div>
	<?php }?>
				<!-- <div class="logo">
					<a href="index.html"><img src="web/images/logo.png" title="Mabur" /></a>
				</div> -->
				
				<!----start-top-nav---->
				
				<div class="clearfix"> </div>
				<div class="slide-text text-center">
					<h1>MAREWILL FASHION</h1>
					<span>WANT TO KNOW MORE</span>
					<a class="slide-btn btn-color" href="#contacts">Contacts</a>
				</div>
				<!----//End-top-nav---->
			</div>
		</div>




      <div class="grid_12 margin">
        <div id="map-canvas">
          <figure class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7977.548817433302!2d36.80921226739884!3d-1.310697306903683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x2ed8412115331950!2sStrathmore+University!5e0!3m2!1sen!2ske!4v1419445278462" width="100%" height="450" frameborder="0" style="border:0"></iframe>
          </figure>
        </div>
      </div>

     

      <div class="contacts" id="contacts">
	<div class="wrap">
		<h2>Contact Us</h2>
		<h4>If in need of more information about us or to register your company</h4>
		<div class="section group">
			  <div class="col span_2_of_3">
				  <div class="contacts-form">
				  	  <form method="post" action="<?php echo base_url(). 'home/sendmessage'?>">
					    	
					    		<input type="text" required name="name" class="textbox" placeholder="Enter Your Name Here">
						    	<input type="text" required name="email" class="textbox" placeholder="Enter Your Email Here">
						    	<div class="clear"> </div>
						   
						    <div>
						    	<textarea name="message" required placeholder="Enter Your Message Here:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Message Here';}">Enter Your Message Here...</textarea>
						    </div>
						  <span><input type="submit" class="btn-color" value="Submit"></span>
						  <div class="clear"></div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="company_address">
				     	<h5>Our Contacts</h5>
						<ul class="list3">
							<li>
								<img src="<?php echo base_url() . 'assets/images/location.png'?>" alt=""/>
								<div class="extra-wrap">
								  <p>STRATHMORE UNIVERSITY</p>
								  <p>Madaraka Estate</p>
								  <p>Ole Sangale Road, PO Box 59857, 00200 </p>
								</div>
								<div class="clear"> </div>
							</li>
							
							<li>
								<img src="<?php echo base_url() . 'assets/images/phone.png'?>" alt=""/>
								<div class="extra-wrap">
									<p>+254 714 135 480</p>
								</div>
								<div class="clear"> </div>
							</li>
							<li>
								<img src="<?php echo base_url() . 'assets/images/fax2.png'?>" alt=""/>
								<div class="extra-wrap">
									<p>+254 500 6343 8690</p>
								</div>
								<div class="clear"> </div>
							</li>
							<li>
								<img src="<?php echo base_url() . 'assets/images/mail.png'?>" alt=""/>
								<div class="extra-wrap">
									<p> <a href="mailto:marekawilly@gmail.com"> www.marewillfashion.com</a></p>
								</div>
								<div class="clear"> </div>
							</li>
						</ul>
				   </div>
				 </div>
				 <div class="clear"></div>
			  </div>
			  </div>
     	</div>





