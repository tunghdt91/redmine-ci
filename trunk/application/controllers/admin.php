<?php
class Admin extends Controller
{
	function admin()
	{
		parent::Controller();
		$this->load->model('User_Model');

	}

	function index()
	{



	}

     function projects()
     {
     	 $this->load->helper('date');
     	$datestring = "%m/%d/%Y";
				$time = time();
				$created_on = mdate($datestring, $time);




       if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);
              $data['proj']=$this->User_Model->showproj();
             $data['cur']=$created_on;


		$this->load->view('header',$data);
 		$this->load->view('admin/projects',$data);
		$this->load->view('footer');
     }

	}
}