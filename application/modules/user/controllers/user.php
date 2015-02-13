<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {


	function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
         	$this->logged_in = TRUE;
         } else {
         	//$this->logged_in = FASLE;
         }

        $this->load->model('user_model');
        $this->load->library('upload');
        
        $this->pic_path = realpath(APPPATH . '../uploads/');
        //this is some random change
    }


    public function sign()
	{
		$this->load->view('sign_header');
		$this->load->view('v_sign');
		$this->load->view('home/footer');
	}

	public function log()
	{
		$this->load->view('log_header');
		$this->load->view('v_log');
		$this->load->view('home/footer');
	}
	
	public function manager()
	{
		$this->load->view('log_header');
		$this->load->view('manager');
		$this->load->view('home/footer');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'home');
	}

	

	public function failure()
	{
		$this->load->view('v_fail');
	}


    function validate_member()
	{
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('l_password', 'Password', 'trim|min_length[3]|required|max_length[15]|required|xss_clean');
        $this->form_validation->set_rules('l_username', 'UserName', 'trim|min_length[3]|required|xss_clean');
        
        if($this->form_validation->run() == FALSE){
        	$data['new_user'] = 'Please enter your credentials';
			$this->load->view('log_header');
		    $this->load->view('v_log',$data);
		    $this->load->view('home/footer');
		     
			 
		}else{
			
			$result = $this->user_model->log_member();		
            
             //echo '<pre>';print_r($result);echo'</pre>';die;
			switch($result){

				case 'logged_in':
                    
                    switch($this->session->userdata('lt_id')){
                        case '1':
                          redirect(base_url().'products/view');
                        break;

                        case '2':
                          redirect(base_url().'manager/home');
                        break;

                        case '3':
                          redirect(base_url().'admin/home');
                        break;
                    }

				break;

				case 'incorrect_password':
		            $data['new_user'] = 'Incorrect Username or Password. Please try again...';

                    $this->load->view('log_header');
		            $this->load->view('v_log', $data);
		            $this->load->view('home/footer');
				break;

				case 'not_activated':
		            $data['new_user'] = 'Your account is not activated';

                    $this->load->view('log_header');
		            $this->load->view('v_log', $data);
		            $this->load->view('home/footer');
				break;

				default:
                    // echo '';
				break;
			}	
		}
	}  

	function create_member()
	{
		$this->load->library('form_validation');
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|min_length[3]|required|xss_clean');
        $this->form_validation->set_rules('middlename', 'Middle Name', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|min_length[3]|required|xss_clean');
        $this->form_validation->set_rules('phonenumber', 'Phone Number', 'trim|min_length[3]');
        $this->form_validation->set_rules('age', 'Age', 'trim|min_length[2]');
        $this->form_validation->set_rules('residence', 'Residence', 'trim|min_length[3]|xss_clean');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|min_length[3]|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|xss_clean|is_unique[accounts.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'trim|min_length[3]|max_length[15]|required|xss_clean');
        $this->form_validation->set_rules('username', 'User Name', 'trim|min_length[3]|required|xss_clean|is_unique[logs.username]');
        $this->form_validation->set_rules('pass2', 'Re-Entered Password', 'trim|required|matches[pass1]|xss_clean');

		if($this->form_validation->run() == FALSE){
			$this->load->view('sign_header');
		    $this->load->view('v_sign');
		    $this->load->view('home/footer');
		    //echo 'Not working';
		}else{
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
			    $result = $this->user_model->enter_member($path);
               //print_r($result);

			  if($result){
                 $this->log();

		      }else{
                 echo 'There was a problem with the website.<br/>Please contact the administrator';
			  }
		    }
	     }
	}

	function ad_page()
	{
       redirect(base_url().'admin/home');
	}

	
	



}

/* End of file user.php */
/* Location: ./application/modules/user/user.php */