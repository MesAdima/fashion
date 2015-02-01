<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   public function usernumber(){
    $sql = "SELECT COUNT(`ac_id`) as users FROM accounts";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->users;
   }

   public function messagenumber(){
    $sql = "SELECT COUNT(`mail_id`) as mails FROM mail";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->mails;
   }

   public function companynumber(){
    $sql = "SELECT COUNT(`comp_id`) as companies FROM company";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->companies;
   }

   public function productnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function get_all_users()
  {
    $users = array();
    $query = $this->db->get_where('accounts', array('is_deleted' => 0));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $users[$value['ac_id']] = $value;
      }
      //echo '<pre>';print_r($users);echo '</pre>';die();
      
      return $users;
    }
    
    return $users;
  }

  public function get_all_products()
  {
    $products = array();
    $query = $this->db->get_where('products', array('is_deleted' => 0));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($users);echo '</pre>';die();
      
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

  public function updateuser($type, $ac_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['is_deleted'] = 1; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('ac_id', $ac_id);
    $update = $this->db->update('accounts', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }


  public function updateproduct($type, $prod_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['is_deleted'] = 1; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('prod_id', $prod_id);
    $update = $this->db->update('productss', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
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


  public function enter_product($path){
      $productname = strtoupper($this->input->post('prodname'));
      $productcategory = strtoupper($this->input->post('prodcategory'));
      $producttype = strtoupper($this->input->post('prodtype'));
      $filename = $this->input->post('prodpicture');
      $productquantity = $this->input->post('prodquantity');
      $productcompany = strtoupper($this->input->post('prodcompany'));
      

      $product_details_data = array();
      $product_details = array(
          'prod_name' => $productname,
          'prod_type' => $productcategory,
          'prod_cat' => $producttype,
          'picture' => $path,
          'quantity' => $productquantity,
          'prod_company' => $productcompany
      );

        

        array_push($product_details_data, $product_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('products',$product_details_data);
       

      if($this->db->affected_rows() === 1){

        return $productname;

      }else{
      
      $subject = 'Product Entry';
      $message = 'Problem in registering '.$productquantity.' product name '.$productname.' from '.$productcompany.' company. Please rectify immediatelly';

      $message_details_data = array();
      $message_details = array(
          'subject' => $subject,
          'message' => $message
      );

        

        array_push($message_details_data, $message_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('mail',$message_details_data);

        //echo 'Applicant is not able to be registered';
        $this->load->library('email');
        $this->email->from('info@marewill.com','MareWill Fashion');
        $this->email->to('marekawilly@marewill.com','marekawilly@gmail.com');
        $this->email->subject('Failed registeration of a product(s)');

        if(isset($email)){
            $this->email->message('Unable to register and insert user with the email of '.$email.' to the database.');
        }else{
            $this->email->message('Unable to register and insert user to the database.');

        }

        $this->email->send();
        return FALSE;
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