<?php
// redMine-CI - project management software in codeigniter
// Copyright (C) 2009  MugilTech - mugiltech.com
// Created by: Kathir
//
// Created on 11-Mar-09
//
// Modifications by:
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.


class User_Model extends Model
{
	function User_Model()
	{
		parent::Model();
	}

	function register($username, $password, $firstname, $lastname, $email, $language)
	{

		$date = date("Y-m-d H:i:s");
		$pwd = dohash($password, 'md5');
		$data = array(
				'login' => $username, 'password' => $pwd, 'firstname' => $firstname, 'lastname' => $lastname,
				'mail' => $email, 'language' => $language, 'created_on' => $date, 'updated_on' => $date
				);

		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	function login($username, $password)
	{
		$pwd = dohash($password, 'md5');
		$query = $this->db->getwhere('users', array('login' => $username, 'password' => $pwd));
		if ($query->num_rows() == 0)
		{
			return "";
		}
		else
		{
			$row = $query->row();
			return $row->user_id;
		}

	}

	function checkUser($username)
	{
		$query = $this->db->getwhere('users', array('login' => $username));
		if($query->num_rows() == 0)
		{
			return "false";
		}
		else
		{
			return "true";
		}
	}
	function checkID($id)
	{
	    	$query = $this->db->getwhere('users', array('user_id' => $id));

	    	if($query->num_rows() == 0)
	    	{
	    		return 0;
	    	}
	    	else
	    	{
	    		$row = $query->row();
	    		return $row->user_id;
	    	}
	}
	function checkUserEmail($str)
	{
		$query = $this->db->getwhere('users', array('email' => $str));
		if ($query->num_rows() == 0)
		{
			return "false";
		}
		else
		{
			return "true";
		}
	}

	function getDetails($user_id)
	{
	    	$query = $this->db->getwhere('users', array('user_id' => $user_id));
	    	if($query->num_rows() == 0)
	    	{
	    		return "";
	    	}
	    	else
	    	{
	    		return $query->row();
	    	}
	}
	function password($user_id,$newpassword)
	{

		$data=array('password'=>$newpassword);
		$this->db->where('user_id',$user_id);
        $this->db->update('users',$data);


         }

 function edit($user_id,$firstname,$lastname,$email,$language,$mail_notification,$notification_option,$hide_email,$timezone,$display_comments)
 {
      $data=array('firstname'=>$firstname,'lastname'=>$lastname,'mail'=>$email,'language'=>$language,'mail_notification'=>$mail_notification,
                   'notification_option'=>$notification_option,'hide_email'=>$hide_email,'timezone'=>$timezone,'display_comments'=>$display_comments);

      $this->db->where('user_id',$user_id);
   $result= $this->db->update('users',$data);
      return $result;
 }

function display($display_comments)
{
  if($display_comments=='desc')
  {
  	$this->db->order_by($display_comments, "desc");
  $query=$this->db->get('users');
  }
  else
  {
  	$this->db->order_by($display_comments, "asc");
  	$query=$this->db->get('users');
  }
   return $query;
}
function logout($user_id, $date)
	{
		$data = array('last_login_on' => $date);
		$this->db->where('user_id', $user_id);
		$result = $this->db->update('users', $data);
	}
function add($name,$subproject_of,$description,$identifier,$home_page,$public)
{
      $data=array('name'=>$name,'subproject_of'=>$subproject_of,'description'=>$description,
                  'identifier'=>$identifier,'home_page'=>$home_page,'public'=>$public );
$this->db->insert('projects', $data);

}
function showproj()
{
  $this->db->select('*');

  $query=$this->db->get('projects');
   return $query->result();

}
function showindividualproj($id)
{
     $this->db->select('*');
     $this->db->from('projects');
      $this->db->where('id',$id);
      $query=$this->db->get();
      if ($query->num_rows() == 0)
		{
			return "";
		}
		else
		{
		 	return $query->result();
		}
}


function add_issue($status_id,$priority_id,$assigned_to_id,$category_id,$start_date,
      $due_date,$estimated_hours,$done_ratio,$subject,$description,$fixed_version_id,$attachments)
{

  $data=array('status_id'=>$status_id,'priority_id'=>$priority_id,'assigned_to_id'=>$assigned_to_id,
      'category_id'=>$category_id,'start_date'=>$start_date,'due_date'=>$due_date,'estimated_hours'=>$estimated_hours,
        'done_ratio'=>$done_ratio,'subject'=>$subject,'description'=>$description,
        'fixed_version_id'=>$fixed_version_id,'attachments'=>$attachments);
         $this->db->insert('issues',$data);

}
function show_issue()
{
	$this->db->select('*');
	$query=$this->db->get('issues');
	return $query->result();

}





}

?>