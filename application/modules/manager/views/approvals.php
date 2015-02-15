

<div class="container">
				<h2><centre>Manager Approvals Page</h2>

      				<?php
       if(isset($approve_message)){ 
       	//echo $approve_message;
       	 if($approve_message=='approve'){   ?>

            <div style="background-color:#2ecc71;" class="well well-sm success"><center><h4>Product has been approved</h4></center></div>

         <?php }
         elseif($approve_message=='disapprove')
         	{ ?>

            <div style="background-color:#e74c3c;" class="well well-sm alert"><center><h4>Product has been disapproved</h4></center></div>
         <?php
         }else{

       ?>

            <div style="background-color:#e74c3c;" class="well well-sm warning"><center><h4>Problem with updating product. Please contact administrator</h4></center></div>
   <?php
               }
       }else{

       ?>
         <div style="background-color:#bdc3c7;" class="well well-sm"><center><h4>Please approve or disapprove product</h4></center></div>
       <?php

        }
  
   ?>
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
										<a href="#">
											<span class="badge pull-right"><i class="active"></i></span>
											Product Approvals
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="<?php echo base_url(). 'manager/admin'?>">
											<span class="badge pull-right"><i class=""></i></span>
											New Admin
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
								<ul class="nav nav-pills nav-stacked navcompany">
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
						
                      <?php if($waits){
                        foreach ($waits as $key => $value) {
                      	 foreach ($value as $q => $data) {
                      		
                      		//echo '<pre>';print_r($value);echo'</pre>';die();
                      		for ($i=0; $i <= $key ; $i++) { 
                      			
                      		?>
                         
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo $data['picture']; ?>" alt="" />
										<h2><?php echo $data['price']; ?></h2>
										<p><?php echo $data['prod_name']; ?></p>
										<p><?php echo $data['prod_company']; ?></p>
										
										<a href="<?php echo base_url().'manager/updateproduct/approve/'.$data['prod_id'] ?>" style="background-color:#2ecc71" class="btn btn-default">Approve</a> <a href="<?php echo base_url().'manager/updateproduct/disapprove/'.$data['prod_id'] ?>" style="background-color:#e74c3c" class="btn btn-default">Disapprove</a>
									</div>
									
								</div>
								
							</div>
						</div>
						

						<?php 
                             }
                      	 }
                      	
                      } ?>
                        <ul class="pagination span12">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
                  
                  <?php    
                  }else{
						?>
						<div class="col-sm-12">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="" alt="No data available" />
										<h1>No awaiting products available</h1>
										<p></p>
										
									</div>
									
								</div>
								
							</div>
						</div>
                  <?php
					
					}

					?>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>



