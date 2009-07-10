<div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">
      <a href="<?php print WEB_URL ?>projects/add">New Projects</a>

      </div>
        <h2> Projects</h2>
        <fieldset><legend>Filters</legend>
<label>Status :</label>
<select  name="status" id="status" ><option value="">all</option>
<option selected="selected" value="1">active</option></select>
<label>Project:</label>
<input type="text" size="30" name="name" id="name"/>
<input type="submit" value="Apply" class="small"/>
</fieldset>


        <table class="list">
        <thead>
       <tr>
       <th>project</th>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <th>description</th>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <th>Subprojects</th>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <th>public</th>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <th>Created</th>

       </tr>
       </thead>

       <tr>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){?>
        	<?echo $row->name;?><br>
         <?}
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){?>
        	<?echo $row->description;?><br>
         <?}
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){?>
        	<?echo $row->subproject_of;
        	?><br>
         <?}
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">
       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){
        	if($row->public==1){?><br>

           	<img align="left" src="<?php print WEB_URL; ?>/images/true.png"/>
         <?}
         else{?>
         	<img align="left" src="<?php print WEB_URL; ?>/images/false.png"/>
        <?}
        }
        }
        ?>
        </p>
       </td>
        <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){
        	if(isset($cur)){?>
        	<?echo $cur;
        	?><br>
         <?}
        }
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){?>

        	Archive<br>
         <?}

        } ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($proj)){
        foreach($proj as $row){?>

        	Delete<br>
         <?}

        } ?>
        </p>
       </td>

       </tr>
       </table>









               </div>
               </div>