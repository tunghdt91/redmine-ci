<?php
if (isset($user)) { if ($user != ""){

}
}
?>

  <div class="nosidebar" id="main">
    <div id="sidebar">

    </div>
      <?if(isset($msg))
      echo $msg;?>
      <div id="content">
         <h3> change password</h3>
      <form action="<?php print WEB_URL ?>my/password" method="post">
      <div class="box">

           <table>
		    <tr>
		      <td align="right"><b>password<b><span class="required">*</span></td>
		      <td align="left"><input type="password" name="password" size="40" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><span class="required"><?php print $this->validation->password_error ?></span></td>

		    </tr>
		    <tr>
		      <td align="right"><b>New password</b><span class="required">*</span></td>
		      <td align="left"><input type="password" name="newpassword" size="40" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><span class="required"><?php print $this->validation->newpassword_error ?></span></td>
		    </tr>
		     <tr>
		      <td align="right"><b>confirmation</b><span class="required">*</span></td>
		      <td align="left"><input type="password" name="confirmation" size="40" /></td>
		    </tr>
		    <tr>
		      <td>&nbsp;</td>
		      <td><span class="required"><?php print $this->validation->confirmation_error ?></span></td>
		    </tr>

            </table>
              </div>
              <input type="submit" name="submit" value="Apply"/>
                 </div>

              </form>

