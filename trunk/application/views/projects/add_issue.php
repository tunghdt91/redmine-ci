<div id="main">
    <div id="sidebar">
  </div>
  <div id="content">
    <h2>New Issue:Bugs</h2>
   <form class="tabular" method="post" action="<?php print WEB_URL ?>projects/add_issue" enctype="multipart/form-data">
    <div class="box1">
   <div class="splitcontentleft">
   <p>
 <label for="status_id"> <b>Status</b><span class="required">*</span></label>
   <select name="status_id">
                  <option value="0">open</option>
                  <option value="1">fixed</option>
                  <option value="2">feedback required</option>
                  <option value="3">verified</option>
                  <option value="4">closed</option>
              </select>
          </p>
   <p>
    <label for="priority_id"><b> Priority</b><span class="required">*</span></label>
   <select name="priority_id">
                  <option value="0">p1</option>
                  <option value="1">p2</option>
                  <option value="2">p3</option>
              </select>
          </p>
           <p>
 <label for="assigned_to_id"><b>Assigned to</b><span class="required">*</span></label>
   <select name="assigned_to_id">
              <option value="0"></option>
              <option value="1">amala</option>
              <option value="2">banu</option>
              <option value="3">neema</option>
              </select>
          </p>
           <p>
  <label for="category_id"> <b>Category</b><span class="required">*</span></label>
   <select name="category_id">
                  <option value="0">account</option>
                  <option value="1">layout</option>

          </select>
          </p>
         </div>
          <div class="splitcontentright">
          <p>
          <label for="start_date"><b>Start Date</b></label>
          <input type="text" size="10" name="start_date" alt="calendar" value=""/>
          <img src="<?php print WEB_URL?>/images/calendar.png">
          </p>
           <p>
          <label for="due_date"><b>Due Date</b></label>
          <input type="text" size="10" name="due_date" alt="calendar" value=""/>
          <img src="<?php print WEB_URL?>/images/calendar.png">
          </p>
           <p>
          <label for="estimated_hours"><b>Estimated time</b></label>
          <input type="text" size="10" name="estimated_hours" value=""/>hours
          </p>
           <p>
          <label for="done_ratio"><b>Done%</b></label>
           <select name="done_ratio">
                   <option value="0">0%</option>
                  <option value="10">10%</option>
                  <option value="20">20%</option>
                   <option value="30">30%</option>
                   <option value="40">40%</option>
                   <option value="50">50%</option>
                   <option value="60">60%</option>
                   <option value="70">70%</option>
                   <option value="80">80%</option>
                   <option value="90">90%</option>
                   <option value="100">100%</option>
                   </select>
          </p>
       </div>
  <div class="box2">
     <p>
          <label for="subject"><b>subject</b><span class="required">*</span></label>
          <input type="text" size="78" name="subject" value=""/>
          </p>
           <p>
          <label for="description"><b>description</b><span class="required">*</span></label>
          <input type="text"size="75" name="description" value=""/>
          </p>
          <p>
          <label for="fixed_version_id"><b>Fixed version</b></label>
           <select name="fixed_version_id">
                  <option value=""/>
                  <option value="17">0.1</option>
                  </select>
                  </p>
                  <p>
                  <label for="attachments"><b>File</b></label>
                  <input type="file"name="attachments"size="30">
                  </p>
           <p>
           <input type="submit" name="submit"value="create">
           </p>
</form>
</div>
</div>
</div>
</div>











