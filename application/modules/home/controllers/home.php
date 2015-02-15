<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

	function __construct()
    {

        
        $this->load->model('home/model_home');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
         }
          
    }

	public function index()
	{
		$data['shirts'] = $this->getshirts();
		$data['suits'] = $this->getsuits();
		$data['skirts'] = $this->getskirts();
		$data['accessories'] = $this->getaccessories();

		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('v_home',$data);
		$this->load->view('home_footer');
	}

	public function about()
	{
		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contact()
	{
		$this->load->view('header', array('logged_in' => $this->logged_in));
		$this->load->view('contact');
		$this->load->view('footer');
	}

	 public function add_to_cart_check($prod_id)
	 {
      if($this->session->userdata('logged_in')){
			redirect('cart');
      }
      else{
        redirect('user/log');

      }
    }

    function getshirts()
	{
		$shirts = array();
       $results = $this->model_home->get_shirts();

       foreach ($results as $key => $values) {
       	 
       	 	
           $shirts['shirts'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $shirts;
	}

	function getskirts()
	{
		$skirts = array();
       $results = $this->model_home->get_skirts();

       foreach ($results as $key => $values) {
       	 
       	 	
           $skirts['skirts'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $skirts;
	}

	function getsuits()
	{
		$suits = array();
       $results = $this->model_home->get_suits();

       foreach ($results as $key => $values) {
       	 
       	 	
           $suits['suits'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $suits;
	}

	function getaccessories()
	{
		$accessories = array();
       $results = $this->model_home->get_accessories();

       foreach ($results as $key => $values) {
       	 
       	 	
           $accessories['accessories'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $accessories;
	}






	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */