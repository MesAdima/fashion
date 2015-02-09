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


    function createcompaniesview($type)
    {
        $companies = $this->m_manager->get_all_companies();
        $company_style = '';
        if ($companies) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($companies as $key => $company_details) {
                    $company_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $company_style .= '<td>'.$company_details['comp_id'].'</td>';
                    $company_style .= '<td>'.$company_details['company_name'].'</td>';
                    $company_style .= '<td>'.$company_details['company_location'].'</td>';
                    $company_style .= '<td>'.$company_details['company_address'].'</td>';
                    $company_style .= '<td>'.$company_details['company_pnumber'].'</td>';
                    $company_style .= '<td>'.$company_details['company_email'].'</td>';
                    $company_style .= '<td>'.$company_details['date_registered'].'</td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$company_details['comp_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatecategory/delete/'.$company_details['comp_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    
                    $company_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }

        return $company_style;
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
                    // $user_style .= '<td>'.$counter.'</td>';
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
            
            default:
                # code...
                break;
            }
        }

        return $product_style;
    }

    function createcategoriesview($type)
    {
        $categories = $this->m_manager->get_all_categories();
        $category_style = '';
        if ($categories) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($categories as $key => $category_details) {
                    $category_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $category_style .= '<td>'.$category_details['cat_id'].'</td>';
                    $category_style .= '<td>'.$category_details['cat_name'].'</td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$category_details['cat_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $category_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatecategory/delete/'.$category_details['cat_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $category_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }

        return $category_style;
    }

    function createtypesview($type)
    {
        $types = $this->m_manager->get_all_types();
        $typ_style = '';
        if ($types) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($types as $key => $typ_details) {
                    $typ_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $typ_style .= '<td>'.$typ_details['type_id'].'</td>';
                    $typ_style .= '<td>'.$typ_details['type_name'].'</td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'manager/categoryprofile/'.$typ_details['type_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $typ_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'manager/updatecategory/delete/'.$typ_details['type_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $typ_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }

        return $typ_style;
    }

    function updatetype($type, $type_id)
  {
    $update = $this->admin_model->updatetype($type, $type_id);
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





    function create_category()
  {
    $this->load->library('form_validation');
        
        $this->form_validation->set_rules('catname', 'Category Name', 'trim|required|xss_clean|is_unique[type.type_name]');
        
        

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
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
        }
        }
       
  }

  public function getusernumber()
  {
          $results = $this->m_manager->usernumber();

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

  public function gettypenumber()
  {
          $results = $this->m_manager->typenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
  }


   function home()
   {
   		
    $data['error'] = '';
    
    
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['product_table'] = $this->createproductsview('table');
    $data['companies_table'] = $this->createcompaniesview('table');
    $data['categories_table'] = $this->createcategoriesview('table');
    $data['types_table'] = $this->createtypesview('table');

   	$this->load->view('manager', $data);
   		
   } 

   function productsview()
   {
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();
    $data['product_table'] = $this->createproductsview('table');
    $this->load->view('products_view',$data);
      
   }

   function statistics()
   {
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $this->load->view('statistics',$data);
      
   }

   function category()
   {
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['categories_table'] = $this->createcategoriesview('table');
    $this->load->view('category_form',$data);
      
   }

   function type()
   {
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber(); 
    $data['types_table'] = $this->createtypesview('table'); 
    $this->load->view('type_form',$data);
      
   }

   function company()
   {
    $data['messagenumber']  = $this->getmessagenumber();
    $data['productnumber']  = $this->getproductnumber();
    $data['categorynumber']  = $this->getcategorynumber();
    $data['typenumber']  = $this->gettypenumber();
    $data['companynumber']  = $this->getcompanynumber();  
    $data['companies_table'] = $this->createcompaniesview('table');
    $this->load->view('company_form',$data);
      
   }




















}