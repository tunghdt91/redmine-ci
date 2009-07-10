<div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">

      </div>
       <h2>New Projects</h2>
      <form  action="<?php print WEB_URL ?>projects/add" method="post">

         <div class="box tabular">
          <div class="box">
			<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tr><td width="40%"></td><td></td></tr>
			<tr>
			  <td align="right"><b>Name</b><span class="required">*</span></td>
			  <td><input type="text" name="name" value="" size="30" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>

			</tr>

			<tr>

              <td align="right"><b>SubProject of</b> </td>
                <td>
                <input type="text" name="subproject_of" value="" size="30" />


              </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr>
			  <td align="right"><b>Description</b></td>
			  <td><input type="text" name="description" rows="5" cols="30" value=""/></td>

			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"></span></td>
			</tr>
			<tr>
			  <td align="right"><b>Identifier</b><span class="required">*</span></td>
			  <td><input type="text" name="identifier" value="" size="30" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class="required"></span></td>
			</tr>

        <tr>
			  <td align="right"><b>Home Page</b></td>
			  <td><input type="text" name="home_page" value="" size="60" /></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			</tr>
            <tr>

              <td align="right"><b> Public </b> <input type="checkbox"  name="public" value="1"></input> </td>
            </tr>
             <tr>
			  <td>&nbsp;</td>
			</tr>
			 </table>
			 </div>
			<fieldset class="box"><legend>Modules</legend>

    <label class="floating">
    <input type="checkbox" value="issue_tracking" name="issue_track" />
    Issue tracking
    </label>

    <label class="floating">
    <input type="checkbox" value="time_tracking" name="time_track"/>
    Time tracking
    </label>

    <label class="floating">
    <input type="checkbox" value="news" name="news"/>
    News
    </label>

    <label class="floating">
    <input type="checkbox" value="documents" name="documents"/>
    Documents
    </label>

    <label class="floating">
    <input type="checkbox" value="files" name="files"/>
    Files
    </label>

    <label class="floating">
    <input type="checkbox" value="wiki" name="wiki"/>
    Wiki
    </label>

    <label class="floating">
    <input type="checkbox" value="repository" name="repository"/>
    Repository
    </label>

    <label class="floating">
    <input type="checkbox" value="boards" name="boards"/>
    Boards
    </label>

</fieldset>
           </form>

<input type="submit" name="submit" value="save"/>

           </div>
           </div>



           </div>
            </div>


