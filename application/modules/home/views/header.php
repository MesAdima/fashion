<html>
<head>
  <title>
        MareWill Fashion
  </title>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/fonts/fashion.ico'?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.css'?>" />
    <link type="text/css" href="<?php echo base_url() . 'assets/css/style.css'?>" rel="stylesheet">
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

<!-- Top Info -->
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
<!-- /Top Info -->

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
      $username = $this->session->userdata('username');
      if(($logged_in) && ($log_type==3)){

        echo $username;
  ?>

  

  <li><div class="ui vertical divider"></div></li>

  <li>
    <div class="ui simple dropdown item">
      <i class="user icon "></i> <?php echo $username;?><i class="dropdown icon"></i>
       <div class="menu">
        <div class="ui divider"></div>
        <a href='<?php echo base_url(). 'user/validate_member'?>' class="item"><i class="sign out icon"></i> Admin Page</a>
        <a href='<?php echo base_url(). 'user/logout'?>' class="item"><i class="sign out icon"></i> Log Out</a>
       </div>
    </div>
  </li>

  <?php
      }elseif(($logged_in) && ($log_type==2)){
  ?>

      <li><div class="ui vertical divider"></div></li>

  <li>
    <div class="ui simple dropdown item">
      <i class="user icon "></i> <?php echo $username;?><i class="dropdown icon"></i>
       <div class="menu">
        <div class="ui divider"></div>
        <a href='<?php echo base_url(). 'user/manager'?>' class="item"><i class="sign out icon"></i> Manager Page</a>
        <a href='<?php echo base_url(). 'user/logout'?>' class="item"><i class="sign out icon"></i> Log Out</a>
       </div>
    </div>
  </li>

  <?php
      }elseif($logged_in){
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
   <li class='left'><a href='<?php echo base_url(). 'products/view'?>'>Products</a>
     
   </li>
   <li class='left'><a href='<?php echo base_url(). 'home/about'?>'>About</a></li>
   <li class='left'><a href='<?php echo base_url(). 'home/contact'?>'>Contact</a></li>

 <?php
       if(($logged_in) && ($log_type==3)){
   ?>
      <li class='right'><a href='<?php echo base_url(). 'user/logout'?>'>Log Out</a>
      <li class='right'><a href='<?php echo base_url(). 'user/ad_page'?>'>Admin Page</a>
  <?php 
      }elseif(($logged_in) && ($log_type==2)){
  ?>

        <li class='right'><a href='<?php echo base_url(). 'user/logout'?>'>Log Out</a>
        <li class='right'><a href='<?php echo base_url(). 'manager/home'?>'>Manager Page</a>
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