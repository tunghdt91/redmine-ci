<?php
class Projects extends Controller
{
	function Projects()
	{
		parent::Controller();
		$this->load->model('User_Model');
}

	function index()
	{
     if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);
            $data['proj']=$this->User_Model->showproj();

		$this->load->view('header',$data);
 		$this->load->view('projects/home',$data);
		$this->load->view('footer');





	}
	}
	function add()
	{
		if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);

			$rules['name']="required";
			$rules['subproject_of']="";
			$rules['description']="";
			$rules['identifier']="required";
			$rules['home_page']="required";
			$rules['public']="";
			$this->validation->set_rules($rules);

            $fields['name']="name";
            $fields['subproject_of']="subproject_of";
            $fields['description']="description";
            $fields['identifier']="identifier";
            $fields['home_page']="home_page";
            $fields['public']="public";
            $this->validation->set_fields($fields);

			if ($this->validation->run() == FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('projects/add', $data);
				$this->load->view('footer');
			}
          else
          {
          	$user_id=$this->User_Model->add($this->validation->name,$this->validation->subproject_of,
          	                            $this->validation->description,$this->validation->identifier,$this->validation->home_page,
          	                            $this->validation->public);
          }




	}
	}
	function show($id=null)
	{
    if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');

			$data['user'] = $this->User_Model->getDetails($user_id);



		if($id!=null)
		{

    $data['showid']=$this->User_Model->showindividualproj($id);
    $this->load->view('header',$data);
 		$this->load->view('projects/show',$data);
		$this->load->view('footer');
    }

else{

   	$data['showid']=$this->User_Model->showproj();
   	$this->load->view('header',$data);
 		$this->load->view('projects/show',$data);
		$this->load->view('footer');

   }
	}
	}
	function issues()
	{

		$this->load->helper('date');
     	$datestring = "%m/%d/%Y";
				$time = time();
				$updated_on = mdate($datestring, $time);
		if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');

			$data['user'] = $this->User_Model->getDetails($user_id);
            $data['issues']=$this->User_Model->show_issue();
            $data['update']=$updated_on;
      $this->load->view('header',$data);
      $this->load->view('projects/issues',$data);
      $this->load->view('footer');
	}
	}
	function add_issue()
	{
		if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');

			$data['user'] = $this->User_Model->getDetails($user_id);
			$rules['status_id']="required";
			$rules['priority_id']="required";
			$rules['assigned_to_id']="required";
			$rules['category_id']="required";
			$rules['start_date']="";
			$rules['due_date']="";
			$rules['estimated_hours']="";
			$rules['done_ratio']="";
			$rules['subject']="required";
			$rules['description']="required";
			$rules['fixed_version_id']="";
			$rules['attachments']="";
			$this->validation->set_rules($rules);
			$fields['status_id']="status_id";
			$fields['priority_id']="priority_id";
			$fields['assigned_to_id']="assigned_to_id";
			$fields['category_id']="category_id";
			$fields['start_date']="start_date";
			$fields['due_date']="due_date";
			$fields['estimated_hours']="estimated_hours";
			$fields['done_ratio']="done_ratio";
			$fields['subject']="subject";
			$fields['description']="description";
			$fields['fixed_version_id']="fixed_version_id";
			$fields['attachments']="attachments";
			$this->validation->set_fields($fields);
			//move_uploaded_file($_FILES["attachments"]["tmp_name"],$_FILES["attachments"]["name"]);
			//echo $_FILES["attachments"]["tmp_name"];

if ($this->validation->run() == FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('projects/add_issue', $data);
				$this->load->view('footer');
			}
          else
          {
          	$user_id=$this->User_Model->add_issue($this->validation->status_id,$this->validation->priority_id,
          	                            $this->validation->assigned_to_id,$this->validation->category_id,$this->validation->start_date,
          	                            $this->validation->due_date,$this->validation->estimated_hours,
          	                            $this->validation->done_ratio,$this->validation->subject,
          	                            $this->validation->description,$this->validation->fixed_version_id,
          	                            $this->validation->attachments);
          }

	}

	}


}
?>


















