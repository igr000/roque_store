<?php
/*****************************************************************
-- Home Controller is the controller that will redirect the ------
-- customer from login page to home page or customer panel -------
------------------------------------------------------------------
-- Author: Irene Gayle Roque -------------------------------------
*****************************************************************/

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		if(!$this->session->islogged){
			//if user is not logged in or login session has ended, redirects to login page
			redirect('login');
		
		}else if($this->session->user_lvl==1){
			//restricts admins from accessing customer's panel
			redirect('admin/home');

		}
	}

	public function index(){
        
		//loads home page for customers/members
		$this->load->view('home');
		
	}
}
?>