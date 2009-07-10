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
      <h2>Register</h2>
      <form action="" method="post">
      <div class="box">
        <table cellpadding="4" cellspacing="4" border="0" width="100%">
        <tr>
          <td width="25%"></td>
          <td width="30%"></td>
          <td width="45%"></td>
        </tr>
        <tr>
          <td align="right"><b>Login</b><span class="required">*</span></td>
          <td><input type="text" name="user_login" size="25" value="<?php print $this->validation->user_login ?>" /></td>
          <td><span class="required"><?php print $this->validation->user_login_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Password</b><span class="required">*</span></td>
          <td><input type="password" name="user_password" size="25" /><br />
          Must be atleast 6 characters long.
          </td>
          <td><span class="required"><?php print $this->validation->user_password_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Confirmation</b><span class="required">*</span></td>
          <td><input type="password" name="password_confirmation" size="25" /></td>
          <td><span class="required"><?php print $this->validation->password_confirmation_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Firstname</b><span class="required">*</span></td>
          <td><input type="text" name="user_firstname" size="30" value="<?php print $this->validation->user_firstname ?>" /></td>
          <td><span class="required"><?php print $this->validation->user_firstname_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Lastname</b><span class="required">*</span></td>
          <td><input type="text" name="user_lastname" size="30" value="<?php print $this->validation->user_lastname ?>" /></td>
          <td><span class="required"><?php print $this->validation->user_lastname_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Email</b><span class="required">*</span></td>
          <td><input type="text" name="user_email" size="30" value="<?php print $this->validation->user_email ?>" /></td>
          <td><span class="required"><?php print $this->validation->user_email_error ?></span></td>
        </tr>
        <tr>
          <td align="right"><b>Language</b><span class="required">*</span></td>
          <td>
            <select name="user_language">
              <option value="">(auto)</option>
              <option value="english" <?php echo $this->validation->set_select('user_language','english'); ?>>English</option>
            </select>
          </td>
          <td><span class="required"><?php print $this->validation->user_language_error ?></span></td>
        </tr>
        </table>
      </div>
      <input type="submit" name="submit" value="Submit" />
      </form>
    </div>
  </div>

  <div id="ajax-indicator" style="display:none;"><span>Loading...</span></div>
