<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
//error_reporting(1);
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '-1');

class MY_Controller extends MX_Controller
{
    public $tables, $logged_in;
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
        $this->load->module('home');
        $this->load->module('user');
        $this->load->module('products');
        $this->load->model('user/user_model');
        $this->load->library('upload');
        $this->load->module('template');
        
    }

   public function showbase()
   {
    echo base_url();
   }

    


    public function uploader($file)
    {
        $path = '';
        $upload_path = 'assets/images/users/';
        $config['upload_path'] = './' . $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($file))
        {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            foreach ($data as $key => $value) {
                $path = base_url().$upload_path.$value['file_name'];
            }
            return $path;
        }
    }
	
	public function add_products($prod_id){
		
		$product = $this->product_model->get($prod_id);
		
		//echo "<pre>";print_r($product);echo "</pre>";exit;
		
		$insert = array(
			'id' => $prod_id,
			'qty' => 1,
			'price' => $product['price'],
			'name' => $product['prod_name'],
		);
		
		$this->cart->insert($insert);
		
		//echo "<pre>";print_r($insert);echo "</pre>";exit;
		//$this->cart->show_cart();
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
		//echo "add() called";
		redirect('shoppingcart/v_cart');
		//$this->load->view('cart/v_cart'); 
	}


}