<?php
/**************************************************************
-- Home Controller is the controller that will redirect the ---
-- admin from login page to home page or admin panel ----------
---------------------------------------------------------------
-- Author: Irene Gayle Roque ----------------------------------
**************************************************************/
class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if(!$this->session->islogged){
            //if user is not logged in or login session has ended, redirects to login page
			redirect('login');

		}else if($this->session->user_lvl==2){
            //restricts customers from accessing admin panel
			redirect('home');

		}
	}

	public function index(){
        //loads admin panel
		$this->load->view('admin/home');
	}
}
?>