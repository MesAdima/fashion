<html>
<head>
	<title>
        MareWill Fashion
	</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.css'?>" />
    
    <link type="text/css" href="<?php echo base_url() . 'assets/css/style.css'?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/fonts/fashion.ico'?>" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.cslider.css'?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.bxslider.css'?>" />
    <link type="text/css" href="<?php echo base_url() . 'assets/script/jquery/jquery-ui.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/semantic/dist/semantic.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/dist/css/bootstrap.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/css/font-awesome.min.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/css/animate.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css'?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/theme-style.css'?>" />
    <link type="text/css" href="<?php echo base_url() . 'assets/css/styles.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/css/styles2.css'?>" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() . 'assets/css/main.css'?>" rel="stylesheet">
    
	
</head>
<body>

<div class="header">
 <div class="header-content">
  <div class="left-header">
    MAREWILL FASHION WEBSITE 
  </div>
  <div class="middle-header">
    <i class="call icon"></i> (+254) 0714 135 480
    &nbsp &nbsp
    <i class="mail icon"></i> marewillfashion@gmail.com
  </div>
 </div>
</div>

<!-- User Account Section -->

<div class="user-account">
  
      <div class="container">
        <div class="row">
          
          <div class="col-sm-12">
            <div class="account-menu pull-right">
              <ul class="nav navbar-nav"> 
                
            <!-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --> 
                

  <?php
  $log_type = $this->session->userdata('lt_id');
      if($logged_in){

        $username = $this->session->userdata('username');
  ?>

  <li><a href="#"><i class="star icon"></i> Wishlist</a></li>
  <li><a href="#"><i class="shop icon"></i> Cart</a></li>

  <li><div class="ui vertical divider"></div></li>

  <li>
    <div class="ui simple dropdown item">
      <i class="user icon "></i> <?php echo $username;?><i class="dropdown icon"></i>
       <div class="menu">
        <a class="item"><i class="edit icon"></i> View Profile</a>
        <a class="item"><i class="mail icon"></i> Messages</a>
        <div class="ui divider"></div>
        <a href='<?php echo base_url(). 'user/logout'?>' class="item"><i class="sign out icon"></i> Log Out</a>
       </div>
    </div>
  </li>

  <?php
      }else{
  ?>
  <?php
        $username = 'Ananonymous User';
  ?>

  
    <div class="ui simple dropdown item">
      <i class="user icon "></i> <?php echo $username;?><i class="dropdown icon"></i>
       <div class="menu">
        <a class="item" href='<?php echo base_url(). 'user/log'?>'><i class="edit icon"></i> Log In</li></a>
        <a class="item" href='<?php echo base_url(). 'user/sign'?>'><i class="mail icon"></i> Sign Up</li></a>
       </div>
      </div>
    

  <?php
    }
  ?>
      

  

              </ul>
            </div>
          </div>
        </div>
      </div>
    
</div>

<!-- /User Account section -->

<!-- Top Home Navigation -->
<div id='topmenu' class="over">
<ul>
   <li class='left'><a href='<?php echo base_url(). 'home/index'?>'>Home</a></li>
   <li class='left active'><a href='<?php echo base_url(). 'products/view'?>'>Products</a>
     
   </li>
   <li class='left'><a href='<?php echo base_url(). 'home/about'?>'>About</a></li>
   <li class='left'><a href='<?php echo base_url(). 'home/contact'?>'>Contact</a></li>

   <?php
       if(($logged_in) && ($log_type==3)){
   ?>
     <li class='right'><a href='<?php echo base_url(). 'user/ad_page'?>'>Admin Page</a>
      <li class='right'><a href='<?php echo base_url(). 'user/logout'?>'>Log Out</a>
  <?php 
      }elseif($logged_in){
  ?>
        <li class='right'><a href='<?php echo base_url(). 'user/logout'?>'>Log Out</a>
    <?php
       }else{
    ?>
      <li class='right'><a href='<?php echo base_url(). 'user/sign'?>'>Sign Up</a>
      <li class='right'><a href='<?php echo base_url(). 'user/log'?>'>Log In</a>
   <?php
      }
   ?>
   </li>
</ul>
</div>
<!-- /Top Home Navigation -->








<div class="container">
				<h2><centre>Manager's page</h2>
      				
			</div>
			<section class="section-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Actions</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class=""></i></span>
											Product Approvals
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class=""></i></span>
											New users
										</a>
									</h4>
								</div>
								
							</div>
							
												</div>

						<!--/category-productsr-->

						<!--brands_products-->
					
						<div class="brands_products">
							<h2>Companies</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Adidas</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Nike</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Puma</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Gucci</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->
						<!--/price-range-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">New Products</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/red-dress.jpg'?>" alt="" />
										<h2>Kshs 2300</h2>
										<p>Red Dress</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/lace-dress.jpg'?>" alt="" />
										<h2>Kshs 2300</h2>
										<p>Lace Dress</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/skirts4.jpg'?>" alt="" />
										<h2>Kshs 2000</h2>
										<p>Pink Pencil Skirt</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/gallery1.jpg'?>" alt="" />
										<h2>Kshs 900</h2>
										<p>Casual Vest</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									<div class="product-overlay">
										
									</div>
									<img src="" class="new" alt="" />
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/long-dress.jpg'?>" alt="" />
										<h2>Kshs 2679</h2>
										<p>Little Black Dress</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/girl8.jpg'?>" alt="" />
										<h2>Kshs 599</h2>
										<p>Chunky Bracelets</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/suit1.jpg'?>" alt="" />
										<h2>Kshs 7549</h2>
										<p>White Tailored Suit</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/sun1.jpg'?>" alt="" />
										<h2>Kshs 1550</h2>
										<p>Geeky sunglasses</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/womanjean2.jpg'?>" alt="" />
										<h2>Kshs 850</h2>
										<p>Fitting Jeans</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/shirt1.jpg'?>" alt="" />
										<h2>Kshs 1000</h2>
										<p>Easy Stripped Shirt</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/short-dress.jpg'?>" alt="" />
										<h2>Kshs 2500</h2>
										<p>Purple Number</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo base_url(). 'assets/images/womanjean3.jpg'?>" alt="" />
										<h2>Kshs 1500</h2>
										<p>Jean Shorts</p>
										<a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Approve</a>
									</div>
									
								</div>
								
							</div>
						</div>
						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->


  <div class=" col-sm-12 home-footer">
  <div class="bottom-topic">
    <span class="marewill">MAREWILL</span> FASHION WEBSITE
  </div>
  <div class="col-sm-12 footer-content">
    <div class="col-sm-4">
      Copyright &copy 2013 MareWill Inc. All rights reserved.
    </div>

    <div class="col-sm-4">
      <a href="http://www.facebook.com"><i class="facebook square icon"></i></a>
      <a href="http://www.instagram.com"><i class="instagram icon"></i></a>
      <a href="http://www.twitter.com"><i class="twitter square icon"></i></a>
    </div>

    <div class="col-sm-4">
      www.marewillfashion.com
    </div>
  </div>
</div>



<!-- /Footer -->


<script type="text/javascript"src="<?php echo base_url() .'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/jquery.mixitup.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/modernizr.custom.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/jquery.bxslider.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/jquery.cslider.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/jquery.placeholder.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() .'assets/js/jquery.inview.js'?>"></script>
 
<script type="text/javascript"src="<?php echo base_url() .'assets/script/jquery-1.11.1.min.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/script/jquery/jquery-ui.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/semantic/dist/semantic.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/dist/js/bootstrap.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/js/jquery.scrollUp.min.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/js/script.js'?>"></script>
<script type="text/javascript"src="<?php echo base_url() .'assets/js/main.js'?>"></script>
</body>
</html>