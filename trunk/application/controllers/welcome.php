<?php
// redMine-CI - project management software in codeigniter
// Copyright (C) 2009  MugilTech - mugiltech.com
// Created by: Kathir
//
// Created on 10-Mar-09
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



class Welcome extends Controller
{
	function Welcome()
	{
		parent::Controller();
		$this->load->model('User_Model');
	}

	function index()
	{
		$data = "";
		if ($this->session->userdata('user_id'))
		{
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->User_Model->getDetails($user_id);
		}
		else
		{
			$data['user'] = "";
		}
		$this->load->view('header', $data);
		$this->load->view('welcome/welcome_index', $data);
		$this->load->view('footer');
	}
}

?>