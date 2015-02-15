<!DOCTYPE html>
<html class="no-js">
    
    <head>
    <title>Admin</title>
        <meta name="robots" content="noindex">
        <meta charset="UTF-8">
        
        <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/fonts/fashion.ico'?>" />
        <link type="text/css" href="<?php echo base_url() .'assets/ionicons/css/ionicons.css' ?>" rel="stylesheet" media="screen">
        <link type="text/css" href="<?php echo base_url() .'assets/dist/css/table_bootstrap.css' ?>" rel="stylesheet" media="screen">
        <link type="text/css" href="<?php echo base_url() .'assets/bootstrap/css/bootstrap-responsive.min.css'?>" rel="stylesheet" media="screen">
        <link type="text/css" href="<?php echo base_url() .'assets/vendors/easypiechart/jquery.easy-pie-chart.css'?>" rel="stylesheet" media="screen">
        <link type="text/css" href="<?php echo base_url() .'assets/script/jquery/jquery-ui.css' ?>" rel="stylesheet" media="screen">
        
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
       <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/script/jquery/jquery-ui.js'; ?>"></script>

        <script src="<?php echo base_url(). 'assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js'?>"></script>
          <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/js/jquery.datatables/bootstrap-adapter/css/datatables.css'; ?>" /> 
        
        <link type="text/css" href="<?php echo base_url() .'assets/bootstrap/css/bootstrap.css' ?>" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.datatables/jquery.datatables.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.datatables/bootstrap-adapter/js/datatables.js'; ?>"></script>
        <link type="text/css" href="<?php echo base_url() .'assets/css/ad_styles.css' ?>" rel="stylesheet" media="screen">
    </head>
    
    <body>

        <?php
              $username = $this->session->userdata('username');
        ?>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Admin Panel</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href="<?php echo base_url(). 'home/index'?>">Home Page</a></li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $username?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" data-toggle="modal" data-target="#myModal">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'user/logout'?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Reports <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    
                                    <li>
                                        <a href="#">Excel</a>
                                    </li>
                                    <li>
                                        <a href="#">PDF</a>
                                    </li>
                                    <!-- <li class="divider"></li> -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/tables'?>">Tables</a>
                                    </li>
                                    
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/messages'?>">Messages</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Deactivations<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/dusers'?>">User List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/dcompa'?>">Companies List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/delprod'?>">Product List</a>
                                    </li>
                                    <li>
                                        <div class="divider"></div>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'admin/dprod'?>">Disapprovals</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>

   <div style="width:800px;" class="modal fade modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $username?></h4>
      </div>
      <div class="modal-body" style="height:1000px;">
            <?php foreach ($ownprofile as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>


                    <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'admin/updatemember'?>" class="form-horizontal black" role="form">
                        <?php 
                                  echo form_open_multipart(base_url().'admin/updatemember');
                              ?>
                        <fieldset>
                               <?php echo $error?>

                            <div class="alert alert-error hide">
                                <button class="close" data-dismiss="alert"></button>
                                Please change the fields that are to be updated
                            </div>
                            <div class="alert alert-success hide">
                                <button class="close" data-dismiss="alert"></button>
                                Account has been updated successfully
                            </div>

                            <div class="control-group">
                                <label class="control-label">Account No. <?php echo $data['ac_id']; ?></label>
                                <div class="controls">
                                    <input name="id" type="hidden"  value="<?php echo $data['ac_id']; ?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="control-group" >
                                <label class="control-label"></label>
                                <div class="controls" >
                                    <img style="width:300px;height:300px;" src="<?php echo $data['picture']; ?>">
                                </div>
                            </div>

                            

                            <div class="control-group">
                                <label class="control-label">User First Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input type="text" name="fname" data-required="1" required value="<?php echo $data['f_name']; ?>" class="span6 m-wrap form-control"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">User Middle Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="mname" type="text" required value="<?php echo $data['m_name']?>" class="span6 m-wrap form-control">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">User Last Name<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="lname" type="text" required value="<?php echo $data['l_name']?>" class="span6 m-wrap form-control">
                                </div>
                             </div>

                            <div class="control-group">
                                <label class="control-label">Age<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="age" type="text" required value="<?php echo $data['age']?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="control-group">
                               <label class="control-label">Nationality<span class="required">*</span></label>
                               <div class="controls">
                                   <input name="nationality" type="text" required value="<?php echo $data['nationality']?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Phone Number<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="pnumber" type="text" required value="<?php echo $data['phone_no']?>" class="span6 m-wrap form-control ">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="email" type="email" required value="<?php echo $data['email']?>" class="span6 m-wrap form-control ">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Residence<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="residence" type="text" required value="<?php echo $data['residence']?>" class="span6 m-wrap form-control ">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Religion<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="religion" type="text" required value="<?php echo $data['religion']?>" class="span6 m-wrap form-control ">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Gender<span class="required">*</span></label>
                                <div class="controls">
                                    <input name="gender" type="text" required value="<?php echo $data['gender']?>" class="span6 m-wrap form-control ">
                                </div>
                            </div>
                            
                        
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update User Account</button>
                                
                            </div>
                        </fieldset>
                        <?php 
                                    echo form_close();
                                 ?>
                                 
                    </form>

                        <?php 
                             }
                         }
                        
                       }
                        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="<?php echo base_url(). 'admin/home'?>"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'admin/forms'?>"><span class="badge badge-alert pull-right"><?php echo $productnumber?></span> Product Form</a>
                        </li>
                       
                        <li>
                            <a href="<?php echo base_url(). 'admin/messages'?>"><span class="badge badge-warning pull-right"><?php echo $messagenumber?></span> Messages</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'admin/company'?>"><span class="badge badge-info pull-right"><?php echo $companynumber?></span> Company</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'admin/users'?>"><span class="badge badge-success pull-right"><?php echo $usernumber?></span> Users</a>
                        </li>
                        
                    </ul>
                </div>
                
                <!--/span-->
    
        
                <div class="span9" id="content">



                    
                    <div class="row-fluid addlength">
                        <!-- <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	Logged in succesfully</div> -->
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="#">Dashboard</a> <span class="divider">|</span>	
	                                    </li>
	                                    
	                                    <li class="active">Main Screen</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                        <!-- stats -->


                 <!-- <div class="row-fluid">
                        
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="73">73%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="53">53%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="83">83%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div> -->  

                    <!-- /stats -->


                   <div class="row-fluid addlength">
                        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Users</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $usernumber?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped datatable" id="ausertable">
                                        <thead>


                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Nationality</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Residence</th>
                                                <th>Religion</th>
                                                <th>Gender</th>
                                                <th>View</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $users_table; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>

                    </div>


                    




                     <div class="row-fluid addlength">
                        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Companies</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $companynumber?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped datatable" id="acompanytable">
                                        <thead>


                                            <tr>
                                                <th>#</th>
                                                <th>Company Name</th>
                                                <th>Location</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Date / Time Registered</th>
                                                <th>View</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $companies_table; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>

                    </div>

                    

                    <div class="row-fluid addlength">
                        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Products</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo $productnumber?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped datatable" id="aproducttable">
                                        <thead>


                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Product Type</th>
                                                <th>Product Category</th>
                                                <th>Quantity</th>
                                                <th>Price (Kshs)</th>
                                                <th>Product Company</th>
                                                <th>Date / Time Added</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $product_table; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>

                    </div>


                    <div class="row-fluid addlength">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Gallery</div>
                                <div class="pull-right"><span class="badge badge-info">1,462</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                </div>

                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                </div>

                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="#" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="">
                                      </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>





                </div>
            </div>
            
        <!--/.fluid-container-->


                        <hr>
            <footer>
                <p>&copy; MareWill Fashion 2015</p>
            </footer>
        </div>


        <script src="<?php echo base_url(). 'assets/bootstrap/js/bootstrap.js'?>"></script>
        <script src="<?php echo base_url(). 'assets/vendors/easypiechart/jquery.easy-pie-chart.js'?>"></script>
        <script src="<?php echo base_url(). 'assets/js/ad_scripts.js'?>"></script>
        
        <!--<script src="<?php echo base_url(). 'assets/js/jquery-2.1.1.min.js'?>"></script>-->
        <script>
        $(function() {
            
        });
        </script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script type="text/javascript">
            $('#aproducttable').dataTable();
            $('#acompanytable').dataTable();
            $('#ausertable').dataTable();

            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
            $('.dataTables_length select').addClass('form-control');
        </script>
    </body>

</html>
        