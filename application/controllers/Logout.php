<?php
/***********************************************************************************
-- Logout Controller is the controller that will let the customer or admin end -----
-- the login session. --------------------------------------------------------------
------------------------------------------------------------------------------------
-- Author: Irene Gayle Roque -------------------------------------------------------
***********************************************************************************/
class Logout extends CI_Controller{
	
	public function __construct(){
		
		parent::__construct();
		
		if(!$this->session->islogged){
			//if the user is not logged in, redirects to Login controller
			redirect('Login');
		
		}
	}

	public function index(){
        
		$session_array = array('user_name', 'islogged');

		//removes username and login status in the session
		$this->session->unset_userdata($session_array);
		//goes to Login controller after username and login status are unset
		redirect('Login');
		
	}
}
?>