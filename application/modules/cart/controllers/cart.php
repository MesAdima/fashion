<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('product_model');
    }

	public function index()
    {
        $this->load->helper('form');
		$this->load->library('cart');
        $this->load->view('v_cart'); 
    }
	
	public function update(){
		$data = array(
			'row_id' => 'f0405bb2ad392b066c464c3a13e1854a',
			'qty' => '5',
		);
		$this->cart->update($data);
		echo "update() called";
	} 
	
	public function add_products($prod_id){
		
		$product = $this->product_model->get($prod_id);
		
		//echo "<pre>";print_r($product);echo "</pre>";exit;
		
		$insert = array(
			'id' => $prod_id,
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->prod_name,
		);
		
		$this->cart->insert($insert);
		
		//redirect('products/view');
		
		
		
		// $this->load->library('cart');
		// $data = array(
					// array(
                       // 'id'      => '1',
                       // 'qty'     => 1,
                       // 'price'   => 39.95,
                       // 'name'    => 'T-Shirt',
                       // 'options' => array('Size' => 'Large', 'Color' => 'Red')
                    // )
               // );
		// $this->cart->insert($data);
		echo "add() called";
	}
	
	public function show_cart(){
		$cart = $this->cart->contents();
		echo "<pre>";print_r($cart);
		
	}
	
	public function total(){
		echo $this->cart->total();
	}
	
	public function remove($row_id){
		$data = array(
			'row_id' => $row_id,
			'qty' => '0',
		);
		$this->cart->update($data);
		redirect('products/view');
		//echo "remove() called";
	}
	
	public function destroy(){
		$this->cart->destroy();
		echo "destroy() called";
		
	}
}