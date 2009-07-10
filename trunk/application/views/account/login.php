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

?>


  <div class="nosidebar" id="main">
    <div id="sidebar">

    </div>
    <div id="content">
	  <div id="login-form">
	  	<?php if(isset($failure)) { ?>
	  		<div class="flash_error">
	  		  <?php echo $failure; ?>
	  		</div>
	  	<?php } ?>
	  	<div class="required">
	  	</div>
		<form action="<?php print WEB_URL ?>login" method="post">
		  <table>
		    <tr>
		      <td align="right"><b>Login<b></td>
		      <td align="left"><input type="text" name="username" size="40" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><span class="required"><?php print $this->validation->username_error ?></span></td>
		    </tr>
		    <tr>
		      <td align="right"><b>Password</b></td>
		      <td align="left"><input type="password" name="password" size="40" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><span class="required"><?php print $this->validation->password_error ?></span></td>
		    </tr>
		    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
			  <td>Lost password</td>
			  <td align="right"><input type="submit" name="submit" value="Login &#187;" /></td>
			</tr>
		  </table>
		</form>
	  </div>
     </div>
  </div>

  <div id="ajax-indicator" style="display:none;"><span>Loading...</span></div>
