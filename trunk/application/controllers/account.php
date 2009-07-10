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


class Account extends Controller
{
	function Account()
	{
		parent::Controller();
		$this->load->model('User_Model');
	}

	function index()
	{

	}

	function register()
	{
		$data = "";
		$data['user'] = "";
		$rules['user_login'] = "required|alpha_dash";
		$rules['user_password'] = "required|alpha_numeric|matches[password_confirmation]|min_length[6]";
		$rules['password_confirmation'] = "required|alpha_numeric";
		$rules['user_firstname'] = "required|alpha";
		$rules['user_lastname'] = "required|alpha";
		$rules['user_email'] = "required|valid_email";
		$rules['user_language'] = "required";
		$this->validation->set_rules($rules);

		$fields['user_login'] = "Login";
		$fields['user_password'] = "Password";
		$fields['password_confirmation'] = "Confirm Password";
		$fields['user_firstname'] = "Firstname";
		$fields['user_lastname'] = "Lastname";
		$fields['user_email'] = "Email";
		$fields['user_language'] = "Language";
		$this->validation->set_fields($fields);

		if ($this->validation->run() == FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('account/register', $data);
			$this->load->view('footer');
		}
		else
		{

			$user_id = $this->User_Model->register($this->validation->user_login, $this->validation->user_password,
									$this->validation->user_firstname, $this->validation->user_lastname, $this->validation->user_email,
									$this->validation->user_language);
			if ($user_id)
			{
				$data['message'] = "Your account was created and is now pending administrator approval.";
				redirect('/login');
			}
			else
			{
				$data['message'] = "Error....";
				$this->load->view('header', $data);
				$this->load->view('account/register', $data);
				$this->load->view('footer');
			}

		}
	}

	function login()
	{
		$data = "";
		$data['user'] = "";
		$rules['username'] = "required";
		$rules['password'] = "required";
		$this->validation->set_rules($rules);

		$fields['username'] = "Username";
		$fields['password'] = "Password";
		$this->validation->set_fields($fields);

		if ($this->validation->run() == FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('account/login', $data);
			$this->load->view('footer');
		}
		else
		{
			$user_id = $this->User_Model->login($this->validation->username, $this->validation->password);
			if ($user_id)
			{
				$date = date("Y-m-d H:i:s");
				$this->session->set_userdata(array('user_id' => $user_id));
				$this->session->set_userdata(array('last_login' => $date));
				redirect('','refresh');
			}
			else
			{
				$data['failure'] = "Invalid user or password";
				$this->load->view('header', $data);
				$this->load->view('account/login', $data);
				$this->load->view('footer');

			}
		}

	}

	function logout()
	{
		$user_id = $this->session->userdata('user_id');
		$user_id = $this->User_Model->checkID($user_id);
		if($user_id != 0)
		{
			$date = $this->session->userdata('last_login');
			$this->User_Model->logout($user_id, $date);
			$this->session->sess_destroy();
		}
		redirect('','refresh');
	}

	function lost_password()
	{
		$data = "";
		$this->load->view('header', $data);
		$this->load->view();
		$this->load->view('footer');

	}

}
?>