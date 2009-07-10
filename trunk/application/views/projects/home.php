<div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">

        <a href="<?php print WEB_URL ?>projects/add">New Projects</a>  |<a href="<?php print WEB_URL ?>/issues">view all issues</a>  |
        <a href="<?php print WEB_URL ?>projects/activity">Overall Activity</a>

      </div>
        <h2> Projects</h2>


        <?php
        if (isset($proj)){
        foreach($proj as $row){?>
  <h3>     <a class="" href="<?php print WEB_URL ?>projects/show/<?php echo $row->id ?>"> <?echo $row->name;?></a>
     	</h3>
         <p> <? echo $row->description;?>
          </p>
          <p>subprojects:<a class="" href="<?php print WEB_URL ?>projects/show"> <?echo $row->subproject_of;?></a>
          </p>
        <?}
        }

        ?>


               </div>
               </div>