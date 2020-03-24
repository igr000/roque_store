<?php
/**************************************************************
-- login_model is the model class that will check if the ------
-- user's login credentials exist in the database. ------------
---------------------------------------------------------------
-- Author: Irene Gayle Roque ----------------------------------
**************************************************************/
class login_model extends CI_model{
	
	public function __construct(){
	parent::__construct();
	//load database
	$this->load->database();
	}

    public function login($username, $password){
    	
	    $condition_array = array (

		    'user_name' => $username,
		    //encrypts password
		    'user_pass' => md5($password)
	    );
        
        //get user_name and user_pass from table users
	    $rs = $this->db->get_where('users', $condition_array);
	    
	    //count rows
	    $row_count = $rs->num_rows();
        
        //if number of rows is greater that zero, display row of data
	    if($row_count > 0){
		    return $rs->row_array();
	    }else{
		    return FALSE;
	    }

    }

}

?>