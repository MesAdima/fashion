
<!-- Top Carousel -->
<div id="carousel-example-generic" class="carousel slide  carou" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item carou_img active">
      <img src="<?php echo base_url() . 'assets/images/girl7.jpg'?>" alt="..."> 
    </div>
    <div class="item carou_img">
      <img src="<?php echo base_url() . 'assets/images/girl333.jpg'?>" alt="...">
    </div>
    <div class="item carou_img">
      <img src="<?php echo base_url() . 'assets/images/girl2.jpg'?>" alt="...">
    </div>
    <div class="item carou_img">
      <img src="<?php echo base_url() . 'assets/images/girl4.jpg'?>" alt="...">
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control carousel-left" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control carousel-right" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

   <!-- /Controls -->

<!-- /Top Carousel -->


  <div class="ui horizontal divider">
    <span class="latest">Latest Products</span>
  </div>



<!-- Categories -->


<div class="display">
      <ul class="navi navi-tabings dis">
         <li role="presentation"><a href="#tshirt" data-toggle="tab">T-Shirts</a></li>
         <li role="presentation"><a href="#suits" data-toggle="tab">Suits</a></li>
         <li role="presentation"><a href="#skirts" data-toggle="tab">Skirts</a></li>
         <li role="presentation"><a href="#accessories" data-toggle="tab">Accessories</a></li>
      </ul>

      <div class="tab-content">
              <div class="tab-pane fade active in" id="tshirt" >
                <!-- Shirts -->

                <?php foreach ($shirts as $key => $value) {
                         foreach ($value as $q => $data) {
                          
                          //echo '<pre>';print_r($value);echo'</pre>';die();
                          for ($i=0; $i <= $key ; $i++) { 
                            
                          ?>
                <div class="col-sm-3 imghome">
                  <div class="product-wrap">
                    <div class="single-products">
                      <div class=" text-center">
                        <img class="imagesize" src="<?php echo $data['picture']; ?>" alt="" />
                        <h2>Kshs <?php echo $data['price']; ?></h2>
                        <p><?php echo $data['prod_name']; ?></p>

                        <a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-warning add-to-cart"><i class="shop icon"></i></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <?php 
                             }
                         }
                        
                      } 
            ?>

                <!-- /Shirts -->
              </div>
              
              <div class="tab-pane fade" id="suits" >
               <!-- Suits -->

                <?php foreach ($suits as $key => $value) {
                         foreach ($value as $q => $data) {
                          
                          //echo '<pre>';print_r($value);echo'</pre>';die();
                          for ($i=0; $i <= $key ; $i++) { 
                            
                          ?>
                <div class="col-sm-3 imghome">
                  <div class="product-wrap">
                    <div class="single-products">
                      <div class=" text-center">
                        <img class="imagesize" src="<?php echo $data['picture']; ?>" alt="" />
                        <h2>Kshs <?php echo $data['price']; ?></h2>
                        <p><?php echo $data['prod_name']; ?></p>

                        <a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-warning add-to-cart"><i class="shop icon"></i></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <?php 
                             }
                         }
                        
                      } 
            ?>

                <!-- /Suits -->
              </div>
              
              <div class="tab-pane fade" id="accessories" >
                <!-- Accessories -->

                <?php foreach ($accessories as $key => $value) {
                         foreach ($value as $q => $data) {
                          
                          //echo '<pre>';print_r($value);echo'</pre>';die();
                          for ($i=0; $i <= $key ; $i++) { 
                            
                          ?>
                <div class="col-sm-3 imghome">
                  <div class="product-wrap">
                    <div class="single-products">
                      <div class=" text-center">
                        <img class="imagesize" src="<?php echo $data['picture']; ?>" alt="" />
                        <h2>Kshs <?php echo $data['price']; ?></h2>
                        <p><?php echo $data['prod_name']; ?></p>

                        <a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-warning add-to-cart"><i class="shop icon"></i></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <?php 
                             }
                         }
                        
                      } 
            ?>

                <!-- /Accessories -->
              </div>
              
              <div class="tab-pane fade" id="skirts" >
                <!-- Skirts -->

                <?php foreach ($skirts as $key => $value) {
                         foreach ($value as $q => $data) {
                          
                          //echo '<pre>';print_r($value);echo'</pre>';die();
                          for ($i=0; $i <= $key ; $i++) { 
                            
                          ?>
                <div class="col-sm-3 imghome">
                  <div class="product-wrap">
                    <div class="single-products">
                      <div class=" text-center">
                        <img class="imagesize" src="<?php echo $data['picture']; ?>" alt="" />
                        <h2>Kshs <?php echo $data['price']; ?></h2>
                        <p><?php echo $data['prod_name']; ?></p>

                        <a href="<?php echo base_url(). 'home/add_to_cart_check'?>" class="btn btn-warning add-to-cart"><i class="shop icon"></i></i>Add to cart</a>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                <?php 
                             }
                         }
                        
                      } 
            ?>

                <!-- /Skirts -->
              </div>
            </div>
  

</div>

<!-- /Categories -->


