<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_home extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function get_shirts()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SHIRT', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
       
      foreach ($result as $key => $value) {

          $products[$value['prod_id']] = $value;
        
     } 

      //echo '<pre>';print_r($products);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }


  public function get_skirts()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SKIRT', 'approved' => 1));
    $result = $query->result_array();

    if ($result) {
      foreach ($result as $key => $value) {
        $products[$value['prod_id']] = $value;
      }
      //echo '<pre>';print_r($products);echo '</pre>';die();
      
      return $products;
    }
    
    return $products;
  }

  public function get_suits()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'SUITS', 'approved' => 1));
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

  public function get_accessories()
  {
    $products = array();
    $this->db->limit(4);
    $this->db->order_by("prod_id", "desc");
    $query = $this->db->get_where('products', array('is_deleted' => 0, 'prod_type' => 'ACCESSORIES', 'approved' => 1));
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

    public function enter_comment(){
      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $message = $this->input->post('message');  

      $subject = 'A Comment from '.$name.' with email address '.$email.' ';


      $comment_details_data = array();
      $comment_details = array(
          'mm_subject' => $subject,
          'mm_message' => $message
      );

        

        array_push($comment_details_data, $comment_details);

        //echo '<pre>'; print_r($member_details_data); echo '<pre>'; die;

        $this->db->insert_batch('manager_mail',$comment_details_data);


      if($this->db->affected_rows() === 1){

        return $name;

      }else{

      $subject = 'Comment Entry';
      $message = 'Problem in Commenting from Name '.$name.' . Please rectify immediatelly';

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

   
}