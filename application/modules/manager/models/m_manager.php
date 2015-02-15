<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_manager extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function get_waiting_products()
  {
    $products = array();
    $this->db->order_by("prod_id", "asc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved' => 2));
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



    public function enter_admin($path){
      $firstname = strtoupper($this->input->post('firstname'));
      $middlename = strtoupper($this->input->post('middlename'));
      $lastname = strtoupper($this->input->post('lastname'));
      $filename = $this->input->post('picture');
      $pnumber = $this->input->post('phonenumber');
      $gender = strtoupper($this->input->post('gender'));
      $nationality = strtoupper($this->input->post('nationality'));
      $age = $this->input->post('age');
      $religion = strtoupper($this->input->post('religion'));
      $residence = strtoupper($this->input->post('residence'));
      $username = $this->input->post('username');
      $passw1 = md5($this->input->post('pass1'));
      
      $email = $this->input->post('email');

      $member_details_data = array();
      $member_details = array(
          'f_name' => $firstname,
          'm_name' => $middlename,
          'l_name' => $lastname,
          'picture' => $path,
          'age' => $age,
          'nationality' => $nationality,
          'phone_no' => $pnumber,
          'email' => $email,
          'residence' => $residence,
          'religion' => $religion,
          'gender' => $gender
      );

        

        array_push($member_details_data, $member_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('accounts',$member_details_data);

      $member_credentials_data = array();
      $member_credentials = array(
          'username' => $username,
          'password' => $passw1,
          'lt_id' => 3
      );

      array_push($member_credentials_data, $member_credentials);

      $this->db->insert_batch('logs',$member_credentials_data);
       

      if($this->db->affected_rows() === 1){

        return $username;

      }else{

      $subject = 'Member Entry';
      $message = 'Problem in registering User Name '.$username.' . Please rectify immediatelly';

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
        $this->email->subject('Failed registeration of a user');

        if(isset($email)){
            $this->email->message('Unable to register and insert user with the email of '.$email.' to the database.');
        }else{
            $this->email->message('Unable to register and insert user to the database.');

        }

        $this->email->send();
        return FALSE;
     }
    }
  


    public function usernumber(){
    $sql = "SELECT COUNT(`ac_id`) as users FROM accounts WHERE `is_deleted` = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->users;
   }

   public function adminnumber(){
    $sql = "SELECT COUNT(ac.ac_id) as users FROM accounts ac, logs l WHERE ac.is_deleted = 0 AND l.lt_id=ac.ac_id AND l.lt_id = 3 ";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->users;
   }

   public function companynumber(){
    $sql = "SELECT COUNT(`comp_id`) as companies FROM company WHERE `status` = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->companies;
   }

   public function messagenumber(){
    $sql = "SELECT COUNT(`mm_id`) as mails FROM manager_mail WHERE `is_deleted` = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->users;die();

        return $data->mails;
   }

   public function productnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE `is_deleted` = 0 AND `approved` = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function waitnumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE `is_deleted` = 0 AND `approved` = 2";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function disapprovenumber(){
    $sql = "SELECT COUNT(`prod_id`) as products FROM products WHERE `is_deleted` = 0 AND `approved` = 0";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->products;
   }

   public function categorynumber(){
    $sql = "SELECT COUNT(`cat_id`) as categories FROM category WHERE `status` = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->categories;
   }

   public function typenumber(){
    $sql = "SELECT COUNT(`type_id`) as types FROM type  WHERE `status` = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //print_r($data);die();

        return $data->types;
   }


   public function get_all_products()
  {
    $products = array();
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'approved' => 1));
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

  public function get_all_messages()
  {
    $messages = array();
    $query = $this->db->get_where('manager_mail', array('is_deleted' => 0));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $messages[$value['mm_id']] = $value;
      }
      //echo '<pre>';print_r($users);echo '</pre>';die();
      
      return $messages;
    }
    
    return $messages;
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

  public function get_all_admins()
  {
    $admin = array();
    
    $this->db->join('logs', 'accounts.ac_id = logs.log_id');
    $query = $this->db->get_where('accounts',array('lt_id' => 3, 'is_deleted' => 0));

    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $admin[$value['ac_id']] = $value;
      }
      //echo '<pre>';print_r($admin);echo '</pre>';die();
      
      return $admin;
    }
    
    return $admin;
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

  public function updatemessage($type, $mm_id)
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
    $this->db->where('mm_id', $mm_id);
    $update = $this->db->update('manager_mail', $data);

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
      case 'approve':
        $data['approved'] = 1; 
        
        break;
      
      case 'disapprove':
         $data['approved'] = 0; 

        break;

      default:
        # code...
        break;
    }
    $this->db->where('prod_id', $prod_id);
    $update = $this->db->update('products', $data);

    if($type=="approve"){

          $subject = "New Product Approved";
          $message = 'Product ID '.$prod_id.' was approved';

      $mail_to_admin = array();
      $mail_admin = array(
          'subject' => $subject,
          'message' => $message
        );

      array_push($mail_to_admin, $mail_admin);

      $this->db->insert_batch('mail',$mail_to_admin);


    }elseif ($type=="disapprove") {


          $subject = "New Product Disapproved";
          $message = 'Product ID '.$prod_id.' was disapproved';

      $mail_to_admin = array();
      $mail_admin = array(
          'subject' => $subject,
          'message' => $message
        );

      array_push($mail_to_admin, $mail_admin);

      $this->db->insert_batch('mail',$mail_to_admin);


    }else{

      $subject = "New Product Needs Approval";
      $message = 'New product called '.$productname.' from '.$productcompany.' needs your approval';

      $mail_to_manager = array();
      $mail_manager = array(
          'mm_subject' => $subject,
          'mm_message' => $message
        );

      array_push($mail_to_manager, $mail_manager);

      $this->db->insert_batch('manager_mail',$mail_to_manager);
    }




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