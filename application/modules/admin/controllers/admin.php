<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');

        if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }

         $this->load->library('form_validation');
         $this->load->library('upload');
        
        $this->pic_path = realpath(APPPATH . '../uploads/');
          
    }

	

	function createusersview($type,$status)
    {
    	switch($status){

    		case 'active':

        $users = $this->admin_model->get_all_users();
        $user_style = '';
        if ($users) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($users as $key => $user_details) {
                    $user_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $user_style .= '<td>'.$user_details['ac_id'].'</td>';
                    $user_style .= '<td>'.$user_details['f_name'].'</td>';
                    $user_style .= '<td>'.$user_details['l_name'].'</td>';
                    $user_style .= '<td>'.$user_details['age'].'</td>';
                    $user_style .= '<td>'.$user_details['nationality'].'</td>';
                    $user_style .= '<td>'.$user_details['phone_no'].'</td>';
                    $user_style .= '<td>'.$user_details['email'].'</td>';
                    $user_style .= '<td>'.$user_details['residence'].'</td>';
                    $user_style .= '<td>'.$user_details['religion'].'</td>';
                    $user_style .= '<td>'.$user_details['gender'].'</td>';
                    $user_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/userprofile/'.$user_details['ac_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $user_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'admin/updateuser/delete/'.$user_details['ac_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $user_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;


        case 'deactive':
           $users = $this->admin_model->get_all_dusers();
           $user_style = '';
        if ($users) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($users as $key => $user_details) {
                    $user_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $user_style .= '<td>'.$user_details['ac_id'].'</td>';
                    $user_style .= '<td>'.$user_details['f_name'].'</td>';
                    $user_style .= '<td>'.$user_details['l_name'].'</td>';
                    $user_style .= '<td>'.$user_details['age'].'</td>';
                    $user_style .= '<td>'.$user_details['nationality'].'</td>';
                    $user_style .= '<td>'.$user_details['phone_no'].'</td>';
                    $user_style .= '<td>'.$user_details['email'].'</td>';
                    $user_style .= '<td>'.$user_details['residence'].'</td>';
                    $user_style .= '<td>'.$user_details['religion'].'</td>';
                    $user_style .= '<td>'.$user_details['gender'].'</td>';
                    $user_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/userprofile/'.$user_details['ac_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $user_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Activate Profile" href = "'.base_url().'admin/updateuser/activate/'.$user_details['ac_id'].'"><i class="ion-ios-play icon black"></i></td>';
                    $user_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

    }

        return $user_style;
    }


    function createcompaniesview($type,$status)
    {

    	switch($status){

    		case 'active':

        $companies = $this->admin_model->get_all_companies();
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
                    
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/companyprofile/'.$company_details['comp_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    
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

        $companies = $this->admin_model->get_all_dcompanies();
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
                    
                    $company_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/companyprofile/'.$company_details['comp_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    
                    $company_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

    }

        return $company_style;
    }

    function createmessagesview($type)
    {
        $messages = $this->admin_model->get_all_messages();
        $message_style = '';
        if ($messages) {
            switch ($type) {
            case 'table':
                $counter = 1;
                foreach ($messages as $key => $message_details) {
                    $message_style .= '<tr>';
                    // $user_style .= '<td>'.$counter.'</td>';
                    $message_style .= '<td>'.$message_details['mail_id'].'</td>';
                    $message_style .= '<td>'.$message_details['subject'].'</td>';
                    $message_style .= '<td>'.$message_details['message'].'</td>';
                    $message_style .= '<td>'.$message_details['date_sent'].'</td>';

                    $message_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'admin/updatemessage/delete/'.$message_details['mail_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    
                    
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

    function createproductsview($type,$status)
    {
    	switch($status){

    		case 'active':
        $products = $this->admin_model->get_all_products();
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
                    
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/productprofile/'.$product_details['prod_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Delete Profile" href = "'.base_url().'admin/updateproduct/delete/'.$product_details['prod_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $product_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

       case 'deactive':
         $products = $this->admin_model->get_all_dproducts();
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
                    
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/productprofile/'.$product_details['prod_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Request again for the managers approval" href = "'.base_url().'admin/updateproduct/activate/'.$product_details['prod_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $product_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

        case 'deleted':
         $products = $this->admin_model->get_all_delproducts();
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
                    
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/productprofile/'.$product_details['prod_id'].'"><i class="ion-eye icon black"></i></a></td>';
                    $product_style .= '<td><a data-toggle="tooltip" data-placement="bottom" title="Restore Profile" href = "'.base_url().'admin/updateproduct/restore/'.$product_details['prod_id'].'"><i class="ion-trash-a icon black"></i></td>';
                    $product_style .= '</tr>';
                    $counter++;
                }
                break;
            
            default:
                # code...
                break;
            }
        }break;

    }

        return $product_style;
    }


    function create_product()
	{
		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('prodname', 'Product Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prodcategory', 'Product Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prodtype', 'Product Type', 'trim|required|xss_clean');
        $this->form_validation->set_rules('prodquantity', 'Product Quantity', 'trim|required');
        $this->form_validation->set_rules('prodprice', 'Product Price', 'trim|required');
        $this->form_validation->set_rules('prodcompany', 'Product Company', 'trim|required|xss_clean');
        

		if($this->form_validation->run() == FALSE){
			// echo 'Not working';die();
			redirect(base_url() .'admin/forms');
		    
		}else{
			 //var_dump(realpath('application/modules/user'));
			$path = base_url().'uploads/products/';
		       $config['upload_path'] = 'uploads/products/';
		       $config['allowed_types'] = 'jpeg|jpg|png|gif';
		       $config['encrypt_name'] = TRUE;
		       $this->load->library('upload', $config);
		       $this->upload->initialize($config);

			if ( ! $this->upload->do_upload('prodpicture'))
		    {
			   $error = array('error' => $this->upload->display_errors());

			   print_r($error);die;
		    }
		     else
		     {
		       
                $data = array('upload_data' => $this->upload->data());
			     foreach ($data as $key => $value) {
				  //print_r($data);die;
				  $path = base_url().'uploads/products/'.$value['file_name'];
				
                  }
			    $result = $this->admin_model->enter_product($path);
               //print_r($result);

			  if($result){
                redirect(base_url() .'admin/forms');

		      }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
			  }
		    }
	     }
	}



    function updateuser($type, $ac_id)
	{
		$update = $this->admin_model->updateuser($type, $ac_id);
		if($update)
		{
			switch ($type) {
				case 'delete':
					redirect(base_url() .'admin/home');
					break;

				case 'activate':
					redirect(base_url() .'admin/dusers');
					break;
				
				default:
					# code...
					break;
			}
		}
	}



	

	function updateproduct($type, $prod_id)
	{
		$update = $this->admin_model->updateproduct($type, $prod_id);
		if($update)
		{
			switch ($type) {
				case 'delete':
					redirect(base_url() .'admin/home');
					break;

				case 'restore':
					redirect(base_url() .'admin/forms');
					break;

				case 'activate':
					redirect(base_url() .'admin/dprod');
					break;
				
				default:
					# code...
					break;
			}
		}
	}

	function updatemessage($type, $mail_id)
	{
		$update = $this->admin_model->updatemessage($type, $mail_id);
		if($update)
		{
			switch ($type) {
				case 'delete':
					redirect(base_url() .'admin/home');
					break;
				
				default:
					# code...
					break;
			}
		}
	}

	function getproductcategories()
	{
        $results = $this->admin_model->get_product_category();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcat ='<option selected="selected" value="">Select the Category</option>';
        foreach ($results as $value) {
            $prodcat .= '<option value="' . $value['cat_name'] . '">' . $value['cat_name'] . '</option>';  
        }
        return $prodcat;
	}

	function getproducttypes()
	{
        $results = $this->admin_model->get_product_type();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodtype ='<option selected="selected" value="">Select the Type</option>';
        foreach ($results as $value) {
            $prodtype .= '<option value="' . $value['type_name'] . '">' . $value['type_name'] . '</option>';  
        }
        return $prodtype;
	}

	function getproductcompanies()
	{
        $results = $this->admin_model->get_product_company();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcomp ='<option selected="selected" value="">Select the Company</option>';
        foreach ($results as $value) {
            $prodcomp .= '<option value="' . $value['company_name'] . '">' . $value['company_name'] . '</option>';  
        }
        return $prodcomp;
	}

	public function home()
	{

		$data['error'] = '';
		
		
		$data['messagenumber']  = $this->getmessagenumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['usernumber']  = $this->getusernumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['product_table'] = $this->createproductsview('table','active');
		$data['users_table'] = $this->createusersview('table','active');
		$data['companies_table'] = $this->createcompaniesview('table','active');

		

		$this->load->view('v_admin', $data);
	}
  

	public function tables()
	{
		$data['error'] = '';
		$data['usernumber']  = $this->getusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['messagenumber']  = $this->getmessagenumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['users_table'] = $this->createusersview('table','active');
		$data['product_table'] = $this->createproductsview('table','active');
		$data['messages_table'] = $this->createmessagesview('table');
		$data['companies_table'] = $this->createcompaniesview('table','active');


		

		$this->load->view('admin_tables', $data);
	}

	public function t_references()
	{
		$data['error'] = '';
		
		// $data['content_page'] = 'admin/admin_tables';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_tables', array('logged_in' => $this->logged_in));

		$this->load->view('table_reference');
	}

	public function f_references()
	{
		$data['error'] = '';
		
		// $data['content_page'] = 'admin/admin_tables';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_tables', array('logged_in' => $this->logged_in));

		$this->load->view('form_reference');
	}

	public function statistics()
	{
		$data['error'] = '';
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['companynumber']  = $this->getcompanynumber();
		// $data['content_page'] = 'admin/admin_stats';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_stats', array('logged_in' => $this->logged_in));

		$this->load->view('admin_stats', $data);
	}

	public function forms()
	{
		$data['error'] = '';
		$data['product_categories']  = $this->getproductcategories();
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['product_types']  = $this->getproducttypes();
		$data['productnumber']  = $this->getproductnumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['product_table'] = $this->createproductsview('table','active');
		$data['product_companies']  = $this->getproductcompanies();
		// $data['content_page'] = 'admin/admin_form';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_form', array('logged_in' => $this->logged_in));

		$this->load->view('admin_form', $data);
	}

	public function delprod()
	{
		$data['error'] = '';
		$data['product_categories']  = $this->getproductcategories();
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['product_types']  = $this->getproducttypes();
		$data['productnumber']  = $this->getproductnumber();
        $data['delproductnumber']  = $this->getdelproductnumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['product_table'] = $this->createproductsview('table','deleted');
		$data['product_companies']  = $this->getproductcompanies();
		// $data['content_page'] = 'admin/admin_form';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_form', array('logged_in' => $this->logged_in));

		$this->load->view('admin_dproduct', $data);
	}

	public function dprod()
	{
		$data['error'] = '';
		$data['product_categories']  = $this->getproductcategories();
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['product_types']  = $this->getproducttypes();
		$data['productnumber']  = $this->getproductnumber();
        $data['dproductnumber']  = $this->getdproductnumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['product_table'] = $this->createproductsview('table','deactive');
		$data['product_companies']  = $this->getproductcompanies();
		// $data['content_page'] = 'admin/admin_form';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_form', array('logged_in' => $this->logged_in));

		$this->load->view('admin_disapproved', $data);
	}

	public function users()
	{
		$data['error'] = '';
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['users_table'] = $this->createusersview('table','active');
		$data['companynumber']  = $this->getcompanynumber();
		// $data['content_page'] = 'admin/admin_user';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_user', array('logged_in' => $this->logged_in));

		$this->load->view('admin_users', $data);
	}

	public function dusers()
	{
		$data['error'] = '';
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
        $data['dusernumber']  = $this->getdusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['users_table'] = $this->createusersview('table','deactive');
		$data['companynumber']  = $this->getcompanynumber();
		// $data['content_page'] = 'admin/admin_user';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_user', array('logged_in' => $this->logged_in));

		$this->load->view('admin_duser', $data);
	}

	public function company()
	{
		$data['error'] = '';
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['companies_table'] = $this->createcompaniesview('table','active');
		$data['companynumber']  = $this->getcompanynumber();
		// $data['content_page'] = 'admin/admin_user';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_user', array('logged_in' => $this->logged_in));

		$this->load->view('admin_company', $data);
	}

	public function dcompa()
	{
		$data['error'] = '';
		$data['messagenumber']  = $this->getmessagenumber();
		$data['usernumber']  = $this->getusernumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['companies_table'] = $this->createcompaniesview('table','deactive');
		$data['companynumber']  = $this->getcompanynumber();
        $data['dcompanynumber']  = $this->getdcompanynumber();
		// $data['content_page'] = 'admin/admin_user';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_user', array('logged_in' => $this->logged_in));

		$this->load->view('admin_dcompany', $data);
	}

	public function messages()
	{
		$data['error'] = '';
		$data['usernumber']  = $this->getusernumber();
		$data['messagenumber']  = $this->getmessagenumber();
		$data['companynumber']  = $this->getcompanynumber();
		$data['productnumber']  = $this->getproductnumber();
		$data['messages_table'] = $this->createmessagesview('table');

		// $data['content_page'] = 'admin/admin_user';
		// $this->template->get_admin_template($data);
		//$this->load->view('admin_user', array('logged_in' => $this->logged_in));

		$this->load->view('admin_messages', $data);
	}

	public function getusernumber()
	{
          $results = $this->admin_model->usernumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
	}

    public function getdusernumber()
    {
          $results = $this->admin_model->dusernumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

	public function getmessagenumber()
	{
          $results = $this->admin_model->messagenumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
	}

	public function getcompanynumber()
	{
          $results = $this->admin_model->companynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
	}

    public function getdcompanynumber()
    {
          $results = $this->admin_model->dcompanynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

	public function getproductnumber()
	{
          $results = $this->admin_model->productnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
	}

    public function getdproductnumber()
    {
          $results = $this->admin_model->dproductnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getdelproductnumber()
    {
          $results = $this->admin_model->delproductnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */