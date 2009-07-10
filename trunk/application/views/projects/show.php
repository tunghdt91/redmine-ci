<div id="main">
    <div id="sidebar">

    </div>

    <div id="content">
      <div class="contextual">


      </div>


        <?php
        if (isset($showid)){
         if($showid!=""){
        foreach($showid as $row){?>

         <p> <? echo $row->description;?>
          </p>
         <ul><li> <p>Home page:  <?echo $row->home_page;?>
         </ul></li> </p>
        <?}
        }
        }

        ?>
        <div class="box">
         <b> Issue Tracking </b>
         <p> <a href="<?php print WEB_URL ?>issues">View all issues</a></p>
          </div>


               </div>
               </div>




