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


class My extends Controller
{
	function My()
	{
		parent::Controller();
		$this->load->model('User_Model');
	}

	function index()
	{

	}

	function page()
	{

	}

	function account()
	{
		if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);

			$rules['firstname'] = "required|alpha";
			$rules['lastname'] = "required|alpha";
			$rules['email'] = "required|valid_email";
			$rules['language'] = "";
			$rules['mail_notification']="";
			$rules['notification_option']="";
			$rules['hide_email']="";
			$rules['timezone']="";
			$rules['display_comments']="";
			$this->validation->set_rules($rules);

			$fields['firstname'] = "Firstname";
			$fields['lastname'] = "Lastname";
			$fields['email'] = "Email";
			$fields['language'] = "Language";
			$fields['mail_notification']="mail_notification";
			$fields['notification_option']="notification_option";
			$fields['hide_email']="hide_email";
			$fields['timezone']="timezone";
			$fields['display_comments']="display_comments";
			$this->validation->set_fields($fields);

			if ($this->validation->run() == FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('my/account', $data);
				$this->load->view('footer');
			}
			else
			{
				$user_id=$this->User_Model->edit($user_id,$this->validation->firstname,$this->validation->lastname,
				                             $this->validation->email,$this->validation->language,$this->validation->mail_notification,$this->validation->notification_option,

				                             $this->validation->hide_email,$this->validation->timezone,$this->validation->display_comments);
         redirect('/my/account');
			}
		}

		if($user_id)
		{

			$this->load->view('header',$data);
                $this->load->view('my/account',$data);
                $this->load->view('footer');

		}
else
		{
			$data['user'] = "";
			redirect('/login');
		}

	}

	function password()
	{
     if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);
			$rules['password'] = "required|alpha";
			$rules['newpassword'] = "required|alpha|matches[confirmation]";
			$rules['confirmation'] = "required|alpha";
			$this->validation->set_rules($rules);
			$fields['password'] = "password";
			$fields['newpassword'] = "newpassword";
			$fields['confirmation'] = "confirmation";
			$this->validation->set_fields($fields);
			if ($this->validation->run() == FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('my/password', $data);
				$this->load->view('footer');
			}
			else
			{
				$user_id=$this->User_Model->password($user_id,$this->validation->newpassword);

			}		}

		if ($this->validation->newpassword)
			{

                $data['msg']="your password has been changed";
                $this->load->view('header',$data);
                $this->load->view('my/password',$data);
                $this->load->view('footer');


			}


	}

}
?>
