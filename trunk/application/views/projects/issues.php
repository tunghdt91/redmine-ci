<div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">


      </div>
        <h2> Issues</h2>
        <fieldset id="filters"><legend>Filters</legend>


<table width="100%">
<tbody><tr>
<td>
<table>


    <tbody><tr class="filter" id="tr_status_id">
    <td style="width: 200px;">
        <input type="checkbox" value="status_id" onclick="toggle_filter('status_id');" name="fields[]" id="cb_status_id" checked="checked"/>
        <label for="cb_status_id">Status</label>
    </td>
    <td style="width: 150px;">
        <select style="vertical-align: top;" onchange="toggle_operator('status_id');" name="operators[status_id]" id="operators_status_id" class="select-small"><option selected="selected" value="o">open</option>
<option value="=">is</option>
<option value="!">is not</option>
<option value="c">closed</option>
<option value="*">all</option></select>
    </td>

    </tr>
</tbody></table>
</td>
<td class="add-filter">
Add filter:
<select onchange="add_filter();" name="add_filter_select" id="add_filter_select" class="select-small"><option value=""/>
<option value="tracker_id">Tracker</option>
<option value="priority_id">Priority</option>
<option value="assigned_to_id">Assigned to</option>
<option value="author_id">Author</option>
<option value="category_id">Category</option>
<option value="subject">Subject</option>
<option value="created_on">Created</option>
<option value="updated_on">Updated</option>
<option value="start_date">Start</option>
<option value="due_date">Due date</option>
<option value="subproject_id">Subproject</option>
<option value="estimated_hours">Estimated time</option>
<option value="done_ratio">% Done</option></select>
</td>
</tr>
</tbody></table>

    <p class="buttons">
    	<img align="left" src="<?php print WEB_URL; ?>/images/true.png"/>
    <a onclick="" href="#" >Apply</a>
    <img src="<?php print WEB_URL; ?>/images/reload.png"/>
    <a onclick=""href="#">Clear</a>
    <img  src="<?php print WEB_URL; ?>/images/save.png"/>
    <a onclick=""href="#">Save</a>

    </p>
    </fieldset>
   <table class="list">
   <thead>
   <tr>

     <th>status</th><td>&nbsp</td>
      <th>priority</th>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <th>subject</th>
        <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
        <th>Assigned to</th>
         <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
         <th>Updated</th>
         </tr>
         </thead>

         <tr>
        <td align="center">

       <p>   <?php
        if (isset($issues)){
        foreach($issues as $row){
        	switch($row->status_id){
        	case 0:
        	echo "open";?><br>
        	<?break;
        	case 1:
        		echo"fixed";?><br>
        		<?break;
        		case 2:
        		echo"feedback required";?><br>
        		<?break;
        		case 3:
        	echo "verified";?><br>
        	<?break;
        	case 4:
        	echo "closed";?><br>
        	<?break;
        		?><br>
         <?}
        }

        }
        ?>
        </p>
       </td>
         <td>&nbsp</td>
        <td align="center">

       <p>   <?php
        if (isset($issues)){
        foreach($issues as $row){
        	switch($row->priority_id){
        	case 0:
        	echo "p1";?><br>
        	<?break;
        	case 1:
        		echo"p2";?><br>
        		<?break;
        		case 2:
        		echo"p3";?><br>
        		<?break;

        	?>
        	<br>
         <?}
        }
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td> <td>&nbsp</td> <td>&nbsp</td> <td>&nbsp</td>

        <td align="center">

       <p>   <?php
        if (isset($issues)){
        foreach($issues as $row){?>
        	<?echo $row->subject;?><br>
         <?}
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>

        <td align="center">

       <p>   <?php
        if (isset($issues)){
        foreach($issues as $row){
        switch($row->assigned_to_id){
        	case 0:
        	echo "";?><br>
        	<?break;
        	case 1:
        		echo"amala";?><br>
        		<?break;
        		case 2:
        		echo"banu";?><br>
        		<?break;
        		case 3:
        	echo "neema";?><br>
        	<?break;
 	?>
        	<br>
         <?}
        }
        }
        ?>
        </p>
       </td>
       <td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td>
       <td align="center">

       <p>   <?php
        if (isset($issues)){
        foreach($issues as $row){
        	if(isset($update)){?>
        	<?echo $update;
        	?><br>
         <?}
        }
        }
        ?>
        </p>
       </td>
       </tr>


</table>





        </div>
               </div>