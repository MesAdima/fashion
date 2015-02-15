<!DOCTYPE html>
<html>
    
    <head>
      <title>Manager:Products</title>
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
                    <a class="brand" href="#">Manager Panel</a>
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
                            <li>
                                <a  href="<?php echo base_url(). 'manager/messages'?>">Messages</a>
                            </li>
                            <li>
                                <a  href="<?php echo base_url(). 'manager/admin'?>">Admins</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Deactivations<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'manager/dtype'?>">Type List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'manager/dcat'?>">Category List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'manager/dcomp'?>">Company List</a>
                                    </li>
                                    <li>
                                        <div class="divider"></div>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="<?php echo base_url(). 'manager/dadmin'?>">Admin List</a>
                                    </li>
                                </ul>
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
                            <a href="<?php echo base_url(). 'manager/home'?>"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'manager/productsview'?>"><span class="badge badge-alert pull-right"><?php echo $productnumber?></span> Product View</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'manager/messages'?>"><span class="badge badge-inverse pull-right"><?php echo $messagenumber?></span> Messages</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'manager/category'?>"><span class="badge badge-success pull-right"><?php echo $categorynumber?></span> Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'manager/type'?>"><span class="badge badge-warning pull-right"><?php echo $typenumber?></span> Types</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(). 'manager/company'?>"><span class="badge badge-info pull-right"><?php echo $companynumber?></span> Company</a>
                        </li>
                    </ul>
                </div>
                
                <!--/span-->
        
                <div class="span9" id="content">
                      

                  
                    <div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">View Product</div>
                                <div class="muted pull-right"><a href="<?php echo base_url(). 'manager/productsview'?>"><button type="reset" class="btn">Back</button></a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
					<!-- BEGIN FORM-->

          <?php foreach ($product as $key => $value) {
                            foreach ($value as $q => $data) {
                            
                           //echo '<pre>';print_r($user);echo'</pre>';die();
                            for ($i=0; $i <= $key ; $i++) { 
                                
                            ?>
					<form enctype="multipart/form-data" method="POST" action="#" class="form-horizontal black" role="form">
						
                        <fieldset>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								Please complete filling the form to be updated
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Product has been updated successfully
							</div>

              <div class="control-group">
                                <label class="control-label">Product ID. <?php echo $data['prod_id']; ?></label>
                                <div class="controls">
                                    <input name="id" type="hidden"  value="<?php echo $data['prod_id']; ?>" class="span6 m-wrap form-control "/>
                                </div>
                            </div>

                            <div class="control-group" >
                                <label class="control-label"></label>
                                <div class="controls" >
                                    <img style="width:300px;height:300px;" src="<?php echo $data['picture']; ?>">
                                </div>
                            </div>

  							<div class="control-group">
  								<label class="control-label">Product Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="prodname" data-required="1" required value="<?php echo $data['prod_name']?>" class="span6 m-wrap form-control"/>
  								</div>
  							</div>

  							<div class="control-group">
  								<label class="control-label">Product Category<span class="required">*</span></label>
  								<div class="controls">
                                    <input name="prodcategory" type="text" required value="<?php echo $data['prod_cat']?>" class="span6 m-wrap form-control">
                                       
  									
  								</div>
  							</div>

  							<div class="control-group">
  								<label class="control-label">Product Type<span class="required">*</span></label>
  								<div class="controls">
                                    <input  name="prodtype" type="text" required value="<?php echo $data['prod_type']?>" class="span6 m-wrap form-control">
                                    
  									<!-- <span class="help-block">e.g: http://www.demo.com or http://demo.com</span> -->
  								</div>
  							</div>

  							<div class="control-group">
  								<label class="control-label">Quantity<span class="required">*</span></label>
  								<div class="controls">
  									<input name="prodquantity" type="text" required value="<?php echo $data['quantity']?>" class="span6 m-wrap form-control "/>
  								</div>
  							</div>

                <div class="control-group">
                  <label class="control-label">Price<span class="required">*</span></label>
                  <div class="controls">
                    <input name="prodprice" type="text" required value="<?php echo $data['price']?>" class="span6 m-wrap form-control "/>
                  </div>
                </div>


  							<div class="control-group">
  								<label class="control-label">Company Name<span class="required">*</span></label>
  								<div class="controls">
                                    <input name="prodcompany" type="text" required value="<?php echo $data['prod_company']?>" class="span6 m-wrap form-control ">
                                      
  									<!-- <span class="help-block">e.g: 5500 0000 0000 0004</span> -->
  								</div>
  							</div>
  							
  						
  							
						</fieldset>
                        
					</form>

          <?php 
                             }
                         }
                        
                       }
                        ?>

                                 <a href="<?php echo base_url(). 'manager/productsview'?>"><button type="reset" class="btn">Back</button></a>
          
					<!-- END FORM-->
				</div>
			    </div>
			</div>
                     
		    </div>





                


                </div>
            </div>
            <hr>
            <footer>
                <p> MareWill Fashion 2015 &copy;</p>
            </footer>
        </div>
        <!--/.fluid-container-->
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