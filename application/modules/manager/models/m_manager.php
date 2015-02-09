<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manager extends MY_Model {

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

   public function companynumber(){
    $sql = "SELECT COUNT(`comp_id`) as companies FROM company";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->companies;
   }

   public function messagenumber(){
    $sql = "SELECT COUNT(`mail_id`) as mails FROM mail";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->mails;
   }

   public function productnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function categorynumber(){
    $sql = "SELECT COUNT(`cat_id`) as categories FROM category";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->categories;
   }

   public function typenumber(){
    $sql = "SELECT COUNT(`type_id`) as types FROM type";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->types;
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

  public function get_all_types()
  {
    $types = array();
    $query = $this->db->get_where('type', array('status' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $types[$value['type_id']] = $value;
      }
      //echo '<pre>';print_r($types);echo '</pre>';die();
      return $types;

    }
    
    return $types;
  }

  public function get_all_categories()
  {
    $categories = array();
    $query = $this->db->get_where('category', array('status' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $categories[$value['cat_id']] = $value;
      }
      //echo '<pre>';print_r($categories);echo '</pre>';die();
      return $categories;

    }
    
    return $categories;
  }


  public function updatetype($type, $type_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['status'] = 0; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('type_id', $type_id);
    $update = $this->db->update('type', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }


  public function updatecategory($type, $cat_id)
  {
    $data = array();
    switch ($type) {
      case 'delete':
        $data['status'] = 0; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('cat_id', $cat_id);
    $update = $this->db->update('category', $data);

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
        $data['status'] = 0; 
        
        break;
      
      case 'update':
        $data = $this->input->post();
        break;
      default:
        # code...
        break;
    }
    $this->db->where('comp_id', $cat_id);
    $update = $this->db->update('company', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }



  public function enter_category(){
      $categoryname = strtoupper($this->input->post('catname'));
      
      

      $category_details_data = array();
      $category_details = array(
          'cat_name' => $categoryname
          
      );

        

        array_push($category_details_data, $category_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('category',$category_details_data);
       

      if($this->db->affected_rows() === 1){

        return $categoryname;

      }else{
      
      $subject = 'Category Entry';
      $message = 'Problem in registering category name '.$categoryname.'. Please rectify immediatelly';

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

    public function enter_company(){
      $companyname = strtoupper($this->input->post('companyname'));
      $companylocation = strtoupper($this->input->post('companylocation'));
      $companyaddress = strtoupper($this->input->post('companyaddress'));
      $companypnumber = strtoupper($this->input->post('companypnumber'));
      $companyemail = strtoupper($this->input->post('companyemail'));
      
      

      $company_details_data = array();
      $company_details = array(
          'company_name' => $companyname,
          'company_location' => $companylocation,
          'company_address' => $companyaddress,
          'company_pnumber' => $companypnumber,
          'company_email' => $companyemail
          
      );

        

        array_push($company_details_data, $company_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('company',$company_details_data);
       

      if($this->db->affected_rows() === 1){

        return $companyname;

      }else{
      
      $subject = 'Company Entry';
      $message = 'Problem in registering company name '.$companyname.'. Please rectify immediatelly';

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

    public function enter_type(){
      $typename = strtoupper($this->input->post('typename'));
      
      

      $type_details_data = array();
      $type_details = array(
          'type_name' => $typename
          
      );

        

        array_push($type_details_data, $type_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('type',$type_details_data);
       

      if($this->db->affected_rows() === 1){

        return $typename;

      }else{
      
      $subject = 'Type Entry';
      $message = 'Problem in registering type name '.$typename.'. Please rectify immediatelly';

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





}