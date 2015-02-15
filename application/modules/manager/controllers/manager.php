<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        parent::__construct();

        $this->load->model('m_manager');


         if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }

         $this->load->library('form_validation');
         $this->load->library('upload');
        
        $this->pic_path = realpath(APPPATH . '../uploads/');
          
    }


    function choosewaits()
  {
    $proddet = array();
       $results = $this->m_manager->get_waiting_products();

       foreach ($results as $key => $values) {
         
          
           $proddet['proddet'][] = $values;
         
       }

       // echo '<pre>';print_r($proddet);echo '</pre>';die;

        return $proddet;
  }


    function categoryupdate()
    {
       $this->load->library('form_validation');
        
        $this->form_validation->set_rules('catname', 'Category Name', 'trim|required|xss_clean|is_unique[category.cat_name]');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/category');
        
    }else{
 
          $result = $this->m_manager->update_category();
               //print_r($result);

        if($result){
                redirect(base_url() .'manager/category');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
         
    }


     function typeupdate()
    {
       $this->load->library('form_validation');
        
        $this->form_validation->set_rules('typename', 'Type Name', 'trim|required|xss_clean|is_unique[type.type_name]');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/type');
        
    }else{
 
          $result = $this->m_manager->update_type();
               //print_r($result);

        if($result){
                redirect(base_url() .'manager/type');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
         
    }


    function updatemember()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('mname', 'Middle Name', 'trim|min_length[2]|xss_clean');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('pnumber', 'Phone Number', 'trim|min_length[9]');
        $this->form_validation->set_rules('age', 'Age', 'trim|min_length[2]');
        $this->form_validation->set_rules('residence', 'Residence', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('religion', 'Religion', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|min_length[3]|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean');
        

        if($this->form_validation->run() == FALSE){
           echo 'Not working';die();
            redirect(base_url() .'manager/home');
            
        }else{

                $result = $this->m_manager->update_member();

              if($result){
                 redirect(base_url() .'manager/home');

              }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
              }


         }
    }



    function companyupdate()
    {
       $this->load->library('form_validation');
        
        $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companylocation', 'Company Location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companyaddress', 'Company Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companypnumber', 'Company Phone Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companyemail', 'Company Email', 'trim|required|xss_clean');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/company');
        
    }else{
 
          $result = $this->m_manager->update_company();
               //print_r($result);die();

        if($result){
                redirect(base_url() .'manager/company');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
         
    }


    function createcompaniesview($type,$status)
    {
      switch($status){

       case 'active':
        $companies = $this->m_manager->get_all_companies();
        $company_style = '';
        if ($companies) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($companies as $key => $company_details) {
                    $company_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $company_style .= '<td>'.$company_details['comp_id'].'</td>';
                    $company_style .= '<td>'.$company_details['company_name'].'</td>';
                    $company_style .= '<td>'.$company_details['company_location'].'</td>';
                    $company_style .= '<td>'.$company_details['company_address'].'</td>';
                    $company_style .= '<td>'.$company_details['company_pnumber'].'</td>';
                    $company_style .= '<td>'.$company_details['company_email'].'</td>';
                    $company_style .= '<td>'.$company_details['date_registered'].'</td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/companyprofile/'.$company_details['comp_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatecompany/delete/'.$company_details['comp_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    
                    $company_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

        case 'deactive':
         $companies = $this->m_manager->get_all_dcompanies();
        $company_style = '';
        if ($companies) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($companies as $key => $company_details) {
                    $company_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $company_style .= '<td>'.$company_details['comp_id'].'</td>';
                    $company_style .= '<td>'.$company_details['company_name'].'</td>';
                    $company_style .= '<td>'.$company_details['company_location'].'</td>';
                    $company_style .= '<td>'.$company_details['company_address'].'</td>';
                    $company_style .= '<td>'.$company_details['company_pnumber'].'</td>';
                    $company_style .= '<td>'.$company_details['company_email'].'</td>';
                    $company_style .= '<td>'.$company_details['date_registered'].'</td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$company_details['comp_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Activate Profile" href = "'.base_url().'manager/updatecompany/activate/'.$company_details['comp_id'].'"><i class="ion-ios-play icon black"></i></td>';
                    
                    $company_style .= '</tr>';
                    $counter++;
                }
                break;
            
            
            }
        }break;
      }
        return $company_style;
    }


    function createadminsview($type,$status)
    {

      switch($status){

        case 'active':
         $admins = $this->m_manager->get_all_admins();
        $admin_style = '';
        if ($admins) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($admins as $key => $admin_details) {
                    $admin_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $admin_style .= '<td>'.$admin_details['ac_id'].'</td>';
                    $admin_style .= '<td>'.$admin_details['f_name'].'</td>';
                    $admin_style .= '<td>'.$admin_details['l_name'].'</td>';
                    $admin_style .= '<td>'.$admin_details['age'].'</td>';
                    $admin_style .= '<td>'.$admin_details['nationality'].'</td>';
                    $admin_style .= '<td>'.$admin_details['phone_no'].'</td>';
                    $admin_style .= '<td>'.$admin_details['email'].'</td>';
                    $admin_style .= '<td>'.$admin_details['residence'].'</td>';
                    $admin_style .= '<td>'.$admin_details['religion'].'</td>';
                    $admin_style .= '<td>'.$admin_details['gender'].'</td>';
                    $admin_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/adminprofile/'.$admin_details['ac_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $admin_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updateadmin/delete/'.$admin_details['ac_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $admin_style .= '</tr>';
                    $counter++;
                }
                break;
            
            }
        }break;

        case 'deactive':
        $admins = $this->m_manager->get_all_dadmins();
        $admin_style = '';
        if ($admins) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($admins as $key => $admin_details) {
                    $admin_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $admin_style .= '<td>'.$admin_details['ac_id'].'</td>';
                    $admin_style .= '<td>'.$admin_details['f_name'].'</td>';
                    $admin_style .= '<td>'.$admin_details['l_name'].'</td>';
                    $admin_style .= '<td>'.$admin_details['age'].'</td>';
                    $admin_style .= '<td>'.$admin_details['nationality'].'</td>';
                    $admin_style .= '<td>'.$admin_details['phone_no'].'</td>';
                    $admin_style .= '<td>'.$admin_details['email'].'</td>';
                    $admin_style .= '<td>'.$admin_details['residence'].'</td>';
                    $admin_style .= '<td>'.$admin_details['religion'].'</td>';
                    $admin_style .= '<td>'.$admin_details['gender'].'</td>';
                    $admin_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/adminprofile/'.$admin_details['ac_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $admin_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Activate Profile" href = "'.base_url().'manager/updateadmin/activate/'.$admin_details['ac_id'].'"><i class="ion-ios-play icon black"></i></td>';
                    $admin_style .= '</tr>';
                    $counter++;
                }
                break;
            
            
            }
        }break;
       }
        return $admin_style;
      }


    function createproductsview($type)
    {
        $products = $this->m_manager->get_all_products();
        $product_style = '';
        if ($products) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($products as $key => $product_details) {
                    $product_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $product_style .= '<td>'.$product_details['prod_id'].'</td>';
                    $product_style .= '<td>'.$product_details['prod_name'].'</td>';
                    $product_style .= '<td>'.$product_details['prod_type'].'</td>';
                    $product_style .= '<td>'.$product_details['prod_cat'].'</td>';
                    $product_style .= '<td>'.$product_details['quantity'].'</td>';
                    $product_style .= '<td>'.$product_details['price'].'</td>';
                    $product_style .= '<td>'.$product_details['prod_company'].'</td>';
                    $product_style .= '<td>'.$product_details['date_added'].'</td>';
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/productprofile/'.$product_details['prod_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    
                    $product_style .= '</tr>';
                    $counter++;
                }
                break;
            
           
            }
        }

        return $product_style;
    }

    function createmessagesview($type)
    {
        $messages = $this->m_manager->get_all_messages();
        $message_style = '';
        if ($messages) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($messages as $key => $message_details) {
                    $message_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $message_style .= '<td>'.$message_details['mm_id'].'</td>';
                    $message_style .= '<td>'.$message_details['mm_subject'].'</td>';
                    $message_style .= '<td>'.$message_details['mm_message'].'</td>';
                    $message_style .= '<td>'.$message_details['date_sent'].'</td>';
                    $message_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/messageprofile/'.$message_details['mm_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $message_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatemessage/delete/'.$message_details['mm_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    
                    $message_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }

        return $message_style;
    }

    function createcategoriesview($type,$status)
    {

      switch($status){
        case 'active':
        $categories = $this->m_manager->get_all_categories();
        $category_style = '';
        if ($categories) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($categories as $key => $category_details) {
                    $category_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $category_style .= '<td>'.$category_details['cat_id'].'</td>';
                    $category_style .= '<td>'.$category_details['cat_name'].'</td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$category_details['cat_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatecategory/delete/'.$category_details['cat_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $category_style .= '</tr>';
                    $counter++;
                }
                break;
            
          
            }
        }break;

        case 'deactive':
        $categories = $this->m_manager->get_all_dcategories();
        $category_style = '';
        if ($categories) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($categories as $key => $category_details) {
                    $category_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $category_style .= '<td>'.$category_details['cat_id'].'</td>';
                    $category_style .= '<td>'.$category_details['cat_name'].'</td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$category_details['cat_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Activate Profile" href = "'.base_url().'manager/updatecategory/activate/'.$category_details['cat_id'].'"><i class="ion-ios-play icon black"></i></td>';
                    $category_style .= '</tr>';
                    $counter++;
                }
                break;
            
            }
        }break;
      }
        return $category_style;
    }

    function createtypesview($type,$status)
    {
      switch($status){

        case 'active':
        $types = $this->m_manager->get_all_types();
        $typ_style = '';
        if ($types) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($types as $key => $typ_details) {
                    $typ_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $typ_style .= '<td>'.$typ_details['type_id'].'</td>';
                    $typ_style .= '<td>'.$typ_details['type_name'].'</td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/typeprofile/'.$typ_details['type_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatetype/delete/'.$typ_details['type_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $typ_style .= '</tr>';
                    $counter++;
                }
                break;
            
            
            }
        }break;


        case 'deactive':
        $types = $this->m_manager->get_all_dtypes();
        $typ_style = '';
        if ($types) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($types as $key => $typ_details) {
                    $typ_style .= '<tr>';
                    // $admin_style .= '<td>'.$counter.'</td>';
                    $typ_style .= '<td>'.$typ_details['type_id'].'</td>';
                    $typ_style .= '<td>'.$typ_details['type_name'].'</td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/typeprofile/'.$typ_details['type_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Activate Profile" href = "'.base_url().'manager/updatetype/activate/'.$typ_details['type_id'].'"><i class="ion-ios-play icon black"></i></td>';
                    $typ_style .= '</tr>';
                    $counter++;
                }
                break;
            
            
        }break;
      }
    }
        return $typ_style;
    }

    function updatetype($type, $type_id)
  {
    $update = $this->m_manager->updatetype($type, $type_id);
    if($update)
    {
      switch ($type) {
        case 'delete':
          redirect(base_url() .'manager/home');
          break;
        
        default:
          # code...
          break;
      }
    }
  }

  function updatecompany($type, $comp_id)
  {
    $update = $this->m_manager->updatecompany($type, $comp_id);
    if($update)
    {
      switch ($type) {
        case 'delete':
          redirect(base_url() .'manager/home');
          break;
        
        default:
          # code...
          break;
      }
    }
  }

  function updatecategory($type, $cat_id)
  {
    $update = $this->m_manager->updatecategory($type, $cat_id);
    if($update)
    {
      switch ($type) {
        case 'delete':
          redirect(base_url() .'manager/home');
          break;
        
        default:
          # code...
          break;
      }
    }
  }


  function updatemessage($type, $mm_id)
  {
    $update = $this->m_manager->updatemessage($type, $mm_id);
    if($update)
    {
      switch ($type) {
        case 'delete':
          redirect(base_url() .'manager/messages');
          break;
        
        default:
          # code...
          break;
      }
    }
  }

  function updateproduct($type, $prod_id)
  {

    //print_r($prod_id);die();
    $update = $this->m_manager->updateproduct($type, $prod_id);
    if($update)
    {
      //print_r($update);die();
      switch ($type) {
        case 'approve':
         
          redirect(base_url() .'manager/approvals/'.$type);
          break;

        case 'disapprove':
         
          redirect(base_url() .'manager/approvals/'.$type);
          break;
        
        default:
          # code...
          break;
      }
    }else{
      //echo "Problem";
    }
  }





    function create_category()
  {
    $this->load->library('form_validation');
        
        $this->form_validation->set_rules('catname', 'Category Name', 'trim|required|xss_clean|is_unique[category.cat_name]');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/category');
        
    }else{
 
          $result = $this->m_manager->enter_category();
               //print_r($result);

        if($result){
                redirect(base_url() .'manager/category');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
       
  }


  function create_admin()
  {
    $this->load->library('form_validation');
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|min_length[2]|xss_clean');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|min_length[2]|required|xss_clean');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'trim|min_length[3]');
        $this->form_validation->set_rules('age', 'Age', 'trim|min_length[2]');
        $this->form_validation->set_rules('residence', 'Residence', 'trim|min_length[2]|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|min_length[3]|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean|is_unique[accounts.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'trim|min_length[3]|max_length[15]|required|xss_clean');
        $this->form_validation->set_rules('username', 'User Name', 'trim|min_length[3]|required|xss_clean|is_unique[logs.username]');
        $this->form_validation->set_rules('pass2', 'Re-Entered Password', 'trim|required|matches[pass1]|xss_clean');

    if($this->form_validation->run() == FALSE){
      echo 'Not working';die();
      redirect(base_url() .'manager/admin');
        
    }else{
       //echo 'Not working';die();
       //var_dump(realpath('application/modules/user'));
      $path = base_url().'uploads/users/';
           $config['upload_path'] = 'uploads/users/';
           $config['allowed_types'] = 'jpeg|jpg|png|gif';
           $config['encrypt_name'] = TRUE;
           $this->load->library('upload', $config);
           $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('picture'))
        {
         $error = array('error' => $this->upload->display_errors());

         print_r($error);die;
        }
         else
         {
           
                $data = array('upload_data' => $this->upload->data());
           foreach ($data as $key => $value) {
          //print_r($data);die;
          $path = base_url().'uploads/users/'.$value['file_name'];
        
                  }
          $result = $this->m_manager->enter_admin($path);
               //print_r($result);die();

        if($result){
                 redirect(base_url() .'manager/admin');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
       }
  }


  function create_company()
  {
    $this->load->library('form_validation');
        
        $this->form_validation->set_rules('companyname', 'Company Name', 'trim|required|xss_clean|is_unique[company.company_name]');
        $this->form_validation->set_rules('companylocation', 'Company Location', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companyaddress', 'Company Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('companypnumber', 'Company Phone Number', 'trim|required|xss_clean|is_unique[company.company_pnumber]');
        $this->form_validation->set_rules('companyemail', 'Company Email', 'trim|required|xss_clean|is_unique[company.company_email]');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/company');
        
    }else{
 
          $result = $this->m_manager->enter_company();
               //print_r($result);

        if($result){
                redirect(base_url() .'manager/company');

          }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
       
  }


  function create_type()
  {
    $this->load->library('form_validation');
        
        $this->form_validation->set_rules('typename', 'Type Name', 'trim|required|xss_clean|is_unique[type.type_name]');
        
        

    if($this->form_validation->run() == FALSE){
      // echo 'Not working';die();
      redirect(base_url() .'manager/type');
        
    }else{
 
          $result = $this->m_manager->enter_type();
               //print_r($result);

        if($result){
                redirect(base_url() .'manager/type');

          }else{
                 echo 'There was a problem with the Type module.<br/>Please contact the administrator';
        }
        }
       
  }

  

  public function getadminnumber()
  {
          $results = $this->m_manager->adminnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getdadminnumber()
  {
          $results = $this->m_manager->dadminnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getmessagenumber()
  {
          $results = $this->m_manager->messagenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getcompanynumber()
  {
          $results = $this->m_manager->companynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getdcompanynumber()
  {
          $results = $this->m_manager->dcompanynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getproductnumber()
  {
          $results = $this->m_manager->productnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getcategorynumber()
  {
          $results = $this->m_manager->categorynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getdcategorynumber()
  {
          $results = $this->m_manager->dcategorynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function gettypenumber()
  {
          $results = $this->m_manager->typenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getdtypenumber()
  {
          $results = $this->m_manager->dtypenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getwaitnumber()
  {
          $results = $this->m_manager->waitnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  public function getdisapporvenumber()
  {
          $results = $this->m_manager->disapprovenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }

  


   function home()
   {
   		
    $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    
    
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['product_table'] = $this->createproductsview('table');
    $data['companies_table'] = $this->createcompaniesview('table','active');
    $data['categories_table'] = $this->createcategoriesview('table','active');
    $data['types_table'] = $this->createtypesview('table','active');

   	$this->load->view('manager', $data);
   		
   } 

   function productsview()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['approvenumber']  = $this->getwaitnumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['product_table'] = $this->createproductsview('table');
    $this->load->view('products_view',$data);
      
   }

   function approvals($type=NULL)
   {
    $data['error'] = '';
        
    //echo '<pre>';print_r($message);echo'</pre>';die();
    $data['approve_message'] = $type;
    $data['waits'] = $this->choosewaits();

    $this->load->view('approve_header', array('logged_in' => $this->logged_in));  
    $this->load->view('approvals',$data); 
    $this->load->view('approve_footer');   
   }

   function messages()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['message_table'] = $this->createmessagesview('table');
    $this->load->view('messages',$data);
      
   }

   function statistics()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $this->load->view('statistics',$data);
      
   }

   function category()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['categories_table'] = $this->createcategoriesview('table','active');
    $this->load->view('category_form',$data);
      
   }

   function dcat()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['dcategorynumber']  = $this->getdcategorynumber(); 
    $data['categories_table'] = $this->createcategoriesview('table','deactive');
    $this->load->view('dcategory_form',$data);
      
   }

   function type()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['types_table'] = $this->createtypesview('table','active'); 
    $this->load->view('type_form',$data);
      
   }

   function dtype()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['dtypenumber']  = $this->getdtypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['types_table'] = $this->createtypesview('table','deactive'); 
    $this->load->view('dtype_form',$data);
      
   }

   function admin()
   {
      
    $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    
    
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['adminnumber']  = $this->getadminnumber();

    $data['companynumber']  = $this->getcompanynumber();
    $data['admin_table'] = $this->createadminsview('table','active');
    

    $this->load->view('admin_page', $data);
      
   } 


   function dadmin()
   {
      
    $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    
    
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['adminnumber']  = $this->getadminnumber();
    $data['dadminnumber']  = $this->getdadminnumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['admin_table'] = $this->createadminsview('table','deactive');
    

    $this->load->view('dadmin_form', $data);
      
   } 

   function company()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['companies_table'] = $this->createcompaniesview('table','active');
    $this->load->view('company_form',$data);
      
   }


   function dcomp()
   {
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
    $data['companies_table'] = $this->createcompaniesview('table','deactive');
    $this->load->view('dcompany_form',$data);
      
   }

   function productprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->productprofile($id);

        foreach ($results as $key => $values) {
            $details['product'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['product'] = $details;
        

        $this->load->view('view_product', $data);
 
    }


    function adminprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->adminprofile($id);

        foreach ($results as $key => $values) {
            $details['admin'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['admin'] = $details;
       

        $this->load->view('view_admin', $data);
 
    }


    function companyprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->companyprofile($id);

        foreach ($results as $key => $values) {
            $details['company'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['company'] = $details;
   
        $this->load->view('view_company', $data);
 
    }


    function categoryprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->categoryprofile($id);

        foreach ($results as $key => $values) {
            $details['category'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['category'] = $details;
      

        $this->load->view('view_category', $data);
 
    }


    function typeprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->typeprofile($id);

        foreach ($results as $key => $values) {
            $details['type'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['type'] = $details;
       

        $this->load->view('view_type', $data);
 
    }


    function messageprofile($id)
    {
        $userdet = array();
        $results = $this->m_manager->messageprofile($id);

        foreach ($results as $key => $values) {
            $details['message'][] = $values;  
        }
       // echo '<pre>';print_r($data['user']);echo '</pre>';die;

        $data['error'] = '';
        $oid = $this->session->userdata('ac_id');
        $results = $this->m_manager->ownprofile($oid);

        foreach ($results as $key => $values) {
            $odetails['ownprofile'][] = $values;  
        }
        $data['ownprofile'] = $odetails;
        $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['dcompanynumber']  = $this->getdcompanynumber();  
        $data['message'] = $details;
       

        $this->load->view('view_message', $data);
 
    }

    




















}