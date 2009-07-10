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
<?php
if (isset($user)) { if ($user != "") {
	$firstname = $user->firstname;
	$lastname = $user->lastname;
	$email = $user->mail;
	$language = $user->language;
	$mail_notification=$user->mail_notification;
	$hide_email=$user->hide_email;
	$notification_option=$user->notification_option;
	$timezone=$user->timezone;
	$display_comments=$user->display_comments;
}}
?>

  <div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">
        <a href="<?php print WEB_URL ?>my/password">Change password</a>
      </div>
      <h2>My Account</h2>
      <form id="my_account_form" action="<?php print WEB_URL ?>my/account" method="post">
        <div class="splitcontentleft">
          <h3>Information</h3>
          <div class="box tabular">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tr><td width="40%"></td><td></td></tr>
			<tr>
			  <td align="right"><b>Firstname</b><span class="required">*</span></td>
			  <td><input type="text" name="firstname" value="<?php if ($this->validation->firstname_error){ echo $this->validation->firstname;}else{ if ($this->validation->firstname) { echo $this->validation->firstname; } else { echo $firstname; }} ?>" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"><?php print $this->validation->firstname_error ?></span></td>
			</tr>
			<tr>
			  <td align="right"><b>Lastname</b><span class="required">*</span></td>
			  <td><input type="text" name="lastname" value="<?php if ($this->validation->lastname_error){echo $this->validation->lastname;}else{if ($this->validation->lastname) { echo $this->validation->lastname; } else{ echo $lastname;} }?>" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"><?php print $this->validation->lastname_error ?></span></td>
			</tr>
			<tr>
			  <td align="right"><b>Email</b><span class="required">*</span></td>
			  <td><input type="text" name="email" value="<?php if ($this->validation->email_error){echo $this->validation->email;}else{if ($this->validation->email) { echo $this->validation->email; } else {echo $email;}} ?>" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"><?php print $this->validation->email_error ?></span></td>
			</tr>
			<tr>
			  <td align="right"><b>Language</b></td>
			  <td>
			    <select name="language">
			      <option value="english" <?php echo $this->validation->set_select('language','english'); ?>>(auto)</option>
			      <option value="english" <?php if ($this->validation->language_error) { echo $this->validation->set_select('language','english');}else{ if ($language == "english") { echo "selected='selected'";}}?>>English</option>
			    </select>
			  </td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"><?php print $this->validation->language_error ?></span></td>
			</tr>

			</table>
          </div>
          <input type="submit" name="submit" value="Save" />
        </div>
        <div class="splitcontentright">
          <h3>Edit notifications</h3>
          <div class="box">
            <table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tr>
              <td>
                <select name="notification_option">
                  <option value="0">For any event on all my projects</option>
                  <option value="1" <?php if($notification_option==1){ echo "selected='selected'"; } ?> >Only for things i watch or i'm involved in</option>

                </select>
              </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>

              <td><input type="checkbox"  name="mail_notification" value="1" <?php if($mail_notification) { echo 'checked';} ?>>I don't want to be notified of changes that I make myself</input> </td>
            </tr>
            </table>
          </div>
          <h3>Preferences</h3>
          <div class="box tabular">
          	<table cellpadding="0" cellspacing="0" border="0" width="100%">
          	<tr>
          	  <td><b>Hide my email address</b></td>
          	  <td><input type="checkbox" name="hide_email"  value="1"<?php if ($hide_email){echo 'checked';} ?>" />


          	  </td>

          	</tr>
          	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          	<tr>
          	  <td><b>Time zone</b></td>
          	  <td><?php echo timezone_menu('UM8'); ?></td>
          	</tr>
          	<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          	<tr>
          	  <td><b>Display comments</b></td>
          	  <td>
          	    <select name="display_comments">
          	      <option value="asc">In chronological order</option>
          	      <option value="desc" <?php if($display_comments=="desc"){ echo "selected='selected'"; } ?>>In reverse chronological order</option>
          	    </select>
          	  </td>
          	</tr>

          	</table>
          </div>
        </div>
      </form>
    </div>

  </div>


  <div id="ajax-indicator" style="display:none;"><span>Loading...</span></div>
