


<div class="criteria-bar">
    <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() . 'products/choosefilter'?>" class="form-horizontal black" role="form">
						<?php 
                                  echo form_open_multipart(base_url().'products/choosefilter');
                              ?>
                        <fieldset>
							<div class="control-group">
  								
  								
                                    <select name="prodcompany" type="text" value="<?php echo set_value('prodcompany'); ?>" class="criteriabut" id="prodcompany">
                                        <?php echo $product_companies?>
                                    </select>
  									
  									<!-- <span class="help-block">e.g: 5500 0000 0000 0004</span> -->
  								
  								
  								
                                    <select name="prodcategory" type="text" value="<?php echo set_value('prodcategory'); ?>" class=" criteriabut " id="prodcategory">
                                        <?php echo $product_categories?>
                                    </select>
  									
  								
  								
  								
                                    <select  name="prodtype" type="text" value="<?php echo set_value('prodtype'); ?>" class="criteriabut " id="prodtype">
                                        <?php echo $product_types?>
                                    </select>
  									
  									<!-- <span class="help-block">e.g: http://www.demo.com or http://demo.com</span> -->
  								<button type="submit" class="btn btn-primary">Filter</button>

  							</div>


  							
  							
  						
  							<!-- <div class="form-actions">
  								
  								<a href="<?php echo base_url(). 'products/view'?>"><button type="reset" class="btn">Reset</button></a>
  							</div> -->
						</fieldset>
                        <?php 
                                    echo form_close();
                                 ?>
					</form>



</div>



<section class="section-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="plus icon prod"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="plus icon prod"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="plus icon prod"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div>

						<!--/category-productsr-->

						<!--brands_products-->
					
						<div class="brands_products">
							<h2>Company</h2>
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
				
				<!--implementing from the db-->

				<!-- <div id="products">
					<ul>
						<?php foreach ($products as $product): ?>
							<li>
								<?php echo form_open ('cart/add_products'); ?>
								<div class="name"> <?php echo $product->prod_name; ?> </div>
								<div class="image">
									<?php echo img(array(
										'src'=> '/uploads/products'. $product->picture,
										'class'=> 'thumb',
										'alt'=> $product->prod_name
									)
									);?>
								</div>
								<div class="price">Kshs<?php echo $product->price; ?></div>
								<div class="option">
									
									<?php if ($product->option_values):?>
										<?php echo form_label (''); ?>
									<?php endif; ?>	
								</div>
								<?php echo form_close ($product->option_values, 'option_'.$product->prod_id); ?>
								<?php echo form_dropdown(
									$product->option_values, 
									$product->option_values,
									NULL, 
									'id="option_'.$product->prod_id.'"'
								); ?>
							</li>
						 
						<?php endforeach; ?>
					</ul>
					
				</div>


				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
                      <?php foreach ($criteria as $key => $value) {
                      	 foreach ($value as $q => $data) {
                      		
                      		//echo '<pre>';print_r($value);echo'</pre>';die();
                      		for ($i=0; $i <= $key ; $i++) { 
                      			
                      		?>
                      		
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="imagesize" src="<?php echo $data['picture']; ?>" />
										<h2>Kshs <?php echo $data['price']; ?></h2>
										<p><?php echo $data['prod_name']; ?></p>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											
											<h2><?php echo $data['prod_name']; ?></h2>
											<h2>Category</h2><p><?php echo $data['prod_cat']; ?></p>
											<h2>Price</h2><p>Kshs <?php echo $data['price']; ?></p>
											<h2>Company</h2><p><?php echo $data['prod_company']; ?></p>

											<a href="<?php echo base_url(). 'home/add_to_cart_check/'.$data['prod_id']?>" class="btn btn-default add-to-cart"><i class="shop icon"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="star icon"></i>Add to wishlist</a></li>
										<!-- <li><a href=""><i class="star icon"></i>Add to compare</a></li> -->
									</ul>
								</div>
							</div>
						</div>

						<?php 
                             }
                      	 }
                      	
                      } 
						?>
						
							<?php if ($cart = $this->cart->contents()): ?>
						<div id = "cart">
							<table>
								<caption>
									Shopping Cart
								</caption>
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th></th>
									</tr>
								</thead>
								<?php foreach ($cart as $item): ?>
									<tr>
										<td>
											<?php echo $item['name']; ?>
										</td>
										<td>
											Ksh<?php echo $item['subtotal']; ?>
										</td>
										<td class="remove"><?php echo anchor('cart/remove/'.$item['rowid'], 'X'); ?></td>
									</tr>
								 <?php endforeach; ?>
								 	<tr class="total">
								 		<td colspan="2"><strong>Total</strong></td>
								 		<td>Ksh<?php echo $this->cart->total(); ?></td>
								 	</tr>
							</table>
                      			
							
						</div>
							<?php endif; ?>
						<!-- <div id="pagination" class="span12 pagination">

						<ul class="span12 pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div> -->

					<?php echo $this->table->generate($records);

							echo '<div id="pagination" class="span12 pagination">' .$this->pagination->create_links(). '</div>';
							 ?>



					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>