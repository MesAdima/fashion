<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   public function usernumber(){
    $sql = "SELECT COUNT(`ac_id`) as users FROM accounts WHERE is_deleted = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->users;
   }

   public function dusernumber(){
    $sql = "SELECT COUNT(`ac_id`) as users FROM accounts WHERE is_deleted = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->users;
   }

   public function messagenumber(){
    $sql = "SELECT COUNT(`mail_id`) as mails FROM mail WHERE is_deleted = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->mails;
   }

   public function companynumber(){
    $sql = "SELECT COUNT(`comp_id`) as companies FROM company WHERE status = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->companies;
   }

   public function dcompanynumber(){
    $sql = "SELECT COUNT(`comp_id`) as companies FROM company WHERE status = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->companies;
   }

   public function productnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE is_deleted = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function dproductnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE approved = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function delproductnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE is_deleted = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function get_all_users()
  {
    $users = array();
    $this->db->order_by("ac_id", "desc");
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


  public function get_all_dusers()
  {
    $users = array();
    $this->db->order_by("ac_id", "desc");
    $query = $this->db->get_where('accounts', array('is_deleted' => 1));
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
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved' => 1 ));
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

  public function get_all_dproducts()
  {
    $products = array();
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved' => 0 ));
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

  public function get_all_delproducts()
  {
    $products = array();
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 1, 'approved' => 0 ));
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
    $this->db->order_by("comp_id", "desc");
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

  public function get_all_dcompanies()
  {
    $companies = array();
    $this->db->order_by("comp_id", "desc");
    $query = $this->db->get_where('company', array('status' => 0));
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

  public function get_all_messages()
  {
    $messages = array();
    $this->db->order_by("mail_id", "desc");
    $query = $this->db->get_where('mail', array('is_deleted' => 0));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $messages[$value['mail_id']] = $value;
      }
      //echo '<pre>';print_r($messages);echo '</pre>';die();
      return $messages;

    }
    
    return $messages;
  }

  public function updateuser($type, $ac_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['is_deleted'] = 1; 
        
        break;

      case 'activate':
        $data['is_deleted'] = 0; 
        
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

      case 'restore':
        $data['is_deleted'] = 0; 
        
        break;

      case 'activate':
        $data['approved'] = 2; 


        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('prod_id', $prod_id);
    $update = $this->db->update('products', $data);


    $subject = "Disapproved Product Needs Approval";
      $message = 'Disapproved product with ID '.$prod_id.' has been requested again for your approval';

      $mail_to_manager = array();
      $mail_manager = array(
          'mm_subject' => $subject,
          'mm_message' => $message
        );

      array_push($mail_to_manager, $mail_manager);

      $this->db->insert_batch('manager_mail',$mail_to_manager);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function updatemessage($type, $mail_id)
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
    $this->db->where('mail_id', $mail_id);
    $update = $this->db->update('mail', $data);

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
      $productprice = $this->input->post('prodprice');
      $productcompany = strtoupper($this->input->post('prodcompany'));
      

      $product_details_data = array();
      $product_details = array(
          'prod_name' => $productname,
          'prod_cat' => $productcategory,
          'prod_type' => $producttype,
          'picture' => $path,
          'quantity' => $productquantity,
          'price' => $productprice,
          'prod_company' => $productcompany
      );

      array_push($product_details_data, $product_details);

      $this->db->insert_batch('products',$product_details_data);


      $subject = "New Product Needs Approval";
      $message = 'New product called '.$productname.' from '.$productcompany.' needs your approval';

      $mail_to_manager = array();
      $mail_manager = array(
          'mm_subject' => $subject,
          'mm_message' => $message
        );

      array_push($mail_to_manager, $mail_manager);

      $this->db->insert_batch('manager_mail',$mail_to_manager);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        
       

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
      $query = "SELECT * FROM category WHERE status = 1";
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
      $query = "SELECT * FROM type WHERE status = 1";
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
      $query = "SELECT * FROM company WHERE status = 1";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
    }




   
}