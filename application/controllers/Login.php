<?php
/***********************************************************************************
-- Login Controller is the controller that will validate the login credentials -----
-- entered through the login page and impose user restricton. ----------------------
------------------------------------------------------------------------------------
-- Author: Irene Gayle Roque -------------------------------------------------------
***********************************************************************************/
class Login extends CI_Controller{
	
	public function index(){
        //loads login page
		$this->load->view('login');
	}

	//verify() --> method that will identify if the user logged in is an admin or customer through user_lvl
	public function verify(){
		$this->form_validation->set_rules('txtuser','Username','required');
		$this->form_validation->set_rules('txtpass','Password','required|callback_check_user');

		if($this->form_validation->run() === TRUE){

			if($this->session->user_lvl == 1){
                //redirects to admin panel if user_lvl is 1
				redirect('admin/home');
			}else{
				//redirects to customer panel if user_lvl is not equal to 1
				redirect('home');
			}
		}else{
			$this->index();
		}

	}
    
    //check_user() --> method that will check if the login credentials matches one of the credentials stored in the database
	public function check_user(){
		$username = $this->input->post('txtuser');
		$password = $this->input->post('txtpass');
        //calls login_model
		$this->load->model('login_model');
		$login = $this->login_model->login($username, $password);

		if($login){
			$sess_data = array(

				'user_name' => $login['user_name'] ,
				'user_lvl' => $login['user_lvl'],
				'islogged' => TRUE 
			);
            
            //create login session along with the user data of newly logged in user 
			$this->session->set_userdata($sess_data);
			return true;
		}else{
			//displays 'Invalid Username/password' if the login credentials are not found in the database
			$this->form_validation->set_message('check_user', 'Invalid Username/password');
			return false;
		}
	}
}
?>