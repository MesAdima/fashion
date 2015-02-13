<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   

  public function get_details()
  {
    $products = array();
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved'=> 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($value);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }

  public function get_all_companies()
  {
    $companies = array();
    $query = $this->db->get_where('company', array('status' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $companies[$value['comp_id']] = $value;
      }
      //echo '<pre>';print_r($companies);echo '</pre>';die();
      return $companies;

    }
    
    return $companies;
  }


    

    public function updatecompany($type, $comp_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['is_status'] = 0; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('comp_id', $comp_id);
    $update = $this->db->update('company', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }


 

    public function get_product_category()
    {
      $query = "SELECT * FROM category";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }

    public function get_product_type()
    {
      $query = "SELECT * FROM type";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }

     public function get_product_company()
    {
      $query = "SELECT * FROM company";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }




   
}