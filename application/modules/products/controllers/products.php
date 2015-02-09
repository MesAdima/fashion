<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        parent::__construct();


        $this->load->model('products/product_model');

        if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }
          
    }

    
	public function index()
	{
		
	}


    public function view()
	{
        $this->load->library('pagination');
        $this->load->library('table');

        $data['total_rows'] = $this->db->get('products')->num_rows();
        $data['per_page'] = 9;
        $data['num_links'] = 3;
        $data['records'] = $this->choosecriteria($data['per_page'], $this->uri->segment(3) );

        $this->pagination->initialize($data); 


		$data['product_categories']  = $this->getproductcategories();
        $data['product_types']  = $this->getproducttypes();
        $data['product_companies']  = $this->getproductcompanies();
        $data['criteria'] = $this->choosecriteria();


		$this->load->view('p_header', array('logged_in' => $this->logged_in));
		$this->load->view('v_products', $data);
		$this->load->view('p_footer');
    }





    function getproductcategories()
	{
        $results = $this->product_model->get_product_category();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcat ='<option selected="selected" value="">Select the Category</option>';
        foreach ($results as $value) {
            $prodcat .= '<option value="' . $value['cat_name'] . '">' . $value['cat_name'] . '</option>';  
        }
        return $prodcat;
	}

	function getproducttypes()
	{
        $results = $this->product_model->get_product_type();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodtype ='<option selected="selected" value="">Select the Type</option>';
        foreach ($results as $value) {
            $prodtype .= '<option value="' . $value['type_name'] . '">' . $value['type_name'] . '</option>';  
        }
        return $prodtype;
	}

	function getproductcompanies()
	{
        $results = $this->product_model->get_product_company();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcomp ='<option selected="selected" value="">Select the Company</option>';
        foreach ($results as $value) {
            $prodcomp .= '<option value="' . $value['company_name'] . '">' . $value['company_name'] . '</option>';  
        }
        return $prodcomp;
	}

	function choosecriteria()
	{
		$proddet = array();
       $results = $this->product_model->get_details();

       foreach ($results as $key => $values) {
       	 
       	 	
           $proddet['proddet'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $proddet;
	}





}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */